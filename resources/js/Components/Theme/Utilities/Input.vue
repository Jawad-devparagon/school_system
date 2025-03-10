<template>
    <div class="form-group" :class="[$attrs.class, {'form-group_readonly': $attrs.readonly}]">
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <div class="relative">
            <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="form-input"
                   :class="{ 'input-danger': error, 'input-card': isCardInput === false , 'pl-8': iconName !== '' }"
                   :type="inputType" :value="modelValue" @input="updateValue"/>
            <label :for="id" v-if="type === 'password'" class="password-show" @click="showPassword">
                <Icon name="eye" class="w-[20px] h-[20px]"/>
            </label>
            <label :for="id" v-if="isCardInput" class="input-icon" :class="{'input-card-icon': isCardInput === true}">
                <Icon :name="iconName" :class="iconClasses"/>
            </label>
        </div>
        <div v-if="error" class="input-error">{{ error }}</div>

    </div>
</template>
<script setup>
import {v4 as uuid} from 'uuid';
import {ref, defineProps, defineEmits} from 'vue';
import Icon from '@/Components/Theme/Icon/Icon.vue';

const props = defineProps({
    id: {
        type: String,
        default: () => `text-input-${uuid()}`,
        required: false
    },
    type: {
        type: String,
        default: 'text',
        required: false,
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
        type: [String, Number],
        default: '',
        required: false
    },
    isCardInput: {
        type: Boolean,
        default: false,
        required: false
    },
    iconName: {
        type: String,
        default: '',
        required: false
    },
    iconClasses: {
        type: String,
        default: '',
        required: false
    },
});
const emit = defineEmits(['update:modelValue']);
const inputType = ref(props.type);

function updateValue(event) {
    emit('update:modelValue', event.target.value);
}

function showPassword() {
    inputType.value = inputType.value === 'password' ? 'text' : 'password';
}


</script>
<script>
export default {
    inheritAttrs: false
}
</script>
