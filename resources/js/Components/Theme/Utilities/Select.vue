<script setup>
import VSelect from 'vue-select';
import {v4 as uuid} from 'uuid';
import {ref, defineProps, defineEmits, watch, computed} from 'vue';
import Icon from "@/Components/Theme/Icon/Icon.vue";
const props = defineProps({
    id: {
        type: String,
        default: () => `text-input-${uuid()}`
    },
    error: String,
    isMultiple: {
        type: Boolean,
        default: false,
        required: false
    },
    isUseIcon: {
        type: Boolean,
        default: false,
        required: false
    },
    label: {
        type: String,
        default: '',
        required: false
    },
    modelValue: {
        required: false
    },
    options: {
        type: Array || Object,
        default: [],
    }
});
const emit = defineEmits(['update:modelValue']);
const selectRef = ref(null);
const localModelValue = ref([]);
const selectedOptionsNames = computed(() => {
    return props.options.filter(option => localModelValue.value.includes(option.value));
});
function removeSelectedValue(index) {
    if (Array.isArray(localModelValue.value)) {
        localModelValue.value = localModelValue.value.filter((value, i) => index !== i)
    }
}
function updateModelValue() {
    emit('update:modelValue', localModelValue.value);
}
watch(
    () => localModelValue.value,
    (newVal) => {
        updateModelValue();
    },
    { deep: true }
);
// Sync props.modelValue with localModelValue
watch(
    () => props.modelValue,
    (newVal) => {
        localModelValue.value = newVal || (props.isMultiple ? [] : null);
    },
    { immediate: true }
);
</script>
<template>
    <div class="form-group" :class="[$attrs.class, {'form-group_readonly': $attrs.readonly}]">
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <VSelect v-if="!$attrs.readonly" v-model="localModelValue" :id="id" ref="selectRef" v-bind="{ ...$attrs, class: null }" :class="{ 'input-danger': error, 'hide-selected-items': isMultiple }" :reduce="(option) => option.value" :options="options" :multiple="isMultiple">
            <template v-if="isUseIcon" #option="{ label, icon }">
                <div class="select-option-item">
                    <Icon :name="icon" class="w-[18px] h-[18px]" />
                    {{ label }}
                </div>
            </template>
            <template v-if="isUseIcon" #selected-option="{ label, icon }">
                <div class="select-option-item">
                    <Icon :name="icon" class="w-[18px] h-[18px]" />
                    {{ label }}
                </div>
            </template>
        </VSelect>
        <ul class="chip-box" v-if="(isMultiple && ((typeof localModelValue) === 'array' || (typeof localModelValue) === 'object')) && localModelValue !== ''">
            <li class="chip-item chip-sm chip-rounded-sm chip-border" :class="{'select-chip-item': !$attrs.readonly}" v-for="(selectedOption, index) in selectedOptionsNames">
                {{ selectedOption.label }}
                <div v-if="!$attrs.readonly" class="chip-cross-icon" @click="removeSelectedValue(index)">
                    <Icon name="cross" class="w-[8px] h-[8px]" />
                </div>
            </li>
        </ul>
        <div v-if="error" class="input-error">{{ error }}</div>
    </div>
</template>
<style scoped>
</style>
