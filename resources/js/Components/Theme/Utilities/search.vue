<script setup>

import Input from '@/Components/Theme/Utilities/Input.vue';
import {computed, defineProps, reactive, ref} from 'vue';
import Button from '@/Components/Theme/Utilities/Button.vue';
import Anchor from "@/Components/Theme/Utilities/Anchor.vue";

defineProps({ errors: Object })

const search = reactive({
    searchText: '',
    data: [
        'Session start in 20 minutes',
        'Zoya request you to get Mentor',
    ]
});
const isSearch = ref(false);
const isLoading = ref(false);
const iconUpdate = computed(() => {
    if( isSearch.value === true ) {
        return {
            icon: 'cross',
            iconClasses: 'text-primary text-opacity-60 w-[24px] h-[24px]'
        }
    } else {
        return {
            icon: 'searchIcon',
            iconClasses: 'text-transparent stroke-primary-600 w-[24px] h-[24px]'
        }
    }
});


</script>

<template>
    <div class="search-wrapper">
        <div class="search-box">
            <div class="search-form">
                <Input type="text" v-model="search.searchText" class="w-full max-w-[350px] mb-0" :class="{'active': isSearch}" name="search_text" placeholder="Type Search" autocomplete="off" />
                <Button type="button" class="search-btn" :loading="isLoading" :icon="iconUpdate.icon" iconPosition="left" :iconClasses="iconUpdate.iconClasses" @click="isSearch = !isSearch"></Button>
            </div>

            <div class="search-content" v-if="(isSearch && search.data.length > 0)">
                <ul class="auth-dropdown-box">
                    <li v-for="(data, dataIndex) in search.data" :key="dataIndex" class="auth-dropdown-box__item auth-dropdown-box__item_search">
                        <Anchor href="#" class="auth-dropdown__item__link" v-text="data"></Anchor>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</template>

<style scoped>

</style>
