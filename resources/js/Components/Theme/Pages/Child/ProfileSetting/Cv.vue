<script setup>
import DragDropInput from '@/Components/Theme/Utilities/DragDropInput.vue';
import Anchor from '@/Components/Theme/Utilities/Anchor.vue';


</script>

<template>
    <div>
        <DragDropInput label="Upload CV" class="mb-[40px]" />
        <div class="cv-wrapper">
            <h2 class="text-size-16 leading-[150%] text-primary font-inter-semi-bold">
                CV Builder
            </h2>
            <p class="text-size-16 leading-[150%] text-primary text-opacity-80 font-inter-medium">
                Don’t have any CV? <span class="text-primary"> Build a cv from this free </span> <Anchor href="#" class="anchor anchor-secondary anchor-underline font-inter-bold"> CV BUILDER </Anchor>
            </p>
            <p class="text-size-16 leading-[150%] text-primary text-opacity-80 font-inter-medium">
                And the upload the CV above.
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>
