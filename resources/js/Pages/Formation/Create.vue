<template>
    <form @submit.prevent="create" class="max-w-xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="title">Title</label>
        <input v-model="form.Title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" />
        <div v-if="form.errors.Title" class="mt-2 text-red-500">{{ form.errors.Title }}</div>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="description">Description</label>
        <input v-model="form.Description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" />
        <div v-if="form.errors.Description" class="mt-2 text-red-500">{{ form.errors.Description }}</div>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="tags">Tags</label>
        <input v-model="form.Tags" id="tags" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" />
        <div v-if="form.errors.Tags" class="mt-2 text-red-500">{{ form.errors.Tags }}</div>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="image">Image</label>
        <input @change="onFileChange" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" />
        <div v-if="form.errors.Image" class="mt-2 text-red-500">{{ form.errors.Image }}</div>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="certificat">Certificat</label>
        <input @change="onCertifcatChange" id="certificat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" />
        <div v-if="form.errors.Certificat" class="mt-2 text-red-500">{{ form.errors.Certificat }}</div>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
      </div>
    </form>
  </template>
  

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    Title: "",
    Description: "",
    Tags: "",
    Image: null,
    Certificat : null,
});
const create = () => form.post(route("formation.store"));
const onFileChange = (event) => {
    const file = event.target.files[0];
    form.Image = file;
};
const onCertifcatChange = (event) => {
    const file = event.target.files[0];
    form.Certificat = file;
};
</script>

<style scoped>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}
</style>
