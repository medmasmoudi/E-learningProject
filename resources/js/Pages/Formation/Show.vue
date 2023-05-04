<template>
  <div>
    <FormationAddress :formation="props.formation" :joined="props.joined" :users="props.users" />
  </div>

<div v-if="joined == true">

</div>
  <div class="mx-auto w-full max-w-6xl bg-white shadow-lg rounded-lg mt-5 p-2">
    <ul>
      <li v-for="(chapter, index) in chapters" :key="chapter.id" class="border-b-2 border-gray-100">
        <div class="py-5 flex justify-between border-l-4 border-transparent bg-transparent">


          <div class="sm:pl-4 pr-8 flex sm:items-center">

            <div class="space-y-1">

              <p class="text-base text-gray-700 font-bold tracking-wide">Chapter {{ index + 1 }}: {{ chapter.title }}</p>

              <p class="text-sm text-gray-500 font-medium italic">{{ chapter.description }}</p>
            </div>
          </div> 
          
          <div class="pr-4 flex flex-col justify-between items-end" >
            <div v-if="isAdmin">
              <AddingFiles :chapters="chapter"/>
            <Link :href="route('chapters.destroy', { chapter: chapter.id })" method="DELETE">
              <button class="text-sm text-gray-500 font-semibold hover:underline hover:text-gray-700">Delete</button>
            </Link>
            </div>


            <button @click="openModal(chapter)"
              class="text-sm text-gray-500 font-semibold hover:underline hover:text-gray-700">
              Details
            </button>
          </div>

          <TransitionRoot appear :show="isOpen" as="template">
            <Dialog as="div" @close="closeModal(chapter)" class="relative z-10">
              <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
              </TransitionChild>

              <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                  <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                    enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                    leave-to="opacity-0 scale-95">
                    <DialogPanel
                      class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
                      <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                        {{ selectedChapter ? selectedChapter.title : '' }}
                      </DialogTitle>
                      <div class="mt-2">
                        <p class="text-sm text-gray-500">
                          {{ selectedChapter ? selectedChapter.description : '' }}
                        </p>
                        <p>
                          <a :href="route('chapters.downloadFiles', {chapters : selectedChapter ? selectedChapter : ''})" target="_blank">

                            Download Files
                          </a>
                        </p>
                      </div>

                      <div class="mt-4">
                        <button type="button"
                          class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                          @click="closeModal">
                          Done
                        </button>
                      </div>
                    </DialogPanel>
                  </TransitionChild>
                </div>
              </div>
            </Dialog>
          </TransitionRoot>



        </div>
      </li>

    </ul>
    <div class="w-60 mb-4">
  <a :href="route('formation.download', {id : props.formation.id})" target="_blank">

<div class="btn-done m-4">
  Done! Get Your Certificat
</div>

</a>
</div>

  </div>
  
</template>


<script setup>
import {Link} from "@inertiajs/vue3";
import FormationAddress from '@/Components/FormationAddress.vue';
import AddingFiles from '@/Components/AddingFiles.vue';
import FilesDetails from '@/Components/FilesDetails.vue';
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'

const isOpen = ref(false)
const selectedChapter = ref(null)

function closeModal() {
  isOpen.value = false
  selectedChapter.value = null
}

function openModal(chapter) {
  isOpen.value = true
  selectedChapter.value = chapter
}

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
  joined : Boolean,
  users : Array,
});

</script>

