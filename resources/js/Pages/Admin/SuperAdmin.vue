<script setup lang="ts">
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";

// Define email refs for both forms
const emailForMakeAdmin = ref("");
const emailForRemoveAdmin = ref("");

// Define forms with appropriate data
const makeAdminForm = useForm({
    email: "",
    is_admin: 1,
});

const removeAdminForm = useForm({
    email: "",
});

// Method to make a user an admin
const makeAdmin = () => {
    makeAdminForm.post(route("admin.user.make-admin"), {
        data: {
            email: emailForMakeAdmin.value,
            is_admin: 1,
        },
        onSuccess: () => {
            emailForMakeAdmin.value = ""; // Reset input after successful request
        },
        onError: (errors) => {
            console.error(errors);
        },
    });
};

// Method to remove admin role
const removeAdmin = () => {
    removeAdminForm.post(
        route("admin.user.remove-admin", { id: emailForRemoveAdmin.value }),
        {
            onSuccess: () => {
                emailForRemoveAdmin.value = ""; // Reset input after successful request
            },
            onError: (errors) => {
                console.error(errors);
            },
        }
    );
};
</script>

<template>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mb-3 flex items-center justify-center gap-5 text-xl">
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
                >Super Admin
            </Link>
        </div>
        <div>
            <!-- Form to make a user an admin -->
            <form @submit.prevent="makeAdmin">
                <div class="mx-8 mb-4 p-7 bg-gray-100 rounded-md">
                    <div class="text-3xl font-bold">Make a user an admin</div>
                    <label
                        for="email-make-admin"
                        class="block pt-6 mb-2 font-medium text-gray-900 dark:text-white text-xl"
                        >User's Email</label
                    >
                    <input
                        v-model="emailForMakeAdmin"
                        type="email"
                        name="email"
                        id="email-make-admin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="test@example.com"
                        required
                    />
                    <button
                        type="submit"
                        class="mt-4 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    >
                        Update Changes
                    </button>
                </div>
            </form>
        </div>

        <div>
            <!-- Form to remove admin role -->
            <form @submit.prevent="removeAdmin">
                <div class="mx-8 p-7 bg-gray-100 rounded-md">
                    <div class="text-3xl font-bold">Remove an admin</div>
                    <label
                        for="email-remove-admin"
                        class="block pt-6 mb-2 font-medium text-gray-900 dark:text-white text-xl"
                        >User's Email</label
                    >
                    <input
                        v-model="emailForRemoveAdmin"
                        type="email"
                        name="email"
                        id="email-remove-admin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="test@example.com"
                        required
                    />
                    <button
                        type="submit"
                        class="mt-4 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    >
                        Remove
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
