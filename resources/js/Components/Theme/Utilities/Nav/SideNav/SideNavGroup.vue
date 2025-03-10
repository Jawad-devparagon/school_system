<script setup>

import {onMounted, ref} from 'vue';
import SideNavLink from '@/Components/Theme/Utilities/Nav/SideNav/SideNavLink.vue';
import DropdownGroup from '@/Components/Theme/Utilities/Dropdown/DropdownGroup.vue';
import DropdownToggleButton from '@/Components/Theme/Utilities/Dropdown/DropdownToggleButton.vue';
import DropdownMenu from '@/Components/Theme/Utilities/Dropdown/DropdownMenu.vue';
import Icon from "@/Components/Theme/Icon/Icon.vue";

const menus = ref([
    {
        label: 'Dashboard',
        linkUrl: '#',
        linkClasses: 'active',
        icon: 'dashboardIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left'
    },
    {
        label: 'Messages',
        linkUrl: '#',
        linkClasses: '',
        icon: 'messageIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left'
    },
    {
        label: 'Mentors',
        linkUrl: '#',
        linkClasses: '',
        icon: 'shareKnowledgeIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left',
        children: [
            {
                label: 'My Mentors',
                linkUrl: '#',
                linkClasses: 'side-nav-dropdown-link active',
                icon: '',
                iconClasses: '',
                iconPosition: ''
            },
        ]
    },
    {
        label: 'Group Mentoring Cohorts',
        linkUrl: '#',
        linkClasses: '',
        icon: 'groupMessageIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left'
    },
    {
        label: 'Community',
        linkUrl: '#',
        linkClasses: '',
        icon: 'usersGroupIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left',
        children: [
            {
                label: 'Auto Generated Mentee',
                linkUrl: '#',
                linkClasses: 'side-nav-dropdown-link active',
                icon: '',
                iconClasses: '',
                iconPosition: ''
            },
            {
                label: 'Search Mentee',
                linkUrl: '#',
                linkClasses: 'side-nav-dropdown-link',
                icon: '',
                iconClasses: '',
                iconPosition: ''
            },
            {
                label: 'My Connected Mentees',
                linkUrl: '#',
                linkClasses: 'side-nav-dropdown-link',
                icon: '',
                iconClasses: '',
                iconPosition: ''
            },
            {
                label: 'Forum Discussions',
                linkUrl: '#',
                linkClasses: 'side-nav-dropdown-link',
                icon: '',
                iconClasses: '',
                iconPosition: ''
            },
        ]
    },
    {
        label: 'Courses',
        linkUrl: '#',
        linkClasses: '',
        icon: 'coursesIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left'
    },
    {
        label: 'Jobs',
        linkUrl: '#',
        linkClasses: '',
        icon: 'briefcaseIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left'
    },
    {
        label: 'Events',
        linkUrl: '#',
        linkClasses: '',
        icon: 'calendarIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left'
    },
    {
        label: 'FAQ',
        linkUrl: '#',
        linkClasses: '',
        icon: 'helpCircleIcon',
        iconClasses: 'w-[24px] h-[24px]',
        iconPosition: 'left'
    },
])


</script>

<template>

  <nav class="side-nav-wrapper">
    <ul class="side-nav-wrapper__con">
        <template v-for="(menu, menuIndex) in menus">
            <template v-if="!menu.children">
                <SideNavLink :label="menu.label" :linkUrl="menu.linkUrl" :linkClasses="menu.linkClasses" :icon="menu.icon" :iconClasses="menu.iconClasses" :iconPosition="menu.iconPosition" :key="menuIndex" />
            </template>
            <template v-if="menu.children">
                <li class="side-nav-wrapper__con__item">
                    <DropdownGroup>
                        <DropdownToggleButton :icon="menu.icon" :iconClasses="menu.iconClasses" :iconPosition="menu.iconPosition" class="side-nav-wrapper__con__item__nav">
                            {{ menu.label }}
                            <div class="side-nav-dropdown-icon">
                                <Icon name="arrowDownIcon" class="w-[16px] h-[16px] text-transparent transition ease-in-out duration-300 stroke-white group-hover:stroke-primary group-[&.active]:stroke-primary group-[&.active]:rotate-180" />
                            </div>
                        </DropdownToggleButton>
                        <DropdownMenu class="side-nav-dropdown-wrapper">
                            <ul class="side-nav-dropdown-con">
                                <SideNavLink v-for="(child, childIndex) in menu.children" class="side-nav-dropdown-item" :label="child.label" :linkUrl="child.linkUrl" :linkClasses="child.linkClasses" :icon="child.icon" :iconClasses="child.iconClasses" :iconPosition="child.iconPosition" :key="childIndex" />
                            </ul>
                        </DropdownMenu>
                    </DropdownGroup>
                </li>
            </template>
        </template>
    </ul>
  </nav>

</template>

<style scoped>

</style>
