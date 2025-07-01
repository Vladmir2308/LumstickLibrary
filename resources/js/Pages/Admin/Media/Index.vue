<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ButtonDefault from "@/Components/Admin/Buttons/ButtonDefault.vue";
import {useForm} from "@inertiajs/vue3";
import DefaultCard from "@/Components/Admin/Forms/DefaultCard.vue";
import DefaultLabel from "@/Components/Admin/Forms/DefaultLabel.vue";
import {inject, ref, watch} from "vue";
import TextInput from "@/Components/Admin/Forms/Inputs/TextInput.vue";
import FileInput from "@/Components/Admin/Forms/Inputs/FileInput.vue";
import TextArea from "@/Components/Admin/Forms/Inputs/TextArea.vue";
import SelectGroupOne from "@/Components/Admin/Forms/SelectGroupOne.vue";
import Alert from "@/Components/Admin/Alerts/Alert.vue";

</script>

<template>
    <AdminLayout>
        <ButtonDefault label="Добавить" route="/admin/media/create" custom-classes="bg-primary text-white rounded-full mt-4"/>
    </AdminLayout>
</template>

<style scoped>

</style>
