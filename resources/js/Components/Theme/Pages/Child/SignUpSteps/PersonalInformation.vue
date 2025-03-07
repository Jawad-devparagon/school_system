<script setup>
import Input from '@/Components/Theme/Utilities/Input.vue';
import Button from '@/Components/Theme/Utilities/Button.vue';
import Select from '@/Components/Theme/Utilities/Select.vue';
import {ref, defineProps, defineEmits, watch, onMounted} from 'vue';

const props = defineProps({
    errors: {
        type: Object,
        default: [],
        required: true,
    },
    title: {
        type: String,
        default: '',
        required: false
    },
    countries: {
        type: Object,
        default: [],
        required: true,
    },
    modelValue: {
        type: Object,
        required: true
    }
});
const emit = defineEmits(['update:modelValue', 'registerMentee']);

const form = ref({...props.modelValue})
watch(
    () => form,
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
            <div class="row">
                <div class="col">
                    <Input type="text" v-model="form.first_name" :error="errors.first_name" class="" label="First Name"
                           placeholder="First Name"/>
                </div>
                <div class="col">
                    <Input type="text" v-model="form.last_name" :error="errors.last_name" class="" label="Last Name"
                           placeholder="Last Name"/>
                </div>
            </div>
            <Input type="email" v-model="form.email" :error="errors.email" class="" label="Email Address"
                   placeholder="Type Search"/>
            <div class="row">
                <div class="col">
                    <Input type="password" v-model="form.password" :error="errors.password" class="" label="Password"
                           placeholder="Password"/>
                </div>
                <div class="col">
                    <Input type="password" v-model="form.confirmation_password" :error="errors.confirmation_password"
                           class="" label="Confirm Password" placeholder="Confirm Password"/>
                </div>
            </div>
            <h2 class="font-inter-bold text-size-16 leading-[150%] text-primary text-opacity-60 mb-[10px]">
                Location
            </h2>
            <div class="row">
                <div class="col">
                    <Input type="text" v-model="form.city" :error="errors.city" class="" label="City"
                           placeholder="City"/>
                </div>
                <div class="col">
                    <Input type="text" v-model="form.province" :error="errors.province" class="" label="Province"
                           placeholder="Province"/>
                </div>
            </div>
            <Select v-model="form.country" :is-multiple="false" label="Country" :error="errors.country" placeholder="Country"
                    :options="countries" />

            <slot name="default" />
        </div>
    </div>

</template>

<style scoped>

</style>
[
