<template>
    <div class="p-0 w-100 h-500px position-relative overflow-hidden rounded-3">
        <input class="d-none" ref="fileInput" id="file-input" type="file" @change="handleFileChange" />
        <label for="file-input" class="w-100 h-100 bg-light d-flex cursor-pointer position-absolute">
            <i class="far fa-image m-auto fs-80px opacity-50"></i>
        </label>
        <div v-if="previewUrl" class="image-preview position-absolute top-0 w-100 h-100">
            <img :src="previewUrl" alt="Preview" class="object-fit-cover w-100 h-100" />
            <button @click="removeImage" class="position-absolute btn btn-primary" style="right: 0"><i class="fas fa-times"></i></button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedFile: null,
            previewUrl: null,
        };
    },
    methods: {
        handleFileChange(event) {
            const file = event.target.files[0];

            if (file && file.type.startsWith('image/')) {
                this.selectedFile = file;

                // Создаем объект URL для превью
                this.previewUrl = URL.createObjectURL(file);
            } else {
                this.selectedFile = null;
                this.previewUrl = null;
            }
        },
        removeImage() {
            // Очищаем выбранный файл и превью
            this.selectedFile = null;
            this.previewUrl = null;

            // Очищаем значение input type="file"
            this.$refs.fileInput.value = null;
        },
    },
};
</script>

<style scoped>
</style>
