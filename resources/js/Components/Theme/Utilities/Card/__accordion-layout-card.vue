<script setup>

const props = defineProps({
    profileImageUrl: {
        type: String,
        default: '',
        required: true,
    },
    title: {
        type: String,
        default: '',
        required: true,
    },
    titleClass: {
        type: String,
        default: '',
        required: false
    },
    subTittle: {
        type: String,
        default: '',
        required: true
    },
    subTitleClass: {
        type: String,
        default: '',
        required: false
    },
    badge: {
        type: String,
        default: '',
        required: false
    },
    badgeClass: {
        type: String,
        default: '',
        required: false
    }
});
const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div class="card card-border card-accordion-shadow card-accordion-rounded flex-col">
        <div class="card-header accordion-layout">
            <div class="accordion-layout__left">
                <div class="accordion-layout__left__icon">
                    <img :src="profileImageUrl" :alt="`${title} profile image`" class="uploaded-file" width="48" height="48" loading="lazy" />
                </div>
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-start w-full md:w-fit gap-2 lg:gap-5">
                    <p class="accordion-layout__left__title" :class="titleClass">
                        {{  (title !== '') ? title : '' }}
                        <span v-if="subTittle !== ''" class="accordion-layout__left__sub-title" :class="subTitleClass">
                        {{ subTittle }}
                    </span>
                    </p>
                    <p v-if="badge !== ''" class="chip-item chip-sm chip-rounded font-inter-bold uppercase text-center" :class="badgeClass">
                        {{ badge }}
                    </p>
                </div>
            </div>
            <div class="accordion-layout__right">
                <slot name="action" />
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
