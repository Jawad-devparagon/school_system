<script setup>
import Anchor from '@/Components/Theme/Utilities/Anchor.vue';
import {usePage} from '@inertiajs/vue3';
import AccordionLayoutCard from '@/Components/Theme/Utilities/Card/__accordion-layout-card.vue';

const page = usePage();
</script>

<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex lg:flex-col w-full gap-4">

        <AccordionLayoutCard :profile-image-url="`${page.props.BASE_PATH}assets/images/mentor.png`" title="Mentor Name" title-class="" sub-tittle="Group Mentoring" badge="Signed" badge-class="chip-success">
            <template #action>
                <Anchor href="#" class="btn btn-md btn-primary accordion-layout__right__action">
                    Show Details
                </Anchor>
            </template>
        </AccordionLayoutCard>

        <AccordionLayoutCard :profile-image-url="`${page.props.BASE_PATH}assets/images/mentor.png`" title="Mentor Name" title-class="" sub-tittle="Group Mentoring" badge="Unsigned" badge-class="chip-primary-light">
            <template #action>
                <Anchor href="#" class="btn btn-md btn-primary accordion-layout__right__action">
                    Show Details
                </Anchor>
            </template>
        </AccordionLayoutCard>

        <AccordionLayoutCard :profile-image-url="`${page.props.BASE_PATH}assets/images/mentor.png`" title="Mentor Name" title-class="" sub-tittle="Group Mentoring" badge="Signed" badge-class="chip-success">
            <template #action>
                <Anchor href="#" class="btn btn-md btn-primary accordion-layout__right__action">
                    Show Details
                </Anchor>
            </template>
        </AccordionLayoutCard>

        <AccordionLayoutCard :profile-image-url="`${page.props.BASE_PATH}assets/images/mentor.png`" title="Mentor Name" title-class="" sub-tittle="Group Mentoring" badge="Unsigned" badge-class="chip-primary-light">
            <template #action>
                <Anchor href="#" class="btn btn-md btn-primary accordion-layout__right__action">
                    Show Details
                </Anchor>
            </template>
        </AccordionLayoutCard>

        <AccordionLayoutCard :profile-image-url="`${page.props.BASE_PATH}assets/images/mentor.png`" title="Mentor Name" title-class="" sub-tittle="Group Mentoring" badge="Signed" badge-class="chip-success">
            <template #action>
                <Anchor href="#" class="btn btn-md btn-primary accordion-layout__right__action">
                    Show Details
                </Anchor>
            </template>
        </AccordionLayoutCard>

        <AccordionLayoutCard :profile-image-url="`${page.props.BASE_PATH}assets/images/mentor.png`" title="Mentor Name" title-class="" sub-tittle="Group Mentoring" badge="Signed" badge-class="chip-success">
            <template #action>
                <Anchor href="#" class="btn btn-md btn-primary accordion-layout__right__action">
                    Show Details
                </Anchor>
            </template>
        </AccordionLayoutCard>

    </div>
</template>

<style scoped>

</style>
