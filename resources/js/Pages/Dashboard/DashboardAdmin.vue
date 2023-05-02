<template>

    <ul role="list" class="divide-y divide-gray-100">
    <li v-for="user in users" :key="user.id" class="flex justify-between mx-64 gap-x-6 py-5">
      <div class="flex gap-x-4">
<img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="" /> 
        <div class="min-w-0 flex-auto">
          <p class="text-sm font-semibold leading-6 text-gray-900">{{ user.name }}</p>
          <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ user.email }}</p>
        </div>
      </div>
      <div class="hidden sm:flex sm:flex-row sm:items-center">
  <div>
    <p class="text-sm leading-6 text-gray-900">{{ user.niveau }}</p>
    <p class="mt-1 text-xs leading-5 text-gray-500">
      Member since {{ moment(user.created_at).format('MMMM DD, YYYY') }}
    </p>
  </div>
  <div class="ml-2">
    <Link :href="route('users.formations', user)">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
    </svg>
  </Link>
  </div>
</div>

    </li>
  </ul>
  </template>

  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  import moment from 'moment';
  defineProps({
    users: Array,
  });
  </script>
  