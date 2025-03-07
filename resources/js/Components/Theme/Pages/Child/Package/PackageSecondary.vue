<script setup>
import {v4 as uuid} from 'uuid';
import { ref, defineProps, defineEmits } from 'vue';
import Icon from "@/Components/Theme/Icon/Icon.vue";
import Button from '@/Components/Theme/Utilities/Button.vue';

const props = defineProps({
    id: {
        type: String,
        default: () => `radio-input-${uuid()}`
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

    <div class="package-box sm:max-w-full">
        <div class="package-item w-full before:hidden cursor-default" @click="radioChecked">
            <h3 class="package-item-price pt-5 px-6">
                {{ package.price }}
                <span class="package-item-type" v-text="package.type"></span>
            </h3>
            <p class="package-item-detail md:max-w-full pt-[2px] px-6" v-text="package.detail"></p>
            <ul class="package-list px-6">
                <li class="package-list-item border-b-0 py-[5px] gap-1" v-for="(listItem, listItemIndex) in package.list" :key="listItemIndex">
                    <Icon :name="listItem.icon" class="w-[16px] h-[16px]" />
                    <p class="package-list-text" v-text="listItem.title"></p>
                </li>
            </ul>
            <Button type="button" class="btn btn-sm btn-primary mb-5 mt-6 mx-[23px]" icon="rightArrowSimpleIcon" iconPosition="right" iconClasses=" w-[11px] h-[8px]">
                Purchase
            </Button>
        </div>
    </div>
</template>

<style scoped>

</style>
