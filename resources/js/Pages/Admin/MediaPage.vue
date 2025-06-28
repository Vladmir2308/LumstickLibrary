<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ButtonDefault from "@/Components/Admin/Buttons/ButtonDefault.vue";
import {useForm} from "@inertiajs/vue3";
import DefaultCard from "@/Components/Admin/Forms/DefaultCard.vue";
import DefaultLabel from "@/Components/Admin/Forms/DefaultLabel.vue";
import {ref} from "vue";
import AlertWarning from "@/Components/Admin/Alerts/AlertWarning.vue";
import AlertSuccess from "@/Components/Admin/Alerts/AlertSuccess.vue";
import AlertError from "@/Components/Admin/Alerts/AlertError.vue";
import InputGroup from "@/Components/Admin/Forms/InputGroup.vue";
import TextInput from "@/Components/Admin/Forms/TextInput.vue";
import FileInput from "@/Components/Admin/Forms/FileInput.vue";

const mediaData = useForm({
    media_link: null,
    media_type: null,
    media_title: null,
    media_description: null,
    age_from: null,
    age_to: null,
    gender: null,
    media_preview: null,
})

const alertsStatus = ref({
    success: {
        status: false,
        title: null,
        desc: null,
    },

    warning: {
        status: false,
        title: null,
        desc: null,
    },

    error: {
        status: false,
        title: null,
        desc: null,
    },
})
const handleMediaFile = (e) => {
    mediaData.media_link = e.target.files[0]


    if(mediaData.media_link){
        if(mediaData.media_link.type.startsWith('video/') || mediaData.media_link.type.startsWith('audio/') || mediaData.media_link.type === 'application/pdf') {
            if(mediaData.media_link.type.startsWith('video/'))
                mediaData.media_type = 'video'

            if(mediaData.media_link.type.startsWith('audio/'))
                mediaData.media_type = 'audio'

            if(mediaData.media_link.type === 'application/pdf')
                mediaData.media_type = 'pdf'
        }
        else{
            e.target.value = ''
            mediaData.media_type = null

            alertsStatus.value.warning.status = true
            alertsStatus.value.warning.title = 'Предупреждение'
            alertsStatus.value.warning.desc = 'Возможно выбрать только форматы связанные с Видео | Аудио | PDF'

            setTimeout(() => {
                alertsStatus.value.warning.status = false
            }, 4000)
        }
    }
    else
        mediaData.media_type = null
}

const submitMediaData = () => {
    mediaData.post(route('admin.media.store'))
}

</script>

<template>
    <AdminLayout>
        <DefaultCard card-title="Добавить медиа">
            <form @submit.prevent="submitMediaData" method="POST" class="p-4">
                <div class="flex flex-col gap-6">
                    <DefaultLabel label="Укажите файл" :error-message="mediaData.errors.media_type">
                        <FileInput
                            type="file"
                            @take-selected-file="handleMediaFile"
                        />

                    </DefaultLabel>

                    <DefaultLabel label="Заголовок">
                        <input
                            type="text"
                            placeholder="placeholder"
                            class="w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                        />
                    </DefaultLabel>
                </div>

                <ButtonDefault label="Отправить" custom-classes="bg-primary text-white rounded-full mt-4"/>
            </form>
        </DefaultCard>

        <div class="absolute bottom-0 right-0">
            <Transition name="fade">
                <AlertWarning v-if="alertsStatus.warning.status" :title="alertsStatus.warning.title" :description="alertsStatus.warning.desc"/>
            </Transition>

            <Transition name="fade">
                <AlertSuccess v-if="alertsStatus.success.status" :title="alertsStatus.success.title" :description="alertsStatus.success.desc"/>
            </Transition>

            <Transition name="fade">
                <AlertError v-if="alertsStatus.error.status" :title="alertsStatus.error.title" :description="alertsStatus.error.desc" />
            </Transition>
        </div>
    </AdminLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
