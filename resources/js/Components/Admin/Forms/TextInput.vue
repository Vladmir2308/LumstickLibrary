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
        :class="customClass"
        :placeholder="placeholder"
        :value="model"
    />
</template>

<style scoped>

</style>
