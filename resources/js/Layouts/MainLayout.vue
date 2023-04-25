<template>
    <header
        class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full"
    >
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('formation.index')">Formations</Link>
                </div>
                <div
                    class="text-xl text-indigo-600 dark:text-indigo-200 font-bold text-center"
                >
                    <Link :href="route('formation.index')"> E-learning </Link>
                </div>

                <div>
                    <div v-if="user" class="flex items-center gap-4">

                            <div class="text-sm text-gray-500">
                                
                                 <Link :href="route('user-account.edit', { user_account: user.id })">
                                   {{ user.name }}
                                </Link>
                            </div> 


                        <div v-if="isAdmin" class="btn-primary">
                            <Link :href="route('formation.create')" as="button"
                                >+ New formation
                            </Link>
                        </div>

                        <div>
                            <Link
                                :href="route('logout')"
                                method="delete"
                                as="button"
                                @click="logout"
                            >
                                Logout
                            </Link>
                        </div>
                    </div>
                    <div v-else>
                        <div class="flex items-center gap-3">
                            <Link
                                :href="route('user-account.create')"
                                as="button"
                                >Register</Link
                            >

                            <Link :href="route('login')" as="button"
                                >Sign-in</Link
                            >
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
    </header>

    <main class="container mx-auto p-4 w-full">
        <slot>Default</slot>
    </main>
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
const user = computed(() => page.props.user);

const logout = async () => {
    await fetch(route("logout"), {
        method: "DELETE",
    });
    location.reload(); // Reload the page after logging out
};


const isAdmin = computed(() => {
  try {
    return page.props.user.role === 'admin';
  } catch (e) {
    console.error(e);
    return false;
  }
});

</script>
