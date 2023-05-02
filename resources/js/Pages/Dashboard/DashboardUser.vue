<template>
<div class="grid md:grid-cols-1 gap-4 xl:grid-cols-5 lg:grid-cols-5">

        <Box v-for="formation in formations" :key="formation.id">
            <FormationSpace :formation="formation" />
        </Box>



</div>


  </template>
  
  <script setup>


import {usePage} from '@inertiajs/vue3';
import Box from '@/Components/UI/Box.vue'
import FormationSpace from '@/Components/FormationSpace.vue';

defineProps({
    formations : Array,
})



  </script>
  