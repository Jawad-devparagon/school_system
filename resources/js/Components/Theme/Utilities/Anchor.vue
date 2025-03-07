<script setup>
import { defineProps } from 'vue';
import {Link} from "@inertiajs/vue3";
import Icon from "@/Components/Theme/Icon/Icon.vue";

const props = defineProps({
    icon: {
        type: String,
        default: null,
        required: false
    },
    iconPosition: {
        type: String,
        default: 'right',
        required: false
    },
    iconClasses: {
        type: String,
        default: null,
        required: false
    }
});
</script>

<template>
  <Link>
    <template v-if="iconPosition === 'left'">
        <Icon :name="icon" :class="iconClasses" />
    </template>
    <slot />
    <template v-if="iconPosition === 'right'">
        <Icon :name="icon" :class="iconClasses" />
    </template>
  </Link>
</template>

<style scoped>

</style>
