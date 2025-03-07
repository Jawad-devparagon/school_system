<script setup>
import {v4 as uuid} from 'uuid';
import {ref, defineProps, defineEmits, watch, computed} from 'vue';

const props = defineProps({
    id: {
        type: String,
        default: () => `text-input-${uuid()}`,
        required: false
    },
    error: String,
    label: {
        type: String,
        default: null,
        required: false
    },
    modelValue: {
        type: String,
        default: '',
        required: false
    },
});
const emit = defineEmits(['update:modelValue']);
const otp = ref(['', '', '', '']);
const combineOtp = computed(() => {
    return otp.value.join('');
})
watch(
    () => combineOtp.value,
    (newVal) => {
        emit('update:modelValue', combineOtp.value);
    },
    {deep: true},
);
</script>

<template>
    <div class="form-group" :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <div class="opt-verify-box">
            <input type="text" v-model="otp[0]" class="form-input otp-input input-shadow" min="1" max="9" maxlength="1"  />
            <input type="text" v-model="otp[1]" class="form-input otp-input input-shadow" min="1" max="9" maxlength="1"  />
            <input type="text" v-model="otp[2]" class="form-input otp-input input-shadow" min="1" max="9" maxlength="1"  />
            <input type="text" v-model="otp[3]" class="form-input otp-input input-shadow" min="1" max="9" maxlength="1"  />
        </div>
        <div v-if="error" class="input-error">{{ error }}</div>
    </div>
</template>

<style scoped>

</style>
