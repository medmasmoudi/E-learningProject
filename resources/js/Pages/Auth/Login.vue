<template>
    <form @submit.prevent="login">
        <div class="lg:w-1/3 mx-auto sm:w-1/2 md:w-1/2 xl:w-1/3">
            <div>
                <label for="email" class="label">E-mail</label>
                <input v-model="form.email" type="text" id="email" class="input" />
                <div class="input-error" v-if="form.errors.email">{{form.errors.email}}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input v-model="form.password" type="password" id="password" class="input" />
                <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>

            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Login</button>
                <div class="mt-2 text-center">
                 <Link :href="route('user-account.create')" class="text-sm text-gray-500"> Create Account
                </Link>
            </div>
            </div>

        </div>
    </form>
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
