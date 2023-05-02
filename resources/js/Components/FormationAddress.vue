<template>
    <div class="px-10 py-6 grid grid-cols-12 gap-6 rounded-lg shadow-md max-w-6xl
    mx-auto w-full bg-white mt-5">
      <div class="col-span-10">
        <h1 class="text-3xl font-bold text-gray-800">{{ formation.Title }}</h1>
        <p class="mt-4 text-lg text-gray-600">{{ formation.Description }}</p>
      </div>
      <div class="col-span-2 flex items-center justify-center" v-if="!isAdmin">
  <Link :href="route('join', formation.id)" method="POST" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md shadow-md hover:bg-indigo-700 text-center flex justify-center items-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span class="ml-1">Join</span>
  </Link>
</div>

      <div v-else class="col-span-2 flex items-center justify-center">
<div>


        <button @click="openModal" class="inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-indigo-200">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>

</button>
<TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal()" class="relative z-10">
      <TransitionChild
        as="template"
        enter="duration-300 ease-out"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div
          class="flex min-h-full items-center justify-center p-4 text-center"
        >
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <DialogPanel
              class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
            >
              <DialogTitle
                as="h3"
                class="text-lg font-medium leading-6 text-gray-900"
              >
              Add a new Chapter
              </DialogTitle>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  <form @submit.prevent="create" class="">
  <div class="mt-3">
    <label class="text-md font-medium leading-6 text-gray-900" for="title">Title : </label>
    <input v-model="form.title" id="title" class="inline-flex justify-center rounded-md border border-transparent bg-gray-100 px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 " type="text" />
    <div v-if="form.errors.title" class="mt-2 text-red-500">{{ form.errors.title }}</div>
  </div>
  <div class="mt-3">
    <label class="text-md font-medium leading-6 text-gray-900" for="description">Description : </label>
    <input v-model="form.description" id="description" class="inline-flex justify-center rounded-md border border-transparent bg-gray-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-gray-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2" type="text" />
    <div v-if="form.errors.description" class="mt-2 text-red-500">{{ form.errors.description }}</div>
  </div>
  <input type="hidden" v-model="form.formation_id">
  <div class="mt-4">


                <button
                
                  type="submit"
                  class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                  @click="closeModal"
                >
                  Done
                </button>

              </div>
</form> 




                </p>
              </div>


            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>


</div>





        <Link :href="route('formation.edit', { formation: props.formation.id })">
        <button class="inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-indigo-200">
  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
</button>
</Link>
<Link :href="route('formation.destroy', { formation: props.formation.id })" method="DELETE">

<button class="inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-700 transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-red-200">
  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
    <path d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"/></svg>
    
</button>
</Link>
      </div>
    </div>


  </template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const page = usePage();
const isAdmin = computed(() => {
  try {
    return page.props.user.role === 'admin';
  } catch (e) {
    console.error(e);
    return false;
  }
});


import { ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'

const isOpen = ref(true)

function closeModal() {
  isOpen.value = false
}
function openModal() {
  isOpen.value = true
}
const props = defineProps({
  formation: Object,

});

  const id = props.formation.id;


const form = useForm({
    title: "",
    description: "",
    formation_id:id,

});



const upload = () => file.post(route('files.store'))
const create = () => form.post(route('chapters.store' ));
</script>

