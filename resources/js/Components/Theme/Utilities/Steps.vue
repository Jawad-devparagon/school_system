<script setup>
import {defineProps, computed, ref, defineEmits} from 'vue';

  const props = defineProps({
      totalSteps: {
          type: Number,
          default: 1,
      },
      modelValue: {
          type: Number,
          default: 0,
          required: true
      }
  });
  const emit = defineEmits(['update:modelValue']);

  const steps = computed(() => {
      return props.totalSteps;
  })
  function moveStep(step) {
      if( step < props.modelValue ) {
          emit('update:modelValue', step);
      }
  }
</script>

<template>
  <ul class="steps-box">
      <li class="steps-control-item" v-for="(step, stepIndex) in steps" :class="{ 'active': stepIndex === modelValue }" :key="stepIndex" @click="moveStep(stepIndex)"></li>
  </ul>
</template>

<style scoped>

</style>
