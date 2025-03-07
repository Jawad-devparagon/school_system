<template>
  <div class="form-group" :class="[$attrs.class, {'form-group_readonly': $attrs.readonly}]">
    <label v-if="label" class="form-label" :for="id">{{ label }}</label>
    <VueSignaturePad :id="id" width="100%" height="100%" v-bind="{ ...$attrs, class: null }" ref="signaturePad" class="form-signature" :options="{ onBegin, onEnd }" />
    <div v-if="error" class="input-error">{{ error }}</div>
  </div>
</template>

<script setup>
    import {v4 as uuid} from 'uuid';
    import {ref, defineProps, defineEmits, onMounted} from 'vue';
    import {VueSignaturePad} from "vue-signature-pad";

    const props = defineProps({
        id: {
            type: String,
            default: () => `text-input-${uuid()}`,
            required: false
        },
        error: {
            type: String,
            default: null,
            required: false
        },
        label: {
            type: String,
            default: null,
            required: false
        },
        modelValue: {
            default: '',
            required: false
        },
    });
    const emit = defineEmits(['update:modelValue']);
    const signaturePad = ref(null);

    function onBegin() {
    }
    function onEnd() {
        const { isEmpty: empty, data } = signaturePad.value.saveSignature();
        if(!empty) {
            emit('update:modelValue', data);
        }
    }

</script>

<script>
export default {
    inheritAttrs: false
}
</script>
