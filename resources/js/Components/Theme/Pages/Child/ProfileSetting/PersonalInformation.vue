<script setup>

import Select from '@/Components/Theme/Utilities/Select.vue';
import Input from '@/Components/Theme/Utilities/Input.vue';
import FileInput from '@/Components/Theme/Utilities/FileInput.vue';
import {computed} from 'vue';

const props = defineProps({
    user: Object || Array,
    countries: Object || Array,
    genders: Object || Array,
    races: Object || Array,
    mentoringFocuses: Object || Array,
    personalInformationData: Object || Array
})

const selectedCountry = computed(() => {
    return props.countries.find(country => country.value === props.user.country_id) || 'Select Country';
});

function updateCountryValue(data) {
    props.personalInformationData.value.country = data.value;
}

function updateNameValue(data) {
    props.personalInformationData.value.first_name = data.value;
}
</script>

<template>

    <div>
        <FileInput v-model="personalInformationData.profile_image" image-url="" class="" label="Your Photo"
                   placeholder="JPG or PNG, 1MB max"/>
        <div class="col">
            <Select v-model="personalInformationData.mentoring_focus" :isUseIcon="false"
                    label="Mentoring Focus" placeholder="Mentoring Focus" :options="mentoringFocuses" @updateModalValue=""/>
        </div>
        <div class="row">
            <div class="col">
                <Input type="text" v-model="personalInformationData.first_name" class="" label="First Name" placeholder="First Name" @updateModalValue="updateNameValue"
                />
            </div>
            <div class="col">
                <Input type="text" v-model="personalInformationData.last_name" class="" label="Last Name" placeholder="Last Name"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <Select v-model="personalInformationData.gender" :isUseIcon="false"
                        @updateModalValue=""
                        label="Gender" placeholder="Gender" :options="genders"/>
            </div>
            <div class="col">
                <Select v-model="personalInformationData.race" :isUseIcon="false"
                        @updateModalValue=""
                        label="Race" placeholder="Race" :options="races"/>
            </div>
        </div>
        <h2 class="font-inter-bold text-size-16 leading-[150%] text-primary text-opacity-60 mb-[10px]">
            Location
        </h2>
        <div class="row">
            <div class="col">
                <Input type="text" v-model="user.city" class="" label="City" placeholder="City" />
            </div>
            <div class="col">
                <Input type="text" v-model="user.province" class="" label="Province" placeholder="Province"/>
            </div>
        </div>
        <Select v-model="personalInformationData.country"
                :is-multiple="false"
                label="Country"
                placeholder="Select Country"
                :options="countries"
                @updateModalValue="updateCountryValue"
        />
        <h2 class="font-inter-bold text-size-16 leading-[150%] text-primary text-opacity-60 mb-[10px]">
            Password
        </h2>
        <div class="row">
            <div class="col">
                <Input type="password" v-model="personalInformationData.password" class="" label="New Password"
                       placeholder="New Password" autocomplete="off"/>
            </div>
            <div class="col">
                <Input type="password" v-model="personalInformationData.confirmation_password" class=""
                       label="Confirm Password"
                       placeholder="Confirm Password" autocomplete="off"/>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
