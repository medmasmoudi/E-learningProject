<template>
  <button @click="openModal" class="text-sm text-gray-500 font-semibold hover:underline hover:text-gray-700 mr-3">
    Add Files</button>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal()" class="relative z-10">
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
                Add a new File
              </DialogTitle>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                <form @submit.prevent="upload">
                  <div class="mt-3">
                    <label class="text-md font-medium leading-6 text-gray-900" for="file">File : </label>
                    <input type="file" multiple name="files" @input="form.file = $event.target.files[0]" />
                    <input type="hidden" v-model="form.chapters_id">

                  </div>
                  <div class="mt-4">
                    <button type="submit"
                      class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                      @click="closeModal">
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
</template>

<script setup>
const props = defineProps({
  chapters: Object,

});
const id = props.chapters.id
import { useForm } from "@inertiajs/vue3";
const form = useForm({
  file: "",
  chapters_id: id,
});

function upload() {
  form.post(route('files.store'))
}

import { ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'

const isOpen = ref(false)

function closeModal() {
  isOpen.value = false
}
function openModal() {
  isOpen.value = true
}

</script>