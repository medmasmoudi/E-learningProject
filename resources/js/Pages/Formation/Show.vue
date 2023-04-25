<template>
<div>
    <FormationAddress :formation="formation"/>
</div>


</template>


<script setup>
import FormationAddress from '@/Components/FormationAddress.vue';

defineProps({
    formation : Object,
})
</script>

