<template>
  <header class="bg-white shadow-md">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
      <div>
        <Link :href="route('LandingPage')">
        <h3 class="font-Zeitung my-4 text-xl text-indigo-700">
          e-Learning
        </h3>
        </Link>
      </div>
      <div
        class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
        <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
          <li v-if="isUser">
            <Link :href="route('DashboardUser')">
            <a class="hover:text-gray-500">My Learning</a>
            </Link>
          </li>
          <li v-if="isAdmin">
            <Link :href="route('Dashboard')">
            <a class="hover:text-gray-500">Users</a>
            </Link>
          </li>
          <li>
            <Link :href="route('formation.index')">
            <a class="hover:text-gray-500">Courses</a>
            </Link>
          </li>
        </ul>
      </div>
      <div class="flex items-center gap-6" v-if="!user">
        <Link :href="route('login')" as="button">
        <button
          class="inline-flex w-full justify-center rounded-md bg-indigo-400 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
          Sign in
        </button>
        </Link>
      </div>
      <div v-else>
        <Menu as="div" class="relative inline-block text-left">
          <div>
            <MenuButton
              class="inline-flex w-full justify-center rounded-md bg-indigo-400 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              {{ user.name }}
              <ChevronDownIcon class="ml-2 -mr-1 h-5 w-5 text-violet-200 hover:text-violet-100" aria-hidden="true" />
            </MenuButton>
          </div>
          <transition enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0">
            <MenuItems
              class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <Link :href="route('formation.create')">
              <div class="px-1 py-1" v-if="isAdmin">
                <MenuItem v-slot="{ active }">
                <button :class="[
                  active
                    ? 'bg-indigo-500 text-white'
                    : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Add Course
                </button>
                </MenuItem>
              </div>
              </Link>
              <Link :href="route('user-account.edit', { user_account: user.id })">
              <div class="px-1 py-1">
                <MenuItem v-slot="{ active }">
                <button :class="[
                  active
                    ? 'bg-indigo-500 text-white'
                    : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  Edit Profile
                </button>
                </MenuItem>
              </div>
              </Link>
              <Link :href="route('logout')" method="delete" @click="logout">
              <div class="px-1 py-1">
                <MenuItem v-slot="{ active }">
                <button :class="[
                  active
                    ? 'bg-indigo-500 text-white'
                    : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                  </svg>
                  Logout
                </button>
                </MenuItem>
              </div>
              </Link>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </nav>
  </header>

  <main class="container mx-auto p-4 w-full ">
    <slot>Default</slot>
  </main>
</template>


<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
const user = computed(() => page.props.user);
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";

const logout = async () => {
  await fetch(route("logout"), {
    method: "DELETE",
  });
  location.reload(); // Reload the page after logging out
};

const isAdmin = computed(() => {
  try {
    return page.props.user.role === "admin";
  } catch (e) {
    console.error(e);
    return false;
  }
});
const isUser = computed(() => {
  try {
    return page.props.user.role === "user";
  } catch (e) {
    console.error(e);
    return false;
  }
});
</script>
