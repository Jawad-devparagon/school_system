<script setup>
import {ref, defineProps, defineEmits, computed} from 'vue';

const props = defineProps({
    layout: {
        type: String,
        default: 'default',
        required: false,
    },
});

const setTabLayout = computed(() => {
    if( props.layout === 'left-header' ) {
        return 'side-layout'
    } else {
        return 'default-layout'
    }
})
</script>

<template>
    <div class="tab-wrapper">
        <div class="tab-box" :class="setTabLayout">
            <div class="tab-header">
                <div class="tab-header__inner">
                    <slot name="header" />
                </div>
            </div><!-- col end -->
            <div class="tab-content">
                <slot name="content" />
            </div><!-- col end -->
        </div>
    </div>
</template>

<style scoped>

</style>
