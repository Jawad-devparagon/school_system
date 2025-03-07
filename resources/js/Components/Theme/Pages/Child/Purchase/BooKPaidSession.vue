<script setup>
import {ref, shallowRef} from "vue";
import {router, useForm, usePage} from "@inertiajs/vue3";
import TabSecondary from '@/Components/Theme/Utilities/Tab/TabSecondary.vue';
import PersonalInformation from '@/Components/Theme/Pages/Child/SignUpSteps/PersonalInformation.vue';
import MentorshipLevel from '@/Components/Theme/Pages/Child/SignUpSteps/MentorshipLevel.vue';
import PackageSecondary from '@/Components/Theme/Pages/Child/Package/PackageSecondary.vue';

const page = usePage();
const props = defineProps({
    user: {
        type: Object || Array,
        default: () => [],
        required: false
    },
    countries: {
        type: Object || Array,
        default: () => [],
        required: false
    },
    genders: {
        type: Object || Array,
        default: () => [],
        required: false
    },
    races: {
        type: Object || Array,
        default: () => [],
        required: false
    },
    mentoringFocuses: {
        type: Object || Array,
        default: () => [],
        required: false
    },
})

const packageItem = ref(
    {
        title: 'Professional Mentee',
        price: '$25',
        type: 'CAD/Month',
        detail: 'Lorem ipsum dolor sit amet consectetur. Volutpat risus mauris sit proin cursus placerat blandit nibh sed. Aliquet at arcu duis.',
        list: [
            {
                title: '4 Call per month',
                icon: 'greenCircleCheck',
            },
            {
                title: 'QA Unlimited',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Expected response within 24hrs',
                icon: 'greenCircleCheck',
            },
            {
                title: 'Hand on support',
                icon: 'greenCircleCheck',
            },
        ],
    },
)
const form = useForm({
    personalInformation: {
        mentorshipFocus: [],
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        confirmation_password: '',
        city: '',
        province: '',
        country: '',
    },
    package: {
        paymentType: '',
    },
    cardDetails: {
        cardType: '',
        cardNumber: '',
        cardExpiry: '',
        cardName: '',
        cardCvv: '',
        cardCountry: '',
        cardPostal: '',
    },
    otpVerify: {
        otp: '',
    }
});
const steps = ref([
    {
        title: "Standard",
        name: "standard",
        component: shallowRef(PackageSecondary),
        props: {
            title: '',
            modelValue: form.package,
            errors: form.errors
        },
    },
    {
        title: "Basic",
        name: "basic",
        component: shallowRef(PackageSecondary),
        props: {
            title: '',
            modelValue: form.personalInformation,
            countries: props.countries,
            errors: form.errors,
            name: "package",
            checked: true,
            value: packageItem.value.title,
            package: packageItem.value
        },
    },
]);
const currentStep = ref(1);
const currentValidationErrors = ref([]);

</script>

<template>
    <div>
        <TabSecondary class="border-0 tab-wrapper-inner tab-wrapper-inner_border" tabLayout="default" v-model="currentStep" :steps="steps" submit-button-text="Signup" :is-storing-info="form.processing" @validate="" @submit="" @updateData="" header-classes="auth-column-form-box" action-classes="auth-column-form-box" />
    </div>
</template>

<style scoped>

</style>
