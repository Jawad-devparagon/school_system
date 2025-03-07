<script setup>
import {defineProps, defineEmits, ref, watch, computed} from 'vue';
import Button from '@/Components/Theme/Utilities/Button.vue';

const props = defineProps({
    tabLayout: {
        type: String,
        default: 'default',
        required: false,
    },
    steps: {
        type: Array || Object,
        default: () => [],
        required: true,
    },
    modelValue: {
        type: Number,
        default: 0,
        required: true
    },
    isHeaderShow: {
        type: Boolean,
        default: false,
        required: false
    },
    headerClasses: {
        type: String,
        default: '',
        required: false,
    },
    actionClasses: {
        type: String,
        default: '',
        required: false,
    },
})

const emit = defineEmits(['update:modelValue']);
const currentStep = ref(props.modelValue);

const setTabLayout = computed(() => {
    if( props.tabLayout === 'left-header' ) {
        return 'side-layout'
    } else {
        return 'default-layout'
    }
})

watch(
    () => props.modelValue,
    (newVal) => {
        currentStep.value = newVal
    }
)

function moveTab(tabName) {
    currentStep.value = props.steps.findIndex((tab) => {
        return tab.name === tabName;
    });
    emit("update:modelValue", currentStep.value);
}

</script>

<script>
export default {
    inheritAttrs: false
}
</script>

<template>

    <div class="tab-wrapper" :class="[$attrs.class]">
        <div class="tab-box" :class="setTabLayout">
            <div class="tab-header">
                <div class="tab-header__inner">

                    <div class="tab-header-item" v-for="(step, stepIndex) in steps" :key="stepIndex">
                        <Button type="button" @click.prevent="moveTab(step.name)" class="tab-header-link" :class="{'active': currentStep === stepIndex}" v-text="step.title"></Button>
                    </div>

                </div>
            </div><!-- col end -->
            <div class="tab-content">

                <component :is="steps[currentStep].component" v-bind="{ ...steps[currentStep].props, modelValue: null }" v-model="steps[currentStep].props.modelValue" />

            </div><!-- col end -->
        </div>
    </div>

</template>

<style scoped>

</style>
