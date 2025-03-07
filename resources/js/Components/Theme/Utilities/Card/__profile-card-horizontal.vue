<script setup>
import Icon from '@/Components/Theme/Icon/Icon.vue';
import Button from '@/Components/Theme/Utilities/Button.vue';
import {ref, defineProps} from 'vue';
import Anchor from '@/Components/Theme/Utilities/Anchor.vue';

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

    <div class="card card-border card-accordion-shadow profile-card profile-card_horizontal">
        <div class="card-header profile-card__header">

            <div class="profile-card__header__info-box">
                <div class="card-thumbnail profile-card__header__thumbnail m-0">
                    <img :src="profileData.profileUrl" alt="user profile image" width="48" height="48" loading="lazy" />
                </div>
                <div class="flex flex-col items-start">
                    <h2 class="card-title profile-card__header__title" v-text="profileData.name"></h2>
                    <p class="card-sub-title profile-card__header__sub-title">
                        <Icon name="markerIcon" class="w-[9px] h-[11px] text-transparent stroke-primary" /> {{ profileData.location }}
                    </p>
                </div>

                <p class="chip-item chip-success chip-sm chip-rounded font-inter-bold uppercase text-center" v-text="profileData.status"></p>
                <p class="chip-item chip-primary-600 chip-sm chip-rounded font-inter-bold uppercase text-center"> 2 slot left </p>
            </div>
            <ul class="chip-box profile-card__header__chip-box">
                <li class="chip-item chip-border-primary-600 chip-sm chip-rounded chip-border profile-card__header__chip-item" v-for="(course, courseIndex) in getVisibleCourses(profileData.courses)" :key="courseIndex" v-text="course"></li>
                <li class="chip-item chip-border-primary-600 chip-sm chip-border-none profile-card__header__chip-item" v-if="getRemainingCoursesCount(profileData.courses) > 0">
                    +{{ getRemainingCoursesCount(profileData.courses) }} more
                </li>
            </ul>

            <Anchor href="#" class="anchor anchor-underline text-size-16 leading-[139%] text-primary text-opacity-75 font-inter-medium mt-2">
                Starting from <span class="text-secondary font-inter-bold"> $40 </span>
            </Anchor>
        </div>
        <div class="card-content profile-card__content">

            <div class="row w-full gap-[10px]">
                <div class="col">
                    <div class="card-wel card-call-wel w-full max-w-[224px]" v-if="profileData.freeIntroCall !== ''">
                        <div class="card-wel-box">
                            <div class="card-wel-title"> <Icon name="telephoneIcon" class="w-[12px] h-[12px]"></Icon> Free Intro Call </div>
                            <div class="card-wel-sub-title"> {{ profileData.freeIntroCall }} </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <Button type="button" class="btn btn-sm btn-primary profile-card__action" icon="rightArrowSimpleIcon" iconPosition="right" iconClasses=" w-[11px] h-[8px]">
                        View Profile
                    </Button>
                </div>
            </div>

            <div class="row w-full gap-[10px]">
                <div class="col">
                    <Button type="button" class="btn btn-sm btn-accent profile-card__action">
                        Book intro call
                    </Button>
                </div>
                <div class="col">
                    <div class="row w-full gap-[10px]">
                        <div class="col">
                            <Button type="button" class="btn btn-sm btn-border-primary profile-card__action" icon="envelopeBorderIcon" iconPosition="left" iconClasses="text-transparent stroke-primary w-[15px] h-[15px]">
                                Email
                            </Button>
                        </div>
                        <div class="col">
                            <Button type="button" class="btn btn-sm btn-border-primary profile-card__action" icon="messageBorderIcon" iconPosition="left" iconClasses="text-transparent stroke-primary w-[16px] h-[17px]">
                                Chat
                            </Button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<style scoped>

</style>
