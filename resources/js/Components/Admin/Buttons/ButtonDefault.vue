<script setup lang="ts">
import {Link} from "@inertiajs/vue3";

const props = defineProps(['label', 'route', 'customClasses'])
</script>

<template>
    <Link v-if="props.route"
    :href="props.route"
    class="inline-flex items-center justify-center gap-2.5 py-4 px-10 text-center font-medium hover:bg-opacity-90 lg:px-8 xl:px-10"
    :class="props.customClasses"
    >
        <slot></slot>
        {{ props.label }}
    </Link>

    <button v-else
        class="inline-flex items-center justify-center gap-2.5 py-4 px-10 text-center font-medium hover:bg-opacity-90 lg:px-8 xl:px-10"
        :class="props.customClasses"
        type="submit">{{ props.label }}</button>
</template>
