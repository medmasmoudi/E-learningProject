<template>
  <div class="px-10 py-6 grid grid-cols-12 gap-6 rounded-lg shadow-md max-w-6xl
    mx-auto w-full bg-white mt-5">
    <div class="col-span-10">
      <h1 class="text-3xl font-bold text-gray-800">{{ chapter.title }}</h1>
      <p class="mt-4 text-lg text-gray-600">{{ chapter.description }}</p>
    </div>
  </div>
  <div class="mx-auto w-full max-w-6xl bg-white shadow-lg rounded-lg mt-5 p-2">
    <ul>
      <li v-for="(file, index) in files" :key="file.id">
        <div class="py-2 flex justify-between border-l-4 border-transparent bg-transparent">
          <div class="sm:pl-4 pr-8 flex sm:items-center" v-if="file.filename.includes('.pdf')">
            <div class="space-y-1">
              <a :href="route('chapters.downloadFiles', { id: file.id })">
                <div class="flex items-center justify-between">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 mr-2 text-indigo-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                  </svg>

                  <p class="text-base text-indigo-600 tracking-wide">Support {{ index + 1 }}</p>
                </div>

              </a>
            </div>
          </div>
          <div v-else>
            <p class="mx-3 text-base text-black-600 font-semibold tracking-wide">Support {{ index +1 }} :</p>
            <div class="my-2">
              <video  class="w-full h-full" controls>
              <source :src="'/storage/' +file.filename" type="video/mp4">           
              </video>
            </div>

          </div>

        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>

defineProps({
  chapter: Object,
  files: Array,
})
  
</script>