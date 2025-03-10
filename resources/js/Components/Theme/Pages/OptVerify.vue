<script setup>
import Button from '@/Components/Theme/Utilities/Button.vue';
import {useForm} from '@inertiajs/vue3';
import OptInputs from '@/Components/Theme/Utilities/OptInputs.vue';

import {ref, defineProps, defineEmits, watch} from 'vue';

const props = defineProps({
    errors: Object,
    modelValue: {
        type: Object || Array,
        required: true
    },
    title: {
        type: String,
        default: '',
        required: false
    },
});
const emit = defineEmits(['update:modelValue']);

const form = ref({ ...props.modelValue })
watch(
    () => form.value,
    (newVal) => {
        emit('update:modelValue', newVal);
    },
    {deep: true},
);

const resendOtpCodeForm = useForm({
    'otp_email': form.value.email
});

</script>

<template>
    <div class="auth-column-form-box">
        <h2 v-if="title !== ''" class="auth-column-form-title mb-[10px]" v-text="title"></h2>
        <h2 class="auth-column-form-sub-title normal-case">
            We've sent a code to <strong> {{ form.email }} </strong>
        </h2>
        <div class="divider mb-[30px]"></div>
        <OptInputs v-model="form.otp" :error="errors.otp" />
        <slot name="form-action" />
        <h2 class="auth-column-form-sub-title text-primary text-opacity-80 normal-case text-center mt-[24px]">
            Didn't receive code? <Button type="button" @click.prevent="resendOtpCodeForm.post('/otp-code-email')" class="anchor anchor-secondary anchor-underline inline-flex flex-row items-center gap-[5px]" :loading="resendOtpCodeForm.processing"> Resend code </Button>
            <span v-if="resendOtpCodeForm.errors.otp_email" class="input-error">{{ resendOtpCodeForm.errors.otp_email }}</span>
        </h2>
        <slot name="default" />
    </div>
</template>

<style scoped>

</style>
c
<
