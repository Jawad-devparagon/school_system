<script setup lang="ts">
import * as icons from './svg';
import * as Icon from "./types";

defineProps<{
  name: Icon;
  width?: number;
  height?: number;
  class?: String;
}>();
</script>

<template>
  <component
    :is="icons[name] ?? null"
    :style="{ width: `${width}px`, height: `${height}px` }"
    :class="class"
  />
</template>
