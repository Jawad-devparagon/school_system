<script setup>
import Input from '@/Components/Theme/Utilities/Input.vue';
import Select from '@/Components/Theme/Utilities/Select.vue';
import RadioGroup from '@/Components/Theme/Utilities/Radio/RadioGroup.vue';
import Radio from '@/Components/Theme/Utilities/Radio/Radio.vue';
import {ref, defineProps, defineEmits, watch} from 'vue';

const props = defineProps({
    errors: {
        type: Object,
        default: () => [],
        required: true
    },
    title: {
        type: String,
        default: '',
        required: false
    },
    modelValue: {
        type: Object,
        default: () => [],
        required: true
    },
    countries: {
        type: Object || Array,
        default: () => [],
        required: true,
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

</script>

<template>

    <div class="auth-column-form-box">
        <h2 v-if="title !== ''" class="auth-column-form-title mb-[40px]" v-text="title"></h2>
        <div>
            <RadioGroup :error="errors.cardType" class="" label="Payment Type">
                <Radio v-model="form.cardType" name="payment_type" :checked="form.cardType === 'card'" value="card" label="Card"  />
                <Radio v-model="form.cardType" name="payment_type" :checked="form.cardType === 'paypal'" value="paypal" label="Paypal"  />
            </RadioGroup>

            <div class="row">
                <div class="col">
                    <Input type="text" v-model="form.cardNumber" :isCardInput="true" iconName="paymentIcon" iconClasses="w-[20px] h-[14px]" :error="errors.cardNumber" class="" label="Card Number" placeholder="123 456 789" />
                </div>
                <div class="col">
                    <Input type="text" v-model="form.cardExpiry" :error="errors.cardExpiry" class="" label="Expiry" placeholder="Expiry" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <Input type="text" v-model="form.cardName" :error="errors.cardName" class="" label="Name on the card" placeholder="Name on the card" />
                </div>
                <div class="col">
                    <Input type="text" v-model="form.cardCvv" :error="errors.cardCvv" class="" label="CVV" placeholder="CVV" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <Select v-model="form.cardCountry" :is-multiple="false" :error="errors.cardCountry" :isUseIcon="true" label="Country" placeholder="Country" :options="countries" />
                </div>
                <div class="col">
                    <Input type="text" v-model="form.cardPostal" :error="errors.cardPostal" class="" label="Postal" placeholder="Postal" />
                </div>
            </div>

            <slot />
        </div>
    </div>

</template>

<style scoped>

</style>
