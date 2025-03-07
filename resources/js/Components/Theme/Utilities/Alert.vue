<script setup>
import { ref, defineProps } from 'vue';

const props = defineProps({
    alertContentClasses: {
        type: String,
        default: null,
        required: false
    },
    isClose: {
        type: Boolean,
        default: true,
        required: false
    }
});

</script>

<template>
    <div v-if="!isClose" class="alert">
        <slot name="default" />
        <div class="alert-content" :class="alertContentClasses">
            <slot name="alert-content"/>
        </div>
    </div>
</template>

<style scoped>

</style>
