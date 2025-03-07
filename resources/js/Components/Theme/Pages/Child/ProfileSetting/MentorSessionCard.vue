<script setup>
import Anchor from "@/Components/Theme/Utilities/Anchor.vue";
import {usePage} from "@inertiajs/vue3";
import Icon from "@/Components/Theme/Icon/Icon.vue";
import Select from "@/Components/Theme/Utilities/Select.vue";
import Input from "@/Components/Theme/Utilities/Input.vue";
import {ref} from "vue";
import DropdownToggleButton from '@/Components/Theme/Utilities/Dropdown/DropdownToggleButton.vue';
import DropdownMenu from '@/Components/Theme/Utilities/Dropdown/DropdownMenu.vue';
import DropdownGroup from '@/Components/Theme/Utilities/Dropdown/DropdownGroup.vue';

const page = usePage();

const groupList = ref([
    {
        title: 'Session Type',
        status: 'Available',
        imageUrl: `${page.props.BASE_PATH}assets/images/session-image.png`,
        date: '24 Oct 2024',
    },
    {
        title: 'Session Type',
        status: 'Available',
        imageUrl: `${page.props.BASE_PATH}assets/images/session-image.png`,
        date: '24 Oct 2024',
    },
    {
        title: 'Session Type',
        status: 'Available',
        imageUrl: `${page.props.BASE_PATH}assets/images/session-image.png`,
        date: '24 Oct 2024',
    },
    {
        title: 'Session Type',
        status: 'Available',
        imageUrl: `${page.props.BASE_PATH}assets/images/session-image.png`,
        date: '24 Oct 2024',
    },
    {
        title: 'Session Type',
        status: 'Available',
        imageUrl: `${page.props.BASE_PATH}assets/images/session-image.png`,
        date: '24 Oct 2024',
    },
    {
        title: 'Session Type',
        status: 'Available',
        imageUrl: `${page.props.BASE_PATH}assets/images/session-image.png`,
        date: '24 Oct 2024',
    },
])

const skills = ref([
    {
        label: 'Session Type',
        value: 'session_type',
        icon: ''
    },
]);

const locations = ref([
    {
        label: 'Date',
        value: 'date',
        icon: ''
    },
]);

const mentorFocus = ref([
    {
        label: 'Duration',
        value: 'duration',
        icon: ''
    },
]);

</script>

<template>
    <div class="card flex-col">
        <div class="card-detail flex-col p-0">

            <div class="flex flex-col md:flex-row justify-between gap-[10px] mb-6">

                <Select :isUseIcon="false" :isMultiple="false" placeholder="Type Search" :options="skills" class="w-full mb-0" />

                <Select :isUseIcon="false" :isMultiple="false" placeholder="Type Search" :options="locations" class="w-full mb-0" />

                <Select :isUseIcon="false" :isMultiple="false" placeholder="Type Search" :options="mentorFocus" class="w-full mb-0" />

                <Input type="text" class="" label="" placeholder="Search" :isCardInput="false" iconName="searchIcon" iconClasses="text-transparent stroke-primary-600 w-[14px] h-[14px]" />


            </div>

            <div class="profile-card__card-detail">
                <div v-for="(profileData, profileDataIndex) in groupList" :key="profileDataIndex" class="card card-border card-small card-small_horizontal col-span-1">
                    <div class="card-header card-small__header">
                        <Anchor href="#" class="card-thumbnail card-small__header__thumbnail">
                            <img :src="profileData.imageUrl" alt="user profile image" width="80" height="80" loading="lazy" />
                        </Anchor>
                        <div class="card-small__header__info-box">
                            <Anchor href="#">
                                <h2 class="card-title card-small__header__title" v-text="profileData.title"></h2>
                            </Anchor>
                            <p class="card-sub-title card-small__header__sub-title" v-if="profileData.status">
                                {{ profileData.status }}
                            </p>
                            <p class="card-small__header__date" v-if="profileData.date">
                                <span> <Icon name="calendarIcon" class="w-[16px] h-[17px]" /> {{ profileData.date }} </span>
                                <span> <Icon name="clockIcon" class="w-[16px] h-[17px]" />  10 PM</span>
                            </p>
                        </div>
                        <div class="card__card-action__ellipse-btn">
                            <!-- @todo: remove dropdown js script, need create dropdown in pure vue script -->
                            <DropdownGroup>
                                <DropdownToggleButton icon="ellipseHorizontalIcon" iconClasses="w-[13px] h-[3px] text-primary text-opacity-60 stroke-primary-600" iconPosition="left" class="">
                                </DropdownToggleButton>
                                <DropdownMenu class="dropdown-menu-plain dropdown-popover dropdown-align-right">
                                    <ul class="auth-dropdown-box">
                                        <li class="auth-dropdown-box__item">
                                            <Anchor href="#" class="auth-dropdown__item__link">
                                                Session start in 20 minutes
                                            </Anchor>
                                        </li>
                                        <li class="auth-dropdown-box__item auth-dropdown-box__item_border py-0"></li>
                                        <li class="auth-dropdown-box__item">
                                            <Anchor href="#" class="auth-dropdown__item__link">
                                                Zoya request you to get Mentor
                                            </Anchor>
                                        </li>
                                        <li class="auth-dropdown-box__item auth-dropdown-box__item_border py-0"></li>
                                        <li class="auth-dropdown-box__item">
                                            <Anchor href="#" class="auth-dropdown__item__link">
                                                Session start in 20 minutes
                                            </Anchor>
                                        </li>
                                    </ul>
                                </DropdownMenu>
                            </DropdownGroup>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<style scoped>

</style>
