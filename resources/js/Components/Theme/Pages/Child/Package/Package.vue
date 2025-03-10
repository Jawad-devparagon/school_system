<script setup>
import {v4 as uuid} from 'uuid';
import { ref, defineProps, defineEmits } from 'vue';
import Icon from "@/Components/Theme/Icon/Icon.vue";

const props = defineProps({
    id: {
        type: String,
        default: () => `radio-input-${uuid()}`
    },
    modelValue: {
        type: String,
        default: '',
        required: false
    },
    package: {
        type: Object,
        default: [],
        required: true,
    }
});
const emit = defineEmits(['update:modelValue']);
const inputRef = ref(null);

function updateValue(event) {
    emit('update:modelValue', event.target.value);
}

function radioChecked() {
    inputRef.value?.click();
    console.log('is input');
}

</script>

<template>
    <div class="package-box">
        <input type="radio" :id="id" ref="inputRef" v-bind="{ ...$attrs, class: null }" class="hidden peer" @change="updateValue" />
        <div class="package-item" @click="radioChecked">
            <h2 class="package-item-title" v-text="package.title"></h2>
            <h3 class="package-item-price">
                {{ package.price }}
                <span class="package-item-type" v-text="package.type"></span>
            </h3>
            <div class="divider"></div>
            <p class="package-item-detail" v-text="package.detail"></p>
            <ul class="package-list">
                <li class="package-list-item" v-for="(listItem, listItemIndex) in package.list" :key="listItemIndex">
                    <p class="package-list-text" v-text="listItem.title"></p>
                    <Icon :name="listItem.icon" class="w-[16px] h-[16px]" />
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>

</style>
