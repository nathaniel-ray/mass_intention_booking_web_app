<template>
    <nav class="bg-white p-3">
        <div class="container mx-auto px-4">
            <div class="flex justify-between">
                <a :href="route('intention.home')" class="flex items-center">
                    <img
                        src="/img/logo.png"
                        alt="Logo"
                        class="inline-block w-8 h-8 md:w-20 md:h-20"
                    />
                    <span class="text-dark ml-2 text-xs md:text-xl"
                        >Regina Pacis Catholic Church</span
                    >
                </a>
                <button class="text-gray-500 focus:outline-none md:hidden">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="flex items-center space-x-3">
                    <a
                        :href="route('intention.home')"
                        class="text-secondary text-xs md:text-base flex items-center"
                    >
                        ← Go Back
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div>
        <Alert v-if="showAlert" :message="alertMessage" :duration="5000" />
        <!-- Other content -->
    </div>

    <slot>Default</slot>

    <footer class="mt-10">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center">
                        <p
                            class="self-center text-2xl font-semibold whitespace-nowrap text-black dark:text-white"
                        >
                            Visit us <br />
                            <span class="text-sm text-gray-500">
                                8, Felix Oriarevho Street, Checking Point Bus
                                Stop. PEACE
                                <br />
                                ESTATE Lekki-Epe Expressway, Sangotedo, Lagos,
                                Nigeria
                            </span>
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2
                            class="mb-2 text-sm font-semibold text-gray-900 uppercase dark:text-white"
                        >
                            Useful Links
                        </h2>
                        <ul
                            class="text-gray-500 dark:text-gray-400 font-medium p-2"
                        >
                            <li>
                                <a href="" class="hover:underline">Home</a>
                            </li>
                            <li>
                                <a href="" class="hover:underline">Parish</a>
                            </li>
                            <li>
                                <a href="" class="hover:underline"
                                    >Activities</a
                                >
                            </li>
                            <li>
                                <a href="" class="hover:underline"
                                    >Organizations</a
                                >
                            </li>
                            <li>
                                <a href="" class="hover:underline">News</a>
                            </li>
                            <li>
                                <a href="" class="hover:underline">Donate</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2
                            class="mb-2 text-sm font-semibold text-gray-900 uppercase dark:text-white"
                        >
                            Office Hours
                        </h2>
                        <ul
                            class="text-gray-500 dark:text-gray-400 font-medium"
                        >
                            <li class="mb-2">
                                <p>
                                    Office Hours: <br />
                                    Monday-Friday: 9am-6pm Sundays: <br />
                                    8am-12noon
                                </p>
                            </li>
                            <li>
                                <a href="" class="hover:underline"
                                    >Email: info@reginapaciscc.org</a
                                >
                            </li>
                            <li>
                                <p class="mt-2">Phone: +2348136952196</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr
                class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
            />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span
                    class="text-sm text-gray-500 sm:text-center dark:text-gray-400"
                >
                    .All rights reserved. © 2024 ReginaPacis.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a
                        href="#"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
                    >
                        <span class="hover:underline">Back to the top ↑</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Alert from "@/Components/Alert.vue";

const page = usePage();
const alertMessage = ref("");
const showAlert = ref(false);

const showNotification = (message) => {
    console.log("Showing notification:", message);
    alertMessage.value = message;
    showAlert.value = true;
    setTimeout(() => {
        showAlert.value = false;
    }, 5000); // Match the duration
};

// Handle Inertia messages
if (page.props.flash.success) {
    showNotification(page.props.flash.success);
}
</script>

<style scoped>
.opacity-0 {
    opacity: 0;
}

.opacity-100 {
    opacity: 1;
}
</style>
