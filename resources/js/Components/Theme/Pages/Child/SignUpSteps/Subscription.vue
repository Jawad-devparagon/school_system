<script setup>
import Icon from '@/Components/Theme/Icon/Icon.vue';
import Table from '@/Components/Theme/Utilities/Table.vue';
import Modal from '@/Components/Theme/Utilities/Modal.vue';
import {defineProps, reactive, ref, shallowRef, onMounted} from 'vue';
import Button from '@/Components/Theme/Utilities/Button.vue';
import PaymentMethod from '@/Components/Theme/Pages/Child/SignUpSteps/PaymentMethod.vue';
import Anchor from '@/Components/Theme/Utilities/Anchor.vue';
import MentorshipLevel from '@/Components/Theme/Pages/Child/SignUpSteps/MentorshipLevel.vue';
import {router} from '@inertiajs/vue3';
import Wizard from '@/Components/Theme/Utilities/Wizard/Wizard.vue';
import AlertModal from "@/Components/Theme/Pages/Modal/AlertModal.vue";
import Input from "@/Components/Theme/Utilities/Input.vue";
import Select from "@/Components/Theme/Utilities/Select.vue";
import SignaturePad from "@/Components/Theme/Utilities/SignaturePad.vue";
import RadioGroup from "@/Components/Theme/Utilities/Radio/RadioGroup.vue";
import Radio from "@/Components/Theme/Utilities/Radio/Radio.vue";

const props = defineProps({
    errors: {
        type: Object,
        default: () => [],
        required: true
    },
    countries: {
        type: Object || Array,
        default: () => [],
        required: true
    },
})

const historyColumns = [
    {
        title: `<input type="checkbox" id="select-all" />`,
        data: null,
        render: '#checkbox',
        orderable: false,
        className: 'min-w-[20px]'
    },
    {title: 'Payment Invoice', data: 'invoice', className: 'min-w-[264px]'},
    {title: 'Amount', data: 'amount', className: 'text-right min-w-[100px]'},
    {title: 'Date', data: 'date', className: 'text-center min-w-[125px]'},
    {title: 'Status', data: 'status', className: 'text-center min-w-[125px]'},
    {
        title: '',
        data: null,
        render: '#action',
        orderable: false,
        width: '10%',
    },
];
const historyData = [
    {
        id: 'invoice-00998',
        invoice: 'Invoice#00998 - Sept 2022',
        amount: '$560.00',
        date: 'Nov 12, 2024',
        status: 'Success',
    },
    {
        id: 'invoice-00999',
        invoice: 'Invoice#00999 - Sept 2022',
        amount: '$560.00',
        date: 'Nov 12, 2024',
        status: 'Success',
    },
    {
        id: 'invoice-01000',
        invoice: 'Invoice#01000 - Oct 2022',
        amount: '$600.00',
        date: 'Nov 13, 2024',
        status: 'Success',
    },
];

const changePlanModal = ref(false);
const changePaymentCardModal = ref(false);
const successModal = ref(false);
const packageModal = ref(false);
const noteModal = ref(true);
const infoModal = ref(false);
const bookMeetingModal = ref(false);

const changePlanForm = reactive({
    cardType: '',
    cardNumber: '',
    cardExpiry: '',
    cardName: '',
    cardCvv: '',
    cardCountry: '',
    cardPostal: '',
});
const cardCountryList = ref([
    {
        label: 'United State',
        value: '42976',
        icon: 'unitedStateFlagIcon'
    },
    {
        label: 'United Arab Emirate',
        value: '45290',
        icon: 'unitedStateFlagIcon'
    },
    {
        label: 'Pakistan',
        value: '76208',
        icon: 'unitedStateFlagIcon'
    },
    {
        label: 'Russia',
        value: '47883',
        icon: 'unitedStateFlagIcon'
    }
]);

