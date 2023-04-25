<template>
    <form @submit.prevent="update" >
      <div>
        <div>
          <label>Title</label>
          <input v-model="form.Title" type="text" />
        </div>
        <div v-if="form.errors.Title">
          {{ form.errors.Title }}
        </div>
  
        <div>
          <label>Description</label>
          <input v-model="form.Description" type="text" />
        </div>
        <div v-if="form.errors.Description">
          {{ form.errors.Description }}
        </div>
        <div>
          <label>Tags</label>
          <input v-model="form.Tags" type="text" />
        </div>
        <div v-if="form.errors.Tags">
          {{ form.errors.Tags }}
        </div>
  
        <div>
          <label>Image</label>
          <input @change="onFileChange" type="file" />
        </div>
        <div v-if="form.errors.Image">
          {{ form.errors.Image }}
        </div>
  
        <div>
          <button type="submit">Edit</button>
        </div>
      </div>
    </form>
  </template>
  
  <script setup>
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
  formation : Object,
})
const form = useForm({
    Title : props.formation.Title,
    Description : props.formation.Description,
    Tags : props.formation.Tags,
    Image : props.formation.Image,
  })
  const update = () => form.put(route('formation.update',{formation: props.formation.id}))

  const onFileChange = (event) => {
  const file = event.target.files[0]
  form.Image = file
}
  </script>
  
  <style scoped>
  label {
    margin-right: 2em;
  }
  div {
    padding: 2px
  }
  </style>