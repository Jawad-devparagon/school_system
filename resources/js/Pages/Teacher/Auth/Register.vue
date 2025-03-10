<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Button from '@/Components/Theme/Utilities/Button.vue';
import Input from '@/Components/Theme/Utilities/Input.vue';
import Select from '@/Components/Theme/Utilities/Select.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Anchor from "@/Components/Theme/Utilities/Anchor.vue";

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  country_id: '',
  mobile_no: '',
  address: '',
  dob: '',
  gender: '',
});

const props = defineProps({
  countries: {
    type: Array,
  },
  genders: {
    type: Array,
  }
});
const submit = () => {
  form.post(route('teacher.register.store'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Register" />

    <form @submit.prevent="submit">
      <div>

        <Input
            id="name"
            label="Name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.name"
            autofocus
            autocomplete="name"
        />

        <span v-if="form.errors.name" class="mt-2 text-red-500">{{form.errors.name}}</span>
      </div>

      <div class="mt-4">

        <Input
            id="email"
            label="Email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            autocomplete="username"
        />

        <span v-if="form.errors.email" class="mt-2 text-red-500">{{form.errors.email}}</span>
      </div>

      <div class="mt-4">

        <Input
            id="password"
            label="Password"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password"
            autocomplete="new-password"
        />

        <span v-if="form.errors.password" class="mt-2 text-red-500">{{form.errors.password}}</span>
      </div>

      <div class="mt-4">

        <Input
            id="password_confirmation"
            label="Confirm Password"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password_confirmation"
            autocomplete="new-password"
        />

        <span v-if="form.errors.password_confirmation" class="mt-2 text-red-500">{{form.errors.password_confirmation}}</span>
      </div>

      <div class="mt-4">
        <Select :options="countries" v-model="form.country_id" :label="'Country'" />
        <span v-if="form.errors.country_id" class="mt-2 text-red-500">{{form.errors.country_id}}</span>
      </div>

      <div class="mt-4">

        <Input
            id="address"
            label="Address"
            type="text"
            class="mt-1 block w-full"
            v-model="form.address"
        />

        <span v-if="form.errors.address" class="mt-2 text-red-500">{{form.errors.address}}</span>
      </div>

      <div class="mt-4">

        <Input
            id="mobile_no"
            label="Mobile No"
            type="number"
            class="mt-1 block w-full"
            v-model="form.mobile_no"
        />

        <span v-if="form.errors.mobile_no" class="mt-2 text-red-500">{{form.errors.mobile_no}}</span>
      </div>

      <div class="mt-4">

        <Input
            id="dob"
            label="DOB"
            type="date"
            class="mt-1 block w-full"
            v-model="form.dob"
        />

        <span v-if="form.errors.dob" class="mt-2 text-red-500">{{form.errors.dob}}</span>
      </div>

      <div class="mt-4">

        <Select :options="genders" v-model="form.gender" label="Gender" />

        <span v-if="form.errors.gender" class="mt-2 text-red-500">{{form.errors.gender}}</span>
      </div>

      <div class="mt-4 flex items-center justify-end">
        <Anchor
            :href="route('login')"
            :class="'rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'"
        >
          Already registered?
        </Anchor>

        <Button
            class="ms-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
        >
          Register
        </Button>
      </div>
    </form>
  </GuestLayout>
</template>
