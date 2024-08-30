<template>
    <div class="p-4 sm:ml-64">
        <div>
            <div
                class="p-4 mb-3 flex items-center justify-center gap-5 text-xl"
            >
                <Link
                    :href="route('admin.settings')"
                    :class="[
                        route().current('admin.settings')
                            ? 'text-green-600 underline'
                            : 'text-gray-400',
                    ]"
                    >General Settings
                </Link>
                <Link
                    :href="route('admin.superadmin')"
                    :class="[
                        route().current('admin.superadmin')
                            ? 'text-green-600 underline'
                            : 'text-gray-400',
                    ]"
                    >Super admin
                </Link>
            </div>

            <h2
                class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
            >
                Update Your Details
            </h2>

            <section class="bg-gray-50 dark:bg-gray-900">
                <div
                    class="flex flex-col items-center justify-start px-6 py-8 mx-auto md:h-screen lg:py-0"
                >
                    <div
                        class="w-full p-6 bg-white rounded-lg dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8"
                    >
                        <h2
                            class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
                        >
                            Your Details
                        </h2>
                        <form
                            class="mt-4 space-y-4 lg:mt-5 md:space-y-5"
                            @submit.prevent="update"
                        >
                            <div>
                                <label
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Your name</label
                                >
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Sochima Anayolisa"
                                    required
                                />
                            </div>
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
                                    required
                                />
                            </div>
                            <div class="flex items-start"></div>
                            <button
                                type="submit"
                                class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            >
                                Update Changes
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";
const props = defineProps({
    user: Object,
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const update = () =>
    form.put(route("admin.settings.update", { user: props.user.id }));
</script>
