<script setup>
defineProps({
    label: null,
    errorMessage: null
})
</script>

<template>
    <div>
        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            {{ label }}
        </label>

        <slot />

        <div class="text-danger pt-2">
            {{ errorMessage }}
        </div>
    </div>
</template>

<style scoped>

</style>
