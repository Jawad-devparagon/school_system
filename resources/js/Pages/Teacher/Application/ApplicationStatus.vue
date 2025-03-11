<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Anchor from '@/Components/Theme/Utilities/Anchor.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  status: {
    type: String,
  },
});

</script>

<template>
  <GuestLayout>
    <Head title="Application Status" />
    <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow-md">
      <span class="text-lg font-semibold text-gray-700">
        {{ status }}
      </span>

      <Anchor v-if="status === 'approved'"
          :href="route('dashboard')"
          :class="'rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'"
      >
        Dashboard
      </Anchor>

      <Anchor v-if="status === 'rejected'"
          :href="route('teacher.application.create')"
          :class="'rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'"
          >
         Create Application
      </Anchor>

    </div>
  </GuestLayout>
</template>
