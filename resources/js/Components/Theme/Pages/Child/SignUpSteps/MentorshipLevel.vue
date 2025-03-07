<script setup>
import PackageGroup from '@/Components/Theme/Pages/Child/Package/PackageGroup.vue';
import Package from '@/Components/Theme/Pages/Child/Package/Package.vue';
import {ref, defineProps, defineEmits, watch} from 'vue';

const props = defineProps({
    errors: Object,
    modelValue: {
        type: Object,
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
    () => form,
    (newVal) => {
        emit('update:modelValue', form.value);
    },
    {deep: true},
);

const packageList = ref([
    {
        title: 'General Mentee',
        price: 'Free Tier',
        type: '',
        detail: 'This level offers limited access to core services, designed for users exploring the platform and those seeking entry-level career support',
        list: [
            {
                title: 'Job Board',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Career Resources',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Online Events',
                icon: 'greenCircleCheck',
            },
            {
                title: 'In Person Events and Networking',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Resume Review',
                icon: 'redCircleCross',
            },
            {
                title: '1 Group Session/year',
                icon: 'greenCircleCheck',
            },
            {
                title: 'One-On-One Mentoring',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Micro Mentoring (Quick phone call or chat) to an expert mentor',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Leadership Mentoring',
                icon: 'redCircleCross',
            },
            {
                title: 'Mentee Community',
                icon: 'redCircleCross',
            },
        ],
    },
    {
        title: 'Professional Mentee',
        price: '$25',
        type: 'CAD/Month',
        detail: 'Designed for users looking for more access to mentorship programs, networking events, and career support.',
        list: [
            {
                title: 'Job Board',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Career Resources',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Online Events',
                icon: 'greenCircleCheck',
            },
            {
                title: 'In Person Events and Networking',
                icon: 'greenCircleCheck',
            },
            {
                title: 'One free resume review per year',
                icon: 'redCircleCross',
            },
            {
                title: '4 Group Mentoring Sessions',
                icon: 'greenCircleCheck',
            },
            {
                title: '2 One-On-One Mentoring Session per year',
                icon: 'greenCircleCheck',
            },
            {
                title: '10 Micro Mentoring Sessions',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Leadership Mentoring',
                icon: 'redCircleCross',
            },
            {
                title: 'Mentee Community Access to BWTH Mentee Community for connection chats and discussion forms',
                icon: 'greenCircleCheck',
            },
        ],
    },
    {
        title: 'Premium Mentee',
        price: '$35',
        type: 'CAD/Month',
        detail: 'Aimed at professionals wanting access to personalized services, exclusive events, and leadership development opportunities',
        list: [
            {
                title: 'Job Board',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Career Resources',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Online Events',
                icon: 'greenCircleCheck',
            },
            {
                title: 'In Person Events and Networking',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Two free resume review per year',
                icon: 'redCircleCross',
            },
            {
                title: 'Unlimited Group Mentoring Sessions',
                icon: 'greenCircleCheck',
            },
            {
                title: '4 One-On-One Mentoring Session per year',
                icon: 'greenCircleCheck',
            },
            {
                title: '20 Micro Mentoring Sessions',
                icon: 'greenCircleCheck',
            },
            {
                title: '1 One-On-One Leadership Mentoring Session',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Access to BWTH Mentee Community for connection chats and discussion forms',
                icon: 'greenCircleCheck',
            },
        ],
    },
])
</script>

<template>

    <div class="auth-column-form-box">
        <h2 v-if="title !== ''" class="auth-column-form-title mb-[40px]" v-text="title"></h2>
        <div>

            <PackageGroup >
                <Package v-model="form.paymentType" v-for="(packageItem, packageIndex) in packageList" name="package" :checked="form.paymentType === packageItem.title" :value="packageItem.title" :key="packageIndex" :package="packageItem"></Package>
            </PackageGroup>

            <slot name="default" />
        </div>

    </div>

</template>

<style scoped>

</style>
