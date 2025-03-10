<template>
    <div class="form-group" :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <div class="dragdrop-con">
            <label class="dragdrop-box dragdrop-border dragdrop-border-dashed">
                <svg v-if="loading" aria-hidden="true" class="w-4 h-4 text-gray-500 animate-spin fill-warning-600"
                     viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"/>
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill"/>
                </svg>
                <template v-else>
                    <input type="file" :id="id" v-bind="{ ...$attrs, class: null }" class="hidden"
                           @change="updateValue" :accept="useFileTypeData.acceptFileExtensions" ref="fileInput" :disabled="disabled"/>
                    <span class="dragdrop-icon">
                    <Icon name="pdfFileIcon" class="w-[20px] h-[24px]"/>
                </span>
                    <span class="dragdrop-text">
                    Drag & Drop or <span class="dragdrop-link anchor anchor-secondary anchor-underline text-[20px]"> Choose File </span>
                </span>
                </template>
            </label>
        </div>
        <div v-if="fileName" class="dragdrop-file-preview">
            <p class="dragdrop-file-preview-text">
                Selected file: <span class="dragdrop-file-preview-text-span"> {{ fileName }} </span>
            </p>
            <Button @click="clearFile" class="btn btn-accent btn-sm">
                <Icon name="cross" class="w-[8px] h-[8px]"/>
                Remove
            </Button>
        </div>
        <div v-if="fileError" class="input-error">{{ fileError }}</div>
    </div>
</template>

<script setup>
import {v4 as uuid} from 'uuid';
import {computed, defineEmits, defineProps, ref} from 'vue';
import Icon from '@/Components/Theme/Icon/Icon.vue';
import Button from "@/Components/Theme/Utilities/Button.vue";
import {useFileType} from "@/Composeables/useFileType.js";

const emit = defineEmits(['update:modelValue']);
const props = defineProps({
    fileType: {
        type: String,
        default: 'any',
        required: true
    },
    id: {
        type: String,
        default: () => `file-input-${uuid()}`
    },
    error: String,
    label: {
        type: String,
        default: null,
        required: false
    },
    disabled: {
        default: false,
        type: Boolean
    },
    loading: {
        default: false,
        type: Boolean
    },
});

const fileInput = ref(null);
const fileName = ref('');

const useFileTypeData = useFileType(props.fileType)
function updateValue(event) {
    clientSideError.value = ''
    const file = event.target.files[0];
    if (!file) {
        clearFile();
        return;
    }

    if (! useFileTypeData.allowedFileTypes.includes(file.type)) {
        clearFile();
        return;
    }

    fileName.value = file.name;
    emit('update:modelValue', file);
}

const clientSideError = ref('');
const fileError = computed(() => props.error ?? clientSideError.value)

const clearFile = () => {
    fileName.value = '';
    clientSideError.value = 'The uploaded file must be a valid document.'
    if (fileInput.value) {
        fileInput.value = '';
    }
};
</script>
