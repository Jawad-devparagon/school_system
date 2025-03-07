<script setup>
import FlashMessage from '@/Components/Theme/Utilities/FlashMessages.vue';

</script>

<template>
  <section class="auth-sec">
    <div class="auth-box">

      <div class="auth-column auth-left-column ">
        <slot name="left-column" />
      </div><!-- auth-left-column end -->

      <div class="auth-column auth-right-column">
        <FlashMessage />
        <slot name="right-column" />
      </div><!-- auth-right-column -->

    </div>
  </section>
</template>

<style scoped>

</style>
