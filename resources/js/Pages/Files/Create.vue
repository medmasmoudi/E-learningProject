<template>
<form @submit.prevent="upload"  >

    
<input type="file" multiple name="files" @change="handleFileSelect"/>
<button type="submit">Upload</button>

</form>


</template>

<script setup>
import {useRoute} from "vue-router";
useRoute().query.test;
import { useForm } from "@inertiajs/vue3";
const handleFileSelect = (event) => {
  form.filename = event.target.files[0].name;
};
const form = useForm({
    filename: "",
});

const upload = () => {
  form.post(route("files.store"));
}; 
 defineProps({

    chapters: Object,

})






</script> 

<!-- <template>
    <div>
      <h1>{{ chapterId }}</h1>
    </div>
  </template>
  
  <script>
console.log(this.$route.query.page)

export default {
  computed: {
    chapterId() {
      return this.$router.currentRoute._value.query.chapters 
    }
  }
}
  
  </script> -->
  
  