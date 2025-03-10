<script setup>

import {defineProps, reactive} from "vue";
import Button from "@/Components/Theme/Utilities/Button.vue";

const props = defineProps({
    columns: {
        type: [Object, Array],
        default: [],
        required: true
    },
    data: {
        type: [Object, Array],
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

    <DataTable
        :data="tableConfig.rows"
        :columns="tableConfig.columns"
        :options="tableConfig.options"
        class="display"
    >
        <template #mentor="{cellData}">
            <div class="card flex-col p-0 bg-transparent">
                <div class="card-header p-0">
                    <div class="payment-details__method-box gap-[15px]">
                        <div class="method-box__icon rounded-full">
                            <img :src="cellData.profileUrl" alt="Mentor Profile Image" class="w-[30px] h-[30px]" />
                        </div>
                        <p class="method-box__text text-[12px]">
                            {{cellData.name}}
                            <span class="method-box__text__span text-[10px]">
                                {{cellData.email}}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </template>
        <template #status="{cellData}">
            <div class="btn btn-xs uppercase w-fit cursor-pointer font-arial" :class="{'btn-warning': cellData === 'pending', 'btn-success': cellData === 'accepted'}">
                {{ cellData }}
            </div>
        </template>
        <template #action="props">
            <Button type="button" class="btn btn-xs btn-secondary font-arial" icon="eye" iconPosition="left" iconClasses=" w-[32px] h-[20px]">
                View Profile
            </Button>
        </template>
    </DataTable>

</template>

<style scoped>

</style>
