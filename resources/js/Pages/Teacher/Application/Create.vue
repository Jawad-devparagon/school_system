<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Button from '@/Components/Theme/Utilities/Button.vue';
import Input from '@/Components/Theme/Utilities/Input.vue';
import Select from '@/Components/Theme/Utilities/Select.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
      degrees: {
          type: Array
      }
});

const form = useForm({
  years_of_experience: '',
  degrees: [],
});
const submit = () => {
  form.post(route('teacher.application'), {
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Application" />

    <form @submit.prevent="submit">
      <div>
        <Input
            :label="'Years of Experience'"
            :id="'years_of_experience'"
            :type="'number'"
            :class="'mt-1 block w-full'"
            v-model="form.years_of_experience"
            autofocus
            autocomplete="years_of_experience"
        />
        <span class="mt-2 text-red-500 ">{{ form.errors.years_of_experience }}</span>
      </div>

      <div>

        <Select :isMultiple="true" :options="degrees" v-model="form.degrees" :label="'Degrees'" />

        <span class="mt-2 text-red-500 ">{{ form.errors.degrees }}</span>
      </div>

      <div class="mt-4 flex items-center justify-end">

        <Button
            class="ms-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
        >
          Submit
        </Button>
      </div>
    </form>
  </GuestLayout>
</template>
