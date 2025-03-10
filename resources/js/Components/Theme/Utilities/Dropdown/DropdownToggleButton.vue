<script setup>
import { computed, defineProps } from "vue";
import {Link} from "@inertiajs/vue3";
import Icon from "@/Components/Theme/Icon/Icon.vue";
import Button from "@/Components/Theme/Utilities/Button.vue";

const props = defineProps({
    isImage: {
        type: Boolean,
        default: false,
        required: false,
    },
    icon: {
        type: String,
        default: null,
        required: false,
    },
    iconPosition: {
        type: String,
        default: 'right',
        required: false,
    },
    iconClasses: {
        type: String,
        default: null,
        required: false,
    }
});

</script>

<template>
    <Button class="dropdown-toggle group">
        <template v-if="iconPosition === 'left'">
            <Icon v-if="!isImage" :name="icon" :class="iconClasses" />
            <img v-else :src="icon" :class="iconClasses" :alt="`${icon} image`" loading="lazy" />
        </template>
        <slot name="default" />
        <template v-if="iconPosition === 'right'">
            <Icon v-if="!isImage" :name="icon" :class="iconClasses" />
            <img v-else :src="icon" :class="iconClasses" :alt="`${icon} image`" loading="lazy" />
        </template>
    </Button>
</template>

<style scoped>

</style>
