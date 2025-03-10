<script setup>
import { ref, watch, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3'
import Button from "@/Components/Theme/Utilities/Button.vue";
import Alert from "@/Components/Theme/Utilities/Alert.vue";

const isCloseAlert = ref(true);
const page = usePage();
const alertClass = ref();
const alertMessage = ref('');
const isError = ref(false);

const setAlertClassesAndMessage = () => {
    if(page.props.flash && page.props.flash.success !== '' && page.props.flash.success !== null) {
        isCloseAlert.value = false;
        alertClass.value = 0;
        alertMessage.value = page.props.flash.success;
    } else if((page.props.flash && page.props.flash.error !== '' && page.props.flash.error != null) || Object.keys(page.props.errors).length > 0) {
        isCloseAlert.value = false;
        isError.value = true;
        alertClass.value = 2;
        alertMessage.value = (page.props.flash.error !== '' && page.props.flash.error != null) ? page.props.flash.error : `There are ${Object.keys(page.props.errors).length} form errors.`;
    } else {
        isCloseAlert.value = true;
    }
}

function closeAlert() {
    isCloseAlert.value = true;
    isError.value = false;
    alertClass.value = '';
    alertMessage.value = '';
}

watch(
    () => page.props.flash,
    (newValue) => {
        setAlertClassesAndMessage();
    },
    { deep: true }
);
onMounted(() => {
    setAlertClassesAndMessage();
});
</script>

<template>
    <Alert class="flex-row-reverse mb-5" :class="{'alert-success': alertClass === 0, 'alert-danger': alertClass === 2 }" :isClose="isCloseAlert" alertContentClasses="">
        <template #alert-content>
            <svg v-if="isError" class="alert-icon" :class="{'alert-icon-success': alertClass === 0, 'alert-icon-danger': alertClass === 2 }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z" /></svg>
            <svg v-else class="alert-icon" :class="{'alert-text-success': alertClass === 0, 'alert-text-danger': alertClass === 2 }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="0 11 2 9 7 14 18 3 20 5 7 18" /></svg>
            <div class="alert-text" :class="{'alert-text-success': alertClass === 0, 'alert-text-danger': alertClass === 2 }">{{ alertMessage }}</div>
        </template>
        <Button type="button" class="alert-close" :class="{'alert-text-success': alertClass === 0, 'alert-text-danger': alertClass === 2 }" icon="cross" iconClasses=" w-3 h-3" iconPosition="left" @click="closeAlert" />
    </Alert>
</template>









