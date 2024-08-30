<template>
    <body>
        <section
            class="w-full h-[950px] bg-cover bg-center bg-no-repeat md:h-full bg-[url('/img/st.joseph.jpg')] bg-[#e9bf29bb] bg-opacity-15 bg-blend-multiply"
        >
            <div class="absolute top-0 left-0 md:m-4">
                <img src="/img/logo.png" alt="Logo" class="h-16 w-auto ml-14" />
                <p class="text-white mt-2">Regina Pacis Catholic Church</p>
            </div>
            <div class="px-4 mx-auto max-w-screen-xl text-start py-24 lg:py-56">
                <div class="flex items-center justify-center h-full">
                    <div
                        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
                    >
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
                            >
                                Sign in to your account
                            </h1>
                            <form
                                @submit.prevent="login"
                                class="space-y-4 md:space-y-6"
                            >
                                <div>
                                    <label
                                        for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Your email</label
                                    >
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="name@company.com"
                                        required=""
                                    />
                                    <div
                                        class="input-error"
                                        v-if="form.errors.email"
                                    >
                                        {{ form.errors.email }}
                                    </div>
                                </div>
                                <div>
                                    <label
                                        for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Password</label
                                    >
                                    <input
                                        v-model="form.password"
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="e.g YourPassword"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required=""
                                    />
                                    <div
                                        class="input-error"
                                        v-if="form.errors.password"
                                    >
                                        {{ form.errors.password }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input
                                                id="remember"
                                                aria-describedby="remember"
                                                type="checkbox"
                                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                            />
                                        </div>
                                        <!-- required="" -->
                                        <div class="ml-3 text-sm">
                                            <label
                                                for="remember"
                                                class="text-gray-500 dark:text-gray-300"
                                                >Remember me</label
                                            >
                                        </div>
                                    </div>
                                    <a
                                        href="reset-password.html"
                                        class="text-sm font-medium text-green-600 hover:underline dark:text-green-500"
                                        >Forgot password?</a
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                >
                                    Sign in
                                </button>
                                <p
                                    class="text-sm font-light text-gray-500 dark:text-gray-400"
                                >
                                    Don’t have an account yet?
                                    <span>
                                        <Link
                                            :href="route('register')"
                                            class="font-medium text-green-600 hover:underline dark:text-green-700"
                                            >Sign up</Link
                                        >
                                    </span>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</template>

<script setup>
import { route } from "ziggy-js";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
});
const login = () => form.post(route("login.store"));
</script>

<script>
import AuthLayout from "../../layouts/AuthLayout.vue";
import { route } from "ziggy-js";

export default {
    layout: AuthLayout,
};
</script>
