<template>
<div class="flex justify-center items-center h-screen">
      <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="https://img.freepik.com/free-vector/online-tutorials-concept_52683-37480.jpg?w=1060&t=st=1682855683~exp=1682856283~hmac=2aa5d35245955cde58b6012970b8f3e64db954b6a8bcc19ff1b9aa9b2cd8f9cb" alt="" class="w-full h-full object-cover" />
      </div>
      <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">
        <div class="w-full h-100">
          <h1 class="text-xl font-bold">Login</h1>
          <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>
          <form class="mt-6" @submit.prevent="login">
            <div>
              <label class="block text-gray-700">Email Address</label>
              <input type="email" v-model="form.email" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required />
              <div class="input-error" v-if="form.errors.email">{{form.errors.email}}</div>
            </div>
  
            <div class="mt-4">
              <label class="block text-gray-700">Password</label>
              <input type="password" v-model="form.password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required />
              <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>
            </div>
            <button type="submit" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Log In</button>
          </form>
          <hr class="my-6 border-gray-300 w-full" />
          <p class="mt-8">
          Need an account? 
          <Link :href="route('user-account.create')">
          <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">
            Create an account
          </a>
        </Link>
        </p>
        </div></div></div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

    import { useForm } from '@inertiajs/vue3';
    const form = useForm({
        email:null,
        password:null,
    })
    const login = () => form.post(route('login.store'))

</script>
