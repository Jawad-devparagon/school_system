<template>
    <div class="form-group" :class="[$attrs.class, {'form-group_readonly': $attrs.readonly}]">
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <div class="radio-con">
            <slot />
        </div>
        <div v-if="error" class="input-error">{{ error }}</div>
    </div>
</template>

<script setup>
import {v4 as uuid} from 'uuid';
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps({
    id: {
        type: String,
        default: () => `text-input-${uuid()}`
    },
    error: String,
    label: {
        type: String,
        default: null,
        required: false
    },
});
</script>
