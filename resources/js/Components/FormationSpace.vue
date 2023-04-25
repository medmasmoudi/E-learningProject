<template>
    <div class="max-w-sm w-full lg:max-w-full lg:flex">
        <div class="w-3/10 object-cover">
            <img
                :src="'/images/' + formation.Image"
                alt=""
                style="
                    max-width: 200px;
                    max-height: 150px;
                    height: 100%;
                    object-fit: cover;
                    margin: 0;
                    padding: 0;
                "
            />
        </div>
        <div class="w-7/10 px-4">
            <span class="font-bold">
                <Link :href="route('formation.show', formation.id)">
                    {{ formation.Title }}
                </Link>
            </span>
            <br />
            <span class="text-gray-600 dark:text-gray-300">
                {{ formation.Description }}
            </span>

            <br />
            <span class="text-xs text-white bg-gray-300 rounded-md p-1">
                {{ formation.Tags }}
            </span>

            <div v-if="isAdmin" class="grid grid-cols-2 text-center mt-2 justify-end w-full">
                <span>
                    <Link
                        :href="
                            route('formation.edit', { formation: formation.id })
                        "
                    >
                        <div
                            class="border-gray-700 border-2 rounded-md mx-2 hover:bg-gray-700 hover:text-white"
                        >
                            Edit
                        </div>
                    </Link>
                </span>
                <span>
                    <Link
                        :href="
                            route('formation.destroy', {
                                formation: formation.id,
                            })
                        "
                        method="DELETE"
                    >
                        <div
                            class="border-gray-700 border-2 rounded-md mx-2 hover:bg-gray-700 hover:text-white"
                        >
                            Delete
                        </div>
                    </Link>
                </span>
            </div>
        </div>
    </div>
</template>

<script setup>
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
