<script setup>
import Input from '@/Components/Theme/Utilities/Input.vue';
import Select from '@/Components/Theme/Utilities/Select.vue';
import {ref} from 'vue';

const skills = ref([
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
]);

const certifications = ref([
    {
        label: 'Software Engineering Certificate',
        value: 'software engineering',
        icon: ''
    },
    {
        label: 'Data Science Certificate',
        value: 'data science',
        icon: ''
    },
    {
        label: 'AI/ML Certificate',
        value: 'ai/ml',
        icon: ''
    },
    {
        label: 'Leadership Certificate',
        value: 'leadership',
        icon: ''
    },
]);

function updateCountryModalValue(data) {
}

const backgroundInfo = ref({
    current_occupation: null,
    current_industry: null,
    certifications: null,
    years_of_experience: null,
    skills: null,
    other_skills: null,
})
</script>

<template>
    <div>

        <Input type="text" v-model="backgroundInfo.current_occupation" class="" label="Current Occupation" placeholder="Job Title" />

        <Input type="text" v-model="backgroundInfo.current_industry" class="" label="Current Industry" placeholder="Industry" />

        <Select v-model="backgroundInfo.certifications" :isUseIcon="false" :isMultiple="true" @updateModalValue="updateCountryModalValue" label="Certifications" placeholder="Certifications" :options="certifications" />

        <Input type="text" v-model="backgroundInfo.years_of_experience" class="" label="Years of Experience" placeholder="Years of Experience" />

        <Select v-model="backgroundInfo.skills" :isUseIcon="false" :isMultiple="true" @updateModalValue="updateCountryModalValue" label="Skills You Currently Have" placeholder="Type search" :options="skills" />

        <Select v-model="backgroundInfo.other_skills" :isUseIcon="false" :isMultiple="true" @updateModalValue="updateCountryModalValue" label="Other Skills" placeholder="Type search" :options="skills" />

    </div>
</template>

<style scoped>

</style>
