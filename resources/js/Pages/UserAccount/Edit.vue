<template>
    <form @submit.prevent="update" method="POST">
        <div class="lg:w-1/3 mx-auto sm:w-1/2 md:w-1/2 xl:w-1/3">
            <div>
                <label for="name" class="label">Name</label>
                <input
                    v-model="form.name"
                    type="text"
                    id="name"
                    class="input"
                />
                <div class="input-error" v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
            <div class="mt-4">
                <label for="email" class="label">E-mail</label>
                <input
                    v-model="form.email"
                    type="text"
                    id="email"
                    class="input"
                />
                <div class="input-error" v-if="form.errors.email">
                    {{ form.errors.email }}
                </div>
            </div>

            <div>
                <input
                    v-model="form.password"
                    type="text"
                    id="name"
                    class="input"
                />
                <input
                    v-model="form.role"
                    type="text"
                    id="name"
                    class="input"
                />
            </div>
            <button class="mt-5 btn-primary w-full" type="submit">Edit</button>
            <div>
                <Link
                    :href="
                        route('user-account.destroy', {
                            user_account: user.id,
                        })
                    "
                    method="DELETE"
                >
                    <button
                        class="mt-5 btn-primary bg-red-700 w-full"
                        type="submit"
                    >
                        Delete Account
                    </button>
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
});

const update = () => {
    console.log(form.data()); // add this line

    form.put(route("user-account.edit", { user_account: props.user.id }));
};
</script>
