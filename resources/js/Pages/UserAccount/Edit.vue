<template>
    <form @submit.prevent="update" method="POST">
      <div class="lg:w-1/3 mx-auto sm:w-1/2 md:w-1/2 xl:w-1/4">
            <div>
                <label for="name" class="label text-black ">Name</label>
                <input v-model="form.name" type="text" id="name" class="input rounded-2xl" />
                <div class="input-error" v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
            <div class="mt-4">
                <label for="email" class="label text-black">E-mail</label>
                <input v-model="form.email" type="text" id="email" class="input rounded-2xl" />
                <div class="input-error" v-if="form.errors.email">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mt-4">
                <label for="niveau" class="label text-black">Niveau</label>
                <select v-model="form.niveau" id="niveau" class="input rounded-2xl">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
                <div class="input-error" v-if="form.errors.niveau">
                    {{ form.errors.niveau }}
                </div>
            </div>

            <div class="mt-4">
                <label for="password" class="label text-black">Password</label>
                <input v-model="form.password" type="password" id="password" class="input rounded-2xl" />
                <div class="input-error" v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <button class="mt-5 btn-primary w-full rounded-2xl" type="submit">Edit</button>
            <div>
                <Link :href="route('user-account.destroy', { user_account: props.user.id })" method="DELETE">

                  <button class="mt-5  w-full rounded-2xl text-red-500 italic" type="submit">Delete Account</button>

            </Link>
            </div>
        </div>
    </form>

</template>

<script setup>
const props = defineProps({
    user: Object,
});
import { useForm, Link } from "@inertiajs/vue3";
const form = useForm({
    email: props.user.email,
    name: props.user.name,
    password: props.user.password,
    role: props.user.role,
    niveau : props.user.niveau,
});

const update = () => {
    console.log(form.data()); // add this line

    form.put(route("user-account.edit", { user_account: props.user.id }));
};

console.log(props.user);

</script>
