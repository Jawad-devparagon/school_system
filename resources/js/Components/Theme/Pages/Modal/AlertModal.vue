<script setup>

import {ref, defineProps, defineEmits, watch} from 'vue';
import Icon from "@/Components/Theme/Icon/Icon.vue";

const props = defineProps({
    title: {
        type: String,
        default: '',
        required: false
    },
    detail: {
        type: String,
        default: '',
        required: false,
    },
    headerClasses: {
        type: String,
        default: '',
        required: false,
    },
    contentClasses: {
        type: String,
        default: '',
        required: false,
    },
    footerClasses: {
        type: String,
        default: '',
        required: false,
    },
});


</script>

<template>
    <div class="alert-modal-con">
        <div class="alert-modal-wrapper">
            <div class="alert-modal-header" :class="headerClasses">
                <h2 v-if="title !== ''" class="alert-modal-header__title" v-text="title"></h2>
                <slot name="header" />
            </div>
            <div class="alert-modal-content" :class="contentClasses">
                <p v-if="detail !== ''" class="alert-modal-content__para max-w-96" v-text="detail"></p>
                <Icon name="successBadgeIcon" class="alert-modal-content__icon"> </Icon>
                <slot name="default" />
            </div>
            <div class="alert-modal-footer" :class="footerClasses">
                <slot name="footer" />
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
