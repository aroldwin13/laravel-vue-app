<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue', 'label', 'type']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>
<template>
    <div class="relative border-none">
        <input
            id="input"
            :type="type"
            class="rounded-lg border-1 border-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-600 block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            required
            placeholder=" "
            :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input"
            />
        <label
            for="input"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
            {{ label }}
        </label>
    </div>
</template>