<template>
    <div class="grid md:grid-cols-2 gap-4 xl:grid-cols-5 lg:grid-cols-4">
        <Box v-for="formation in formations" :key="formation.id">
            <FormationSpace :formation="formation" />

            <Link :href="route('formation.show', formation.id)">
        </Link>


    </Box>
    </div>
</template>



<script setup>

import { Link } from '@inertiajs/vue3';
import FormationAddress from '@/Components/FormationAddress.vue';
import Box from '@/Components/UI/Box.vue'
import FormationSpace from '@/Components/FormationSpace.vue';
defineProps({
    formations: Array,
})


</script>
