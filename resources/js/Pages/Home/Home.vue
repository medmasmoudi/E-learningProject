<template>
    <div class="flex justify-center items-center w-fit h-fit gap-11">
      <div class="mr-10 flex flex-col items-center">
        <h1 class="text-7xl font-bold font-Zeitung text-center w-80">Online Education.</h1>
        <p class="w-96  text-justify p-2 ml-16">Welcome to e-Learning, your one-stop destination for online learning. Our platform offers a vast range of courses, taught by industry experts and professionals, to help you enhance your skills and achieve your career goals. With flexible learning options, you can study at your own pace and from the comfort of your home, making it easy to balance your work and personal life. Sign up today and unlock a world of possibilities!</p>
        <div v-if="isConnected">
          <Link :href="route('user-account.create')">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-3xl py-2 px-5 rounded-xl mt-4">Join Now</button>
    </Link>
        </div>

      </div>
      <img src="./5259941-removebg.png" alt="" class=" w-1/2">
    </div>
  </template>
  <script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
const page = usePage();
const props = defineProps({
  user : Object
})
const isConnected = computed(() => {
  try {
    return page.props.user.role === 'admin' ||page.props.user.role === 'role';
  } catch (e) {
    console.error(e);
    return false;
  }
});
</script>
  
  