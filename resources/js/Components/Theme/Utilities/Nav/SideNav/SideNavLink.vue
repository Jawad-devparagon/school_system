<script setup>
import { computed, defineProps } from "vue";
import {Link} from "@inertiajs/vue3";
import Icon from "@/Components/Theme/Icon/Icon.vue";

const props = defineProps({
    label: {
        type: String,
        default: 'Default Label',
        required: true,
    },
    linkUrl: {
        type: String,
        default: 'Url not added',
        required: true,
    },
    linkClasses: {
        type: String,
        default: null,
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
    <li class="side-nav-wrapper__con__item">
        <Link :href="linkUrl" class="side-nav-wrapper__con__item__nav" :class="linkClasses">
            <template v-if="iconPosition === 'left'">
                <Icon :name="icon" :class="iconClasses" />
            </template>
            {{ label }}
            <template v-if="iconPosition === 'right'">
                <Icon :name="icon" :class="iconClasses" />
            </template>
        </Link>
    </li>
</template>

<style scoped>

</style>
