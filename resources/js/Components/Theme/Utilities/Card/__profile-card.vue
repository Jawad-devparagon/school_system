<script setup>
import Icon from '@/Components/Theme/Icon/Icon.vue';
import Button from '@/Components/Theme/Utilities/Button.vue';
import {ref, defineProps} from 'vue';

const props = defineProps({
    profileData: {
        type: Object || Array,
        default: () => [],
        required: true
    },
})

const getVisibleCourses = (courses) => courses.slice(0, 2);
const getRemainingCoursesCount = (courses) => courses.length - 2;

</script>

<template>

    <div class="card card-border card-accordion-shadow profile-card">
        <div class="card-header profile-card__header">
            <div class="card-thumbnail profile-card__header__thumbnail">
                <img :src="profileData.profileUrl" alt="user profile image" width="48" height="48" loading="lazy" />
            </div>
            <h2 class="card-title profile-card__header__title" v-text="profileData.name"></h2>
            <p class="card-sub-title profile-card__header__sub-title">
                <Icon name="markerIcon" class="w-[9px] h-[11px] text-transparent stroke-primary" /> {{ profileData.location }}
            </p>

            <p class="chip-item chip-success chip-sm chip-rounded font-inter-bold uppercase text-center profile-card__header__badge" v-text="profileData.status"></p>

            <ul class="chip-box profile-card__header__chip-box">
                <li class="chip-item chip-border-primary-600 chip-sm chip-rounded chip-border profile-card__header__chip-item" v-for="(course, courseIndex) in getVisibleCourses(profileData.courses)" :key="courseIndex" v-text="course"></li>
                <li class="chip-item chip-border-primary-600 chip-sm chip-border-none profile-card__header__chip-item" v-if="getRemainingCoursesCount(profileData.courses) > 0">
                    +{{ getRemainingCoursesCount(profileData.courses) }} more
                </li>
            </ul>
        </div>
        <div class="card-content profile-card__content">

            <div class="card-wel card-call-wel" v-if="profileData.freeIntroCall !== '' && profileData.freeIntroCall !== undefined">
                <div class="card-wel-box">
                    <div class="card-wel-title"> <Icon name="telephoneIcon" class="w-[12px] h-[12px]"></Icon> Free Intro Call </div>
                    <div class="card-wel-sub-title"> {{ profileData.freeIntroCall }} </div>
                </div>
            </div>

            <div class="card-wel card-fee-wel" v-if="profileData.courseFee !== '' && profileData.courseFee !== undefined">
                <div class="card-wel-box">
                    <div class="card-wel-title"> 1:1 Mentor Fee </div>
                    <div class="card-wel-sub-title"> {{ profileData.courseFee }} </div>
                </div>
            </div>

            <div class="card card-border package-card" v-if="profileData.packages && true" v-for="(coursePackage, coursePackageIndex) in profileData.packages" :key="coursePackageIndex">
                <div class="card-header package-card__header">
                    <h2 class="card-title package-card__header__title" v-text="coursePackage.title"></h2>
                    <p class="card-sub-title package-card__header__sub-title">
                        {{ coursePackage.price }} <span> ({{coursePackage.limit}}) </span>
                    </p>
                </div>
                <div class="card-content package-card__content">
                    <p class="package-card__content__text" v-text="coursePackage.detail"></p>
                    <Button type="button" class="btn btn-primary btn-sm package-card__content__btn"> Purchase </Button>
                </div>
            </div>

            <Button type="button" class="btn btn-sm btn-primary text-primary bg-opacity-5 border-primary-600 border-opacity-25 profile-card__action mt-[22px]" icon="cross" iconPosition="left" icon-classes="w-[10px] h-[10px]">
                Cancel Request
            </Button>

        </div>
    </div>

</template>

<style scoped>

</style>
