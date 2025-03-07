<script>
export default {
    inheritAttrs: false
}
</script>

<script setup>
import { computed, defineProps } from 'vue';
import WhiteLogo from "@/../assets/images/logo.png";

const props = defineProps({
    variant: {
        type: String,
        default: 'white'
    }
});
</script>

<template>
    <div :class="$attrs.class">
        <img v-if="variant === 'white'" :src="WhiteLogo" v-bind="{ ...$attrs, class: null }" />
    </div>
</template>

<style scoped>

</style>
