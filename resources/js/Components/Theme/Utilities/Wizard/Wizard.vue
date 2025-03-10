<script setup>
import {defineProps, defineEmits, ref, watch} from 'vue';
import Button from '@/Components/Theme/Utilities/Button.vue';

const props = defineProps({
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
    isStoringInfo: {
        type: Boolean,
        default: false,
        required: false
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
    submitButtonText: {
        type: String,
        default: 'Verify',
        required: false,
    }
})
const emit = defineEmits(['update:modelValue', 'validate', 'submit', 'updateData']);
const currentStep = ref(props.modelValue);
watch(
    () => props.modelValue,
    (newVal) => {
        currentStep.value = newVal
    }
)

watch(
    () => props.steps[currentStep.value].props.modelValue,
    (newVal) => {
        emit('updateData', {
            name: props.steps[currentStep.value].name,
            data: newVal
        })
    },
    {deep: true}
)
const currentValidationErrors = ref([]);

const nextStep = async () => {
    const isValid = emit("validate", currentStep.value);
    // if (isValid) {
        currentStep.value++;
        emit("update:modelValue", currentStep.value);
    /*} else {
        console.log("Validation failed for step:", currentStep.value);
    }*/
};

const prevStep = () => {
    currentStep.value--;
    emit("update:modelValue", currentStep.value);
};

const submit = async () => {
    const isValid = emit("validate", currentStep.value);
    emit("submit");
    /*if (isValid) {
        emit("submit");
    } else {
        console.log("Validation failed for step:", currentStep.value);
    }*/
};

</script>

<script>
export default {
    inheritAttrs: false
}
</script>

<template>
    <div class="wizard-con" :class="$attrs.class">
        <div class="wizard-box">
            <div class="wizard-header" v-if="steps[currentStep].name !== '' && steps[currentStep].name !== undefined && isHeaderShow" :class="headerClasses">
                {{ steps[currentStep].name }}
            </div>
            <form>
                <component :is="steps[currentStep].component" v-bind="{ ...steps[currentStep].props, modelValue: null }" v-model="steps[currentStep].props.modelValue" :errors="steps[currentStep].props.errors" class="wizard-content" />
                <div class="wizard-action" :class="actionClasses">
                    <div class="row gap-[20px]">
                        <div class="col" v-if="currentStep > 0">
                            <Button @click="prevStep" :disabled="currentStep === 0" type="button" class="btn btn-lg btn-border-primary font-arial-bold uppercase w-full" icon="primaryLeftArrow" iconPosition="left" iconClasses=" w-[22px] h-[14px]">
                                Previous
                            </Button>
                        </div>
                        <div class="col" v-if="currentStep < steps.length - 1">
                            <Button @click="nextStep" type="button" class="btn btn-lg btn-primary font-arial-bold uppercase w-full" icon="whiteRightArrow" iconPosition="right" iconClasses=" w-[22px] h-[14px]">
                                Next
                            </Button>
                        </div>
                        <div class="col" v-else>
                            <Button @click.prevent="submit" type="button" class="btn btn-lg btn-primary font-arial-bold uppercase w-full" :loading="isStoringInfo">
                                {{ submitButtonText }}
                            </Button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
