<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

</script>

<template>
    <MainLayout>
        <div class="h-screen w-full flex justify-center flex-col items-center">
            <h1 class="text-3xl">Hello! This is <b>MAIN</b> page.</h1>

            <Link class="mt-4 bg-sky-400 p-3 rounded-xl text-white hover:bg-sky-900 transition" :href="route('admin.index')">Go to ADMIN page</Link>
        </div>
    </MainLayout>
</template>

<style scoped>

</style>