const form = reactive({
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
});
const steps = ref([
    {
        title: "Package",
        name: "package",
        component: shallowRef(MentorshipLevel),
        props: {
            title: '',
            modelValue: form.package,
            errors: changePlanForm.errors
        },
    },
    {
        title: "Card Details",
        name: "cardDetails",
        component: shallowRef(PaymentMethod),
        props: {
            title: '',
            modelValue: form.cardDetails,
            countries: cardCountryList.value,
            errors: changePlanForm.errors
        },
    },
]);
const currentStep = ref(0);
const currentValidationErrors = ref([]);
const personalInformationData = ref({
    first_name: 'Akib',
    last_name: 'Tanjil',
    email: 'email.admin@gmail.com',
    goals: [
        {
            label: 'Software Engineering',
            value: 'software engineering',
            icon: ''
        },
        {
            label: 'Data Science',
            value: 'data science',
            icon: ''
        },
        {
            label: 'AI/ML',
            value: 'ai/ml',
            icon: ''
        },
        {
            label: 'Leadership',
            value: 'leadership',
            icon: ''
        },
    ],
    interest: [
        {
            label: 'Software Engineering',
            value: 'software engineering',
            icon: ''
        },
        {
            label: 'Data Science',
            value: 'data science',
            icon: ''
        },
        {
            label: 'AI/ML',
            value: 'ai/ml',
            icon: ''
        },
        {
            label: 'Leadership',
            value: 'leadership',
            icon: ''
        },
    ],
    program: 'Certification',
    challenges: 'Explain the professional challenges you are seeking guidance for.',
    expectation: 'Mentorship Expectations',
    aboutSelf: 'Explain the professional challenges you are seeking guidance for.',
    packageType: 'Basic - $20',
    agreement: 'Basic - $20',
    signature: '',
    availability: '',
    spots: [],
})
const isFormEdit = ref(true);
const goals = ref([
    {
        label: 'Software Engineering',
        value: 'software engineering',
        icon: ''
    },
    {
        label: 'Data Science',
        value: 'data science',
        icon: ''
    },
    {
        label: 'AI/ML',
        value: 'ai/ml',
        icon: ''
    },
    {
        label: 'Leadership',
        value: 'leadership',
        icon: ''
    }
]);
const interest = ref([
    {
        label: 'Software Engineering',
        value: 'software engineering',
        icon: ''
    },
    {
        label: 'Data Science',
        value: 'data science',
        icon: ''
    },
    {
        label: 'AI/ML',
        value: 'ai/ml',
        icon: ''
    },
    {
        label: 'Leadership',
        value: 'leadership',
        icon: ''
    }
]);
const availability = ref([
    {
        label: '10 October',
        subLabel: '21 Spots',
        value: '21 spots'
    },
    {
        label: '12 October',
        subLabel: '13 Spots',
        value: '13 spots'
    },
]);
const spots = ref([
    {
        label: '20:30',
        value: '20:30',
        icon: ''
    },
    {
        label: '21:00',
        value: '21:00',
        icon: ''
    },
    {
        label: '21:30',
        value: '21:30',
        icon: ''
    },
    {
        label: '22:00',
        value: '22:00',
        icon: ''
    }
]);

const validate = async (stepIndex) => {
    const errors = [];
    /*if (stepIndex === 0) {
        if (!step1Data.name) errors.push("Name is required.");
        if (!step1Data.email) errors.push("Email is required.");
    } else if (stepIndex === 1) {
        if (!step2Data.address) errors.push("Address is required.");
    }*/

    currentValidationErrors.value = errors;
    return errors.length === 0;
};

const updateData = (data) => {
    form[data.name] = data.data;
};

const isLoading = ref(false);

function handleSubmit() {
    isLoading.value = true;
    router.post('/signup', form, {
        onFinish: () => {
            isLoading.value = false;
        },
    });
}
</script>

<template>
    <div>

        <h2 class="primary-title">
            Subscription plan
        </h2>
        <div class="card card-border card-shadow flex-col">
            <div class="card-header border-b border-primary-250">
                <h2 class="card-title text-secondary w-full">
                    Professional Mentee
                </h2>
                <div class="flex md:flex-row items-center justify-end gap-3 w-full">
                    <Anchor href="#" class="btn btn-md btn-white subscription-plan__card-btn">
                        Cancel Plan
                    </Anchor>
                    <Button @click.prevent="changePlanModal = true"
                            class="btn btn-md btn-primary subscription-plan__card-btn">
                        Change Plan
                    </Button>
                </div>
            </div>
            <div class="card-detail">

                <div class="block w-full subscription-plan__subscription-detail">
                    <div class="subscription-detail__plan">
                        <p class="subscription-detail__plan__text">
                            <span class="subscription-detail__plan__price">$25</span> cad/Month
                        </p>
                        <Anchor href="#" class="anchor anchor-secondary subscription-detail__plan__btn">
                            Downgrade Plan
                        </Anchor>
                    </div>
                    <p class="subscription-detail__text">
                        Designed for users looking for more access to mentorship programs, networking events, and career
                        support
                    </p>
                </div>

            </div>
        </div>

        <h2 class="primary-title mt-10">
            Payment details
        </h2>
        <div class="card card-border flex-col">
            <div class="card-header border-b border-primary-250">
                <div class="payment-details__method-box">
                    <div class="method-box__icon">
                        <Icon name="VisaCardIcon" class="w-[102px] h-[60px]"/>
                    </div>
                    <p class="method-box__text">
                        **** 9396
                        <span class="method-box__text__span">
                                Expiry 10/2024
                            </span>
                    </p>
                </div>
                <div class="flex flex-row justify-end gap-3 w-full mt-3 lg:mt-0">
                    <Button @click.prevent="bookMeetingModal = true"
                            class="btn btn-md btn-primary subscription-plan__card-btn">
                        update payment details
                    </Button>
                </div>
            </div>
        </div>

        <Table label="Payment History" :columns="historyColumns" :data="historyData" :paging="false" :ordering="true"
               :info="false" :searching="false" :tablePaging="false" :responsive="true"></Table>


        <Modal v-model="changePaymentCardModal" :backdrop-prevent="true" title="Pay with Stripe"
               modal-action-classes="justify-end" class="modal-sm modal-rounded-sm modal-shadow-sm">
            <payment-method v-model="changePlanForm" :countries="cardCountryList" :errors="errors"/>
            <template #modalAction>
                <Button class="btn btn-md btn-primary">
                    Pay Now
                </Button>
            </template>
        </Modal>

        <Modal v-model="successModal" :backdrop-prevent="true"
               modal-action-classes="justify-end" class="modal-sm modal-rounded-sm modal-shadow-sm max-w-[520px]">
            <AlertModal title="Your Meeting Is Requested" detail="You will receive a confirmation from your mentor shortly.
