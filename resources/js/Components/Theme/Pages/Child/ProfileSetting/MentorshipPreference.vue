<script setup>
import Input from '@/Components/Theme/Utilities/Input.vue';
import Select from '@/Components/Theme/Utilities/Select.vue';
import {ref} from 'vue';

const mentorSkills = ref([
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

const modelsAndProgram = ref([
    {
        label: 'Group',
        value: 'group',
        icon: ''
    },
    {
        label: 'One-On-One',
        value: 'one-on-one',
        icon: ''
    },
]);

function updateCountryModalValue(data) {
}

</script>

<template>
    <div>

        <div class="row">
            <div class="col">
                <Input type="text" class="" label="Mentoring Focus" placeholder="Mentoring Focus" />
            </div>
        </div>

        <Select :isUseIcon="false" :isMultiple="true" @updateModalValue="updateCountryModalValue" label="Preferred Mentors Skills" placeholder="Type Search" :options="mentorSkills" />

        <Select :isUseIcon="false" :isMultiple="true" @updateModalValue="updateCountryModalValue" label="Interested Mentoring Models and Programs" placeholder="Type Search" :options="modelsAndProgram" />

    </div>
</template>

<style scoped>

</style>
