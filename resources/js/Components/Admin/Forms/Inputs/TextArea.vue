<script setup>
import {ref} from "vue";

const model = defineModel({
    type: null,
    required: true
})

const props = defineProps({
    customClass: null,
    placeholder: null,
})

</script>

<template>
    <textarea
        :class="'resize-none ' + customClass"
        :placeholder="placeholder"
        v-model="model"
    />
</template>

<style scoped>

</style>
