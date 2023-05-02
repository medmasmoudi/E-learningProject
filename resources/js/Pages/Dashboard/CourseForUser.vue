<template>
<ul role="list" class="divide-y divide-gray-100">
    <li v-for="formation in formations" :key="formation.id" class="flex justify-between gap-x-6 py-5 mx-64">
      <div class="flex gap-x-4">
        <img class="h-24 w-24  object-cover object-center"
             :src="'/images/' + formation.Image" alt="blog">
        <div class="min-w-0 flex-auto">
          <p class="text-sm font-semibold leading-6 text-gray-900">{{ formation.Title }}</p>
          <p class="mt-1  text-xs leading-5 text-gray-500">{{ formation.Description }}</p>
        </div>
      </div>

    </li>
  </ul>
</template>
<script setup>
defineProps({
    formations: Array,
  });
</script>
