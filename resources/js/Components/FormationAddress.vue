<template>
    <div class="px-10 py-6 grid grid-cols-12">
        <div class="col-span-10">
            <div class="text-5xl">
                {{ formation.Title }}
                <div class="mt-6 text-lg">
                    {{ formation.Description }}
                </div>
            </div>
        </div>
        <div class="col-span-2 text-center my-auto mx-14 bg-indigo-600 text-gray-200 rounded-md">
            Join
        </div>
    </div>
</template>

<script setup>
defineProps({
    formation: Object,
})

</script>

