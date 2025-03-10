<template>
    <div class="form-group">
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <div class="checkbox-con">
            <div class="checkbox-box">
                <input type="checkbox" :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="hidden peer" @change="updateValue" />
                <label :for="id" class="checkbox-item"></label>
            </div>
        </div>
        <div v-if="error" class="input-error">{{ error }}</div>
    </div>
</template>

<script setup>
import {v4 as uuid} from 'uuid';
import { ref, defineProps, defineEmits } from 'vue';

const emit = defineEmits(['update:modelValue']);
const props = defineProps({
    id: {
        type: String,
        default: () => `checkbox-input-${uuid()}`
    },
    error: String,
    label: {
        type: String,
        default: null,
        required: false
    },
    modelValue: {
        type: String || Number,
        default: '',
        required: false
    },
});

function updateValue(event) {
    emit('update:modelValue', event.target.value);
}
</script>
