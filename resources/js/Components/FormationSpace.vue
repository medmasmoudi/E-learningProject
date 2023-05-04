<template>
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-50 shadow-lg">
        <img class="lg:h-72 md:h-48 w-full object-cover object-center"
             :src="'/images/' + formation.Image" alt="blog">

        <div class="p-6 hover:bg-indigo-700 hover:text-white transition duration-300 ease-in">
            <h2 class="text-base font-medium text-indigo-300 mb-1">
              {{ moment(formation.created_at).format('MMMM DD, YYYY') }}
</h2>
<Link :href="route('formation.show', formation.id)">

            <h1 class="text-2xl font-semibold mb-3 h-16">{{ formation.Title }}</h1>
</Link>
            <p class="leading-relaxed mb-3  truncate">{{ formation.Description }}</p>
            <div class="flex items-center flex-wrap ">
              <Link :href="route('formation.show', formation.id)">
                <a class="text-indigo-300 inline-flex items-center md:mb-2 lg:mb-0">Read More
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
              </Link>
                <span
                    class="text-gray-400 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1">
                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                         stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>{{ formation.views }}
                </span>
            </div>
        </div>
        
    </div>




</template>

  
  

<script setup>
import moment from 'moment';

import { Link } from "@inertiajs/vue3";
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
defineProps({
    formation: Object,
});

</script>
