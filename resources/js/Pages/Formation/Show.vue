<template>
  <div>
    <FormationAddress :formation="props.formation" :joined="props.joined" :users="props.users" />
  </div>
  <div v-if="joined == true">
  </div>
  <div class="mx-auto w-full max-w-6xl bg-white shadow-lg rounded-lg mt-5 p-2" v-if="joined || isAdmin">
    <ul>
      <li v-for="(chapter, index) in chapters" :key="chapter.id" class="border-b-2 border-gray-100">
        <div class="py-5 flex justify-between border-l-4 border-transparent bg-transparent">
          <div class="sm:pl-4 pr-8 flex sm:items-center">
            <div class="space-y-1">
              <p class="text-base text-gray-700 font-bold tracking-wide">Chapter {{ index + 1 }}: {{ chapter.title }}</p>
              <p class="text-sm text-gray-500 font-medium italic">{{ chapter.description }}</p>
            </div>
          </div>
          <div class="pr-4 flex flex-col justify-between items-end">
            <div v-if="isAdmin">
              <AddingFiles :chapters="chapter" />
              <Link :href="route('chapters.destroy', { chapter: chapter.id })" method="DELETE">
              <button class="text-sm text-gray-500 font-semibold hover:underline hover:text-gray-700">Delete</button>
              </Link>
            </div>
            <Link :href="route('chapters.show', { chapter: chapter.id })">
            <button class="text-sm text-gray-500 font-semibold hover:underline hover:text-gray-700">
              Details
            </button>
            </Link>
          </div>
        </div>
      </li>
    </ul>
    <div class="w-60 mb-4" v-if="!isAdmin">
      <a :href="route('formation.download', { id: props.formation.id })" target="_blank">
        <div class="btn-done m-4">
          Done! Get Your Certificat
        </div>
      </a>
    </div>
  </div>
</template>


<script setup>
import { Link } from "@inertiajs/vue3";
import FormationAddress from '@/Components/FormationAddress.vue';
import AddingFiles from '@/Components/AddingFiles.vue';
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";


const page = usePage();
const isAdmin = computed(() => {
  try {
    return page.props.user.role === 'admin';
  } catch (e) {
    console.error(e);
    return false;
  }
});

const props = defineProps({
  formation: Object,
  chapters: Array,
  joined: Boolean,
  users: Array,
});

</script>

