<template>
    <form @submit.prevent="register">
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
            <div class="mt-4">
                <label for="password_confirmation" class="label text-black">Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" id="password_confirmation" class="input rounded-2xl" />
            </div>
            <div class="mt-4 " >
                <button class="btn-primary w-full rounded-2xl" type="submit">
                    Create Account
                </button>
                <div class="mt-2 text-center">
                    <Link :href="route('login')" class="text-sm text-gray-500"> Already have an account?
                    </Link>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

import { useForm } from "@inertiajs/vue3";
const form = useForm({

    name: null,
    email: null,
    niveau: null,
    password: null,
    password_confirmation: null,
});
const register = () => form.post(route('user-account.store'));
</script>
