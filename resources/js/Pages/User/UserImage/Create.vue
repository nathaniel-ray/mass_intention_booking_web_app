<template>
    <div class="p-6 bg-gray-100">
        <div
            class="ml-[350px] justify-center py-3 px-4 border border-gray-200 rounded-3xl w-2/4 h-auto bg-white"
        >
            <section class="flex justify-center mb-7">
                <div class="justify-center border rounded-full w-64 h-64">
                    <div v-if="user.images.length">
                        <div
                            v-for="image in user.images"
                            :key="image.id"
                            class="flex flex-col justify-between"
                        >
                            <img
                                :src="image.src"
                                class="w-64 h-64 object-cover rounded-full"
                            />
                            <Link
                                :href="
                                    route('user.user.image.destroy', {
                                        user: props.user.id,
                                        image: image.id,
                                    })
                                "
                                method="delete"
                                as="button"
                                class="mt-1 mb-5 p-1 border rounded-md bg-white text-red-500 border-red-500 hover:bg-red-600 hover:text-white"
                                >Delete</Link
                            >
                        </div>
                    </div>
                    <div v-else>
                        <img
                            class="w-64 h-64 object-cover rounded-full"
                            src="/img/R.jpeg"
                            alt=""
                        />
                    </div>
                </div>
            </section>
            <section class="text-center">
                <form @submit.prevent="upload">
                    <p class="p-2 font-medium">{{ user.name }}</p>
                    <label
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="file_input"
                        >Upload profile
                    </label>
                    <input
                        class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-green-100 file:dark:bg-gray-800 file:font-medium file:hover:bg-green-200 file:dark:hover:bg-gray-700 file:hover:cursor-pointer file:mr-4"
                        aria-describedby="file_input_help"
                        id="file_input"
                        @input="addfiles"
                        type="file"
                    />

                    <button
                        :disabled="!canUpload"
                        type="submit"
                        class="disabled:opacity-25 disabled:cursor-not-allowed ml-4 p-1 border rounded-md bg-green-500 text-white hover:bg-green-600"
                    >
                        upload
                    </button>
                    <button
                        type="reset"
                        @click="reset"
                        class="ml-2 p-1 border rounded-md bg-white text-green-500 border-green-500 hover:bg-green-600 hover:text-white"
                    >
                        Reset
                    </button>

                    <p
                        class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                        id="file_input_help"
                    >
                        SVG, PNG, JPG or JPEG (MAX. 800x400px).
                    </p>

                    <div v-if="imageErrors.length" class="text-red-500 text-sm">
                        <div v-for="(error, index) in imageErrors" :key="index">
                            {{ error }}
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";
import Nprogress from "nprogress";
const props = defineProps({ user: Object });

Inertia.on("progress", (event) => {
    if (event.detail.progress.percentage) {
        Nprogress.set((event.detail.progress.percentage / 100) * 0.9);
    }
});
const form = useForm({
    images: [],
});
const imageErrors = computed(() => Object.values(form.errors));

const canUpload = computed(() => form.images.length);
const upload = () => {
    form.post(route("user.user.image.store", { user: props.user.id }), {
        onSuccess: () => {
            console.log("Upload successful, resetting form");
            form.reset("images");
            Inertia.reload(); // Reload to refresh the user's images
        },
    });
};
const addfiles = (event) => {
    form.images = []; // Clear any existing images
    const image = event.target.files[0]; // Get the first selected image
    if (image) {
        form.images.push(image);
    }
};
const reset = () => form.reset("images");
</script>
<script>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