Thank you!" header-classes="max-w-60 mx-auto">
                <template #footer>
                    <Button class="btn btn-lg btn-primary py-[13px] leading-[120%] rounded-[10px] uppercase font-inter-bold w-full max-w-[235px]">
                        Back To Mentors
                    </Button>
                </template>
            </AlertModal>
        </Modal>

        <Modal v-model="packageModal" :backdrop-prevent="true"
               modal-action-classes="justify-end" class="modal-sm modal-rounded-sm modal-shadow-sm max-w-[520px]">
            <AlertModal title="Your package has been purchased" detail="" header-classes="max-w-[327px] mx-auto" content-classes="mt-[54px]">
                <template #footer>
                    <Button class="btn btn-lg btn-white py-[13px] leading-[120%] rounded-[10px] uppercase font-inter-medium w-full max-w-[182px]">
                        Book A session
                    </Button>
                    <Button class="btn btn-lg btn-primary py-[13px] leading-[120%] rounded-[10px] uppercase font-inter-bold w-full max-w-[200px]">
                        Back To Mentors
                    </Button>
                </template>
            </AlertModal>
        </Modal>

        <Modal v-model="noteModal" title="Add a note to your Connection Request?" :backdrop-prevent="true" modal-content-classes="pt-12"
               modal-action-classes="justify-center gap-[10px]" class="modal-sm modal-rounded-sm modal-shadow-sm max-w-[520px]">
            <p class="text-primary text-opacity-70 text-size-20 font-inter-medium tracking-wide text-center max-w-[305px] mx-auto">
                Add a note to your <span class="text-primary text-opacity-100 font-inter-semi-bold"> Mentor Name </span> connection request
            </p>
            <template #modalAction>
                <Button type="button" class="btn btn-md btn-border-primary">
                    Add Note
                </Button>
                <Button type="button" class="btn btn-md btn-primary w-full max-w-64">
                    Send Without Note
                </Button>
            </template>
        </Modal>

        <Modal v-model="infoModal" title="Purchase a Package" sub-title="Mentor Name" :backdrop-prevent="true" modal-content-classes=""
               modal-action-classes="justify-center gap-[10px]" class="modal-sm modal-rounded-sm modal-shadow-sm max-w-[520px]">
            <template #default>
                <Input type="text" v-model="personalInformationData.first_name" label="First Name" placeholder="First Name" :readonly="isFormEdit"
                />
                <Input type="text" v-model="personalInformationData.last_name" label="Last Name" placeholder="Last Name" :readonly="isFormEdit"
                />
                <Input type="email" v-model="personalInformationData.email" label="Email" placeholder="Email" :readonly="isFormEdit"
                />
                <Select v-model="goals" :isMultiple="true" :isUseIcon="false" label="What are your mentorship goals" placeholder="What are your mentorship goals" :options="personalInformationData.goals" :readonly="isFormEdit" />
                <Select v-model="interest" :isMultiple="true" :isUseIcon="false" label="Tech Areas of Interest" placeholder="Tech Areas of Interest" :options="personalInformationData.interest" :readonly="isFormEdit" />
                <Input type="text" v-model="personalInformationData.program" label="Preferred Mentorship Program" placeholder="Preferred Mentorship Program" :readonly="isFormEdit"
                />
                <Input type="text" v-model="personalInformationData.challenges" label="Challenges" placeholder="Challenges" :readonly="isFormEdit"
                />
                <Input type="text" v-model="personalInformationData.expectation" label="Mentorship Expectations" placeholder="Mentorship Expectations" :readonly="isFormEdit"
                />
                <Input type="text" v-model="personalInformationData.aboutSelf" label="What else should the mentor know about you" placeholder="What else should the mentor know about you" :readonly="isFormEdit"
                />
                <Input type="text" v-model="personalInformationData.packageType" label="Package Type" placeholder="Package Type" :readonly="isFormEdit"
                />
                <Input type="text" v-model="personalInformationData.agreement" label="Read and sign Mentoring Agreement" placeholder="Read and sign Mentoring Agreement" :readonly="isFormEdit"
                />
                <SignaturePad v-model="personalInformationData.signature" label="Read and sign Mentoring Agreement" :readonly="false" />
            </template>

            <template #modalAction>

                <Button type="button" @click="isFormEdit = !isFormEdit" class="btn btn-lg btn-white py-[13px] leading-[120%] rounded-[10px] uppercase font-inter-bold w-full max-w-[182px]">
                    Edit Details
                </Button>
                <Button type="button" class="btn btn-lg btn-primary py-[13px] leading-[120%] rounded-[10px] uppercase font-inter-bold w-full max-w-[250px]">
                    Purchase Package
                </Button>
            </template>
        </Modal>

        <Modal v-model="bookMeetingModal" title="Book a Meeting" sub-title="Mentor Name" :backdrop-prevent="true" modal-content-classes=""
               modal-action-classes="justify-end gap-[10px]" class="modal-sm modal-rounded-sm modal-shadow-sm max-w-[520px]">
            <template #default>
                <div class="row">
                    <div class="col">
                        <Input type="text" v-model="personalInformationData.first_name" class="form-group_narrow" label="First Name" placeholder="First Name"
                        />
                    </div>
                    <div class="col">
                        <Input type="text" v-model="personalInformationData.last_name" class="form-group_narrow" label="Last Name" placeholder="Last Name"
                        />
                    </div>
                </div>
                <Input type="email" v-model="personalInformationData.email" class="form-group_narrow" label="Email" placeholder="Email"
                />
                <Select v-model="personalInformationData.goals" :isMultiple="true" class="form-group_narrow" :isUseIcon="false" label="What are your mentorship goals" placeholder="What are your mentorship goals" :options="goals" />
                <Select v-model="personalInformationData.interest" :isMultiple="true" class="form-group_narrow" :isUseIcon="false" label="Tech Areas of Interest" placeholder="Tech Areas of Interest" :options="interest" />
                <Input type="text" v-model="personalInformationData.program" class="form-group_narrow" label="Preferred Mentorship Program" placeholder="Preferred Mentorship Program"
                />
                <Input type="text" v-model="personalInformationData.challenges" class="form-group_narrow" label="Challenges" placeholder="Challenges"
                />
                <Input type="text" v-model="personalInformationData.expectation" class="form-group_narrow" label="Mentorship Expectations" placeholder="Mentorship Expectations"
                />
                <Input type="text" v-model="personalInformationData.aboutSelf" class="form-group_narrow" label="What else should the mentor know about you" placeholder="What else should the mentor know about you"
                />
                <Input type="text" v-model="personalInformationData.packageType" class="form-group_narrow" label="Package Type" placeholder="Package Type"
                />
                <Input type="text" v-model="personalInformationData.agreement" class="form-group_narrow" label="Read and sign Mentoring Agreement" placeholder="Read and sign Mentoring Agreement"
                />
                <SignaturePad v-model="personalInformationData.signature" class="form-group_narrow" label="Read and sign Mentoring Agreement" :readonly="false" />

                <RadioGroup :error="errors.availability" class="form-group_narrow" label="Availability">
                    <Radio v-for="(avail, availIndex) in availability" :key="availIndex" v-model="personalInformationData.availability" item-classes="radio-item-plain radio-item-plain__secondary" name="availability" :checked="personalInformationData.availability === 'card'" :value="avail.subLabel" :label="avail.label" :sub-label="avail.subLabel" />
                </RadioGroup>
                <Select v-model="personalInformationData.spots" :isMultiple="false" class="form-group_narrow" :isUseIcon="false" label="Select Spot" placeholder="Select Spot" :options="spots" />
            </template>

            <template #modalAction>
                <Button type="button" class="btn btn-lg btn-primary py-[13px] leading-[120%] rounded-[10px] uppercase font-inter-bold w-full max-w-[210px]">
                    Review Booking
                </Button>
            </template>
        </Modal>

        <Modal v-model="changePlanModal" :backdrop-prevent="true" title="Change Plan/Package"
               modal-action-classes="justify-end" class="modal-md modal-rounded-sm modal-shadow-sm">
            <div v-if="currentValidationErrors.length" class="errors">
                <ul>
                    <li v-for="(error, index) in currentValidationErrors" :key="index">{{ error }}</li>
                </ul>
            </div>
            <Wizard v-model="currentStep" :steps="steps" @validate="validate" @submit="handleSubmit"
                    @updateData="updateData" header-classes="auth-column-form-box"
                    action-classes="auth-column-form-box"/>
        </Modal>

    </div>
</template>

<style scoped>

</style>
