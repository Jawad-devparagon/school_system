<script setup>
import {v4 as uuid} from 'uuid';
import { defineProps, defineEmits } from 'vue';

import Icon from '@/Components/Theme/Icon/Icon.vue';

const props = defineProps({
    id: {
        type: String,
        default: () => `modal-${uuid()}`,
        required: false
    },
    title: {
        type: String,
        default: '',
        required: false
    },
    subTitle: {
        type: String,
        default: '',
        required: false
    },
    modelValue: {
        type: Boolean,
        default: false,
        required: true
    },
    modalContentClasses: {
        type: String,
        default: '',
        required: false
    },
    modalActionClasses: {
        type: String,
        default: '',
        required: false
    },
    backdropPrevent: {
        type: Boolean,
        default: false,
        required: false
    }
});
const emit = defineEmits(['update:modelValue']);

const toggleModal = () => {
    emit('update:modelValue', false);
}

const backdropPreventTrigger = () => {
    if(props.backdropPrevent === false) {
        emit('update:modelValue', false);
    }
}
</script>

<script>
export default {
    inheritAttrs: false
}
</script>

<template>

    <Teleport to="body">
        <transition name="modal">
            <div v-if="modelValue" class="modal" :id="id">
                <div class="modal-wrapper" :class="$attrs.class">
                    <div class="modal-header" :class="{'modal-header_primary': title !== ''}">
                        <h2 v-if="title !== ''" class="modal-header-title">
                            {{ title }}
                            <span v-if="subTitle !== ''" class="modal-header-subtitle" v-text="subTitle"></span>
                        </h2>
                        <span @click="toggleModal" class="modal-close" :class="{'modal-close-plain': title === ''}">
                            <Icon name="cross" :class="(title !== '' && title != null) ? 'w-[11px] h-[11px] text-gray' : 'w-[20px] h-[20px] text-white'" />
                        </span>
                    </div>
                    <div v-if="$slots.default" class="modal-content" :class="modalContentClasses">
                        <slot name="default" />
                    </div>
                    <div v-if="$slots.modalAction" class="modal-action" :class="modalActionClasses">
                        <slot name="modalAction" />
                    </div>
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div class="modal-overlay" v-show="modelValue" @click.prevent="backdropPreventTrigger"></div>
        </transition>
    </Teleport>
</template>

<style>
/* Modal Animations */
.modal-enter-active,
.modal-leave-active {
    transition: all 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    transform: translateY(-50px);
    opacity: 0;
}

.modal-enter-to,
.modal-leave-from {
    transform: translateY(0);
    opacity: 1;
}

/* Overlay Animations */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.fade-enter-to,
.fade-leave-from {
    opacity: 1;
}

</style>
