<script setup>
import {v4 as uuid} from 'uuid';
import {ref, defineProps, defineEmits, watch} from 'vue';

const props = defineProps({
    id: {
        type: String,
        default: () => `radio-input-${uuid()}`
    },
    label: {
        type: String,
        default: null,
        required: false
    },
    subLabel: {
        type: String,
        default: null,
        required: false
    },
    modelValue: {
        type: String,
        default: '',
        required: false
    },
    disabled: {
        default: false,
        type: Boolean
    },
    itemClasses: {
        default: '',
        type: String,
        required: false
    }
});
const emit = defineEmits(['update:modelValue']);

const localModelValue = ref(props.modelValue);

const getRadioVal = (event) => {
    emit('update:modelValue', event.target.value);
}


</script>

<script>
export default {
    inheritAttrs: false
}
</script>

<template>
    <div class="radio-box" :class="$attrs.class">
        <input v-model="localModelValue" type="radio" :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="hidden peer" @change="getRadioVal" :disabled="disabled"/>
        <label :for="id" :class="(itemClasses !== '') ? itemClasses : 'radio-item'">
            {{ label }}
            <span v-if="subLabel !== ''" class="radio-box__sub-label" v-text="subLabel"></span>
        </label>
    </div>
</template>

<style scoped>

</style>
