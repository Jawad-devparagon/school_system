<script setup>
import {reactive, defineProps, defineEmits} from 'vue';
import DropdownMenu from '@/Components/Theme/Utilities/Dropdown/DropdownMenu.vue';
import Anchor from '@/Components/Theme/Utilities/Anchor.vue';
import DropdownToggleButton from '@/Components/Theme/Utilities/Dropdown/DropdownToggleButton.vue';
import DropdownGroup from '@/Components/Theme/Utilities/Dropdown/DropdownGroup.vue';
import Checkbox from '@/Components/Theme/Utilities/Checkbox.vue';

const props = defineProps({
    label: {
        type: String || Number,
        default: '',
        required: false
    },
    modelValue: {
        type: String || Number,
        default: '',
        required: false
    },
    columns: {
        type: Object || Array,
        default: [],
        required: true
    },
    data: {
        type: Object || Array,
        default: [],
        required: true
    },
    tablePaging: {
        type: Boolean,
        default: false,
        required: false
    },
    searching: {
        type: Boolean,
        default: false,
        required: false
    },
    ordering: {
        type: Boolean,
        default: false,
        required: false
    },
    info: {
        type: Boolean,
        default: false,
        required: false
    },
    responsive: {
        type: Boolean,
        default: true,
        required: false
    },
});
const emit = defineEmits(['update:modelValue']);

const tableConfig = reactive({
    columns: props.columns,
    rows: props.data,
    options: {
        paging: props.tablePaging,
        searching: props.searching,
        ordering: props.ordering,
        info: props.info,
        responsive: props.responsive,
    },
});
</script>

<template>
    <div>
        <h2 v-if="label !== ''" class="primary-title mt-10" v-text="label"></h2>
        <DataTable
            :data="tableConfig.rows"
            :columns="tableConfig.columns"
            :options="tableConfig.options"
            class="display"
        >
            <template #checkbox="props">
                <Checkbox class="m-0" />
            </template>
            <template #action="props">
                <DropdownGroup class="flex justify-end">
                    <DropdownToggleButton icon="EllipseIcon" iconClasses="w-[4px] h-[14px] text-primary text-opacity-60 stroke-primary-600" iconPosition="left" class="dropdown-toggle-icon py-0"></DropdownToggleButton>
                    <DropdownMenu class="dropdown-menu-plain dropdown-popover dropdown-align-right dropdown-align-bottom">
                        <ul class="auth-dropdown-box">
                            <li class="auth-dropdown-box__item">
                                <Anchor href="#" class="auth-dropdown__item__link">
                                    Edit
                                </Anchor>
                            </li>
                            <li class="auth-dropdown-box__item auth-dropdown-box__item_border py-0"></li>
                            <li class="auth-dropdown-box__item">
                                <Anchor href="#" class="auth-dropdown__item__link">
                                    Delete
                                </Anchor>
                            </li>
                            <li class="auth-dropdown-box__item auth-dropdown-box__item_border py-0"></li>
                            <li class="auth-dropdown-box__item">
                                <Anchor href="#" class="auth-dropdown__item__link">
                                    View
                                </Anchor>
                            </li>
                        </ul>
                    </DropdownMenu>
                </DropdownGroup>
            </template>
        </DataTable>
    </div>
</template>

<style scoped>
</style>
