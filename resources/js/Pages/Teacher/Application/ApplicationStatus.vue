<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Anchor from '@/Components/Theme/Utilities/Anchor.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from "vue";

const props = defineProps({
  status: {
    type: String,
    required: true
  },
});

const showButton = computed(() => props.status === 'approved' || props.status === 'rejected');

const buttonLabel = computed(() =>
    props.status === 'approved' ? 'Dashboard' : 'Create Application'
);

const redirect = computed(() =>
    props.status === 'approved' ? route('dashboard') : route('teacher.application.create')
);

</script>

<template>
  <GuestLayout>
    <Head title="Application Status" />
    <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow-md">
      <span class="text-lg font-semibold text-gray-700">
        {{ status }}
      </span>

      <Anchor v-if="showButton"
              :href="redirect"
              class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
      >
        {{ buttonLabel }}
      </Anchor>

    </div>
  </GuestLayout>
</template>
