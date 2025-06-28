<script setup>
import {ref} from "vue";

const model = defineModel({
    type: null,
    required: true
})

const props = defineProps({
    type: null,
    customClass: null,
    placeholder: null,
})

</script>

<template>
    <input
        :type="type"
        :class="'w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary ' + customClass"
        :placeholder="placeholder"
        v-model="model"
    />
</template>

<style scoped>

</style>
