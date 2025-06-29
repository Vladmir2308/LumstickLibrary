<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ButtonDefault from "@/Components/Admin/Buttons/ButtonDefault.vue";
import {useForm} from "@inertiajs/vue3";
import DefaultCard from "@/Components/Admin/Forms/DefaultCard.vue";
import DefaultLabel from "@/Components/Admin/Forms/DefaultLabel.vue";
import {inject, ref, watch} from "vue";
import AlertWarning from "@/Components/Admin/Alerts/AlertWarning.vue";
import AlertSuccess from "@/Components/Admin/Alerts/AlertSuccess.vue";
import AlertError from "@/Components/Admin/Alerts/AlertError.vue";
import TextInput from "@/Components/Admin/Forms/Inputs/TextInput.vue";
import FileInput from "@/Components/Admin/Forms/Inputs/FileInput.vue";
import TextArea from "@/Components/Admin/Forms/Inputs/TextArea.vue";
import SelectGroupOne from "@/Components/Admin/Forms/SelectGroupOne.vue";
import Alert from "@/Components/Admin/Alerts/Alert.vue";

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
    status: false,
    title: null,
    desc: null,
    type: null
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

            alertsStatus.value.status = true
            alertsStatus.value.title = 'Предупреждение'
            alertsStatus.value.desc = 'Возможно выбрать только форматы связанные с Видео | Аудио | PDF'
            alertsStatus.value.type = 'warning'

            setTimeout(() => {
                alertsStatus.value.status = false
            }, 4000)
        }
    }
    else
        mediaData.media_type = null
}
const handleMediaFilePreview = (e) => {

    mediaData.media_preview = e.target.files[0]

    if(mediaData.media_preview){
        if(!mediaData.media_preview.type.startsWith('image/')){
            e.target.value = ''
            mediaData.media_preview = null

            alertsStatus.value.status = true
            alertsStatus.value.title = 'Предупреждение'
            alertsStatus.value.desc = 'Возможно выбрать только форматы связанные с Изображением'

            setTimeout(() => {
                alertsStatus.value.status = false
            }, 4000)
        }
    }
    else
        mediaData.media_preview = null
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

                    <DefaultLabel label="Заголовок" :error-message="mediaData.errors.media_title">
                        <TextInput
                            type="text"
                            placeholder="Введите заголовок"
                            v-model="mediaData.media_title"
                        />
                    </DefaultLabel>

                    <DefaultLabel label="Описание" :error-message="mediaData.errors.media_description">
                        <TextArea
                            v-model="mediaData.media_description"
                            custom-class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            placeholder="Введите описание" />
                    </DefaultLabel>

                    <DefaultLabel label="Возраст">
                        <div class="flex gap-3">
                            <TextInput
                                v-model="mediaData.age_from"
                                type="number"
                                placeholder="С"
                                custom-class="" />

                            <TextInput
                                v-model="mediaData.age_to"
                                type="number"
                                placeholder="До"
                                custom-class="" />
                        </div>
                    </DefaultLabel>

                    <DefaultLabel label="Пол">
                        <SelectGroupOne
                            v-model="mediaData.gender"
                            selected-label="Выберите пол"
                            :options="['Мужской', 'Женский', 'Любой']"
                        />
                    </DefaultLabel>

                    <DefaultLabel label="Превью" :error-message="mediaData.errors.media_preview">
                        <FileInput @take-selected-file="handleMediaFilePreview"/>
                    </DefaultLabel>
                </div>

                <ButtonDefault label="Отправить" custom-classes="bg-primary text-white rounded-full mt-4"/>
            </form>
        </DefaultCard>

        <div class="fixed z-9999 bottom-0 right-0">
            <Transition name="fade">
                <Alert
                    v-if="alertsStatus.status"
                    :type="alertsStatus.type"
                    :title="alertsStatus.title"
                    :description="alertsStatus.desc"
                />
            </Transition>
        </div>
    </AdminLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.4s ease, transform 0.4s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}
</style>
