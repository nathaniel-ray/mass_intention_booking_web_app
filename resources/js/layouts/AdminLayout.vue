<!-- <script setup lang="ts">

</script> -->

<!-- <template>
    admins layout
    <slot>default</slot>
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>

<style scoped>
.success {
    background-color: green;
    color: white;
}
 </style> -->
<template>
    <body>
        <aside
            id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar"
        >
            <div
                class="h-full px-3 py-4 overflow-y-auto bg-[#f7f0d7b2] dark:bg-[#e4ce85b2]"
            >
                <a href="#" class="flex items-center ps-2.5 ml-11 pl-9 mb-3">
                    <img
                        src="/img/logo.png"
                        class="h-7 me-3 lg:h-14"
                        alt="REGINA LOGO"
                    />
                </a>
                <div
                    class="ml-3 self-center text-md font-normal whitespace-nowrap text-green-600 dark:text-green-700 pb-10"
                >
                    Regina Pacis Catholic Church
                </div>
                <ul class="space-y-2 font-normal">
                    <li>
                        <Link
                            :href="route('admin.user.index')"
                            :class="{
                                'flex items-center p-2 text-green-500 rounded-lg dark:text-green-700 hover:bg-[#AAD1CB] dark:hover:bg-[#267e71] dark:hover:text-green-900 group': true,
                                'border-l-4 border-green-600 bg-[#f7f0d7] dark:bg-[#e4ce85]':
                                    route().current('admin.user.index'),
                            }"
                        >
                            <svg
                                class="w-5 h-5 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-gray-900 dark:group-hover:text-green-900"
                                data-slot="icon"
                                fill="none"
                                stroke-width="1.5"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"
                                ></path>
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </Link>
                    </li>

                    <li>
                        <Link
                            :href="route('admin.intentions')"
                            :class="{
                                'flex items-center p-2 text-green-500 rounded-lg dark:text-green-700 hover:bg-[#AAD1CB] dark:hover:bg-[#267e71] dark:hover:text-green-900 group': true,
                                'border-l-4 border-green-600 bg-[#f7f0d7] dark:bg-[#e4ce85]':
                                    route().current('admin.intentions'),
                            }"
                        >
                            <svg
                                class="w-5 h-5 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-gray-900 dark:group-hover:text-green-900"
                                data-slot="icon"
                                fill="none"
                                stroke-width="1.5"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                ></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap"
                                >Intention Details</span
                            >
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('admin.index2')"
                            :class="{
                                'flex items-center p-2 text-green-500 rounded-lg dark:text-green-700 hover:bg-[#AAD1CB] dark:hover:bg-[#267e71] dark:hover:text-green-900 group': true,
                                'border-l-4 border-green-600 bg-[#f7f0d7] dark:bg-[#e4ce85]':
                                    route().current('admin.index2'),
                            }"
                        >
                            <svg
                                class="w-5 h-5 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-gray-900 dark:group-hover:text-green-900"
                                data-slot="icon"
                                fill="none"
                                stroke-width="1.5"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6"
                                ></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap"
                                >Mass Bookings</span
                            >
                            <!-- <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300"
                                >3</span
                            > -->
                        </Link>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center p-2 text-green-500 rounded-lg dark:text-green-700 hover:bg-[#AAD1CB] dark:hover:bg-[#267e71] dark:hover:text-green-900 group"
                        >
                            <svg
                                class="w-5 h-5 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-gray-900 dark:group-hover:text-green-900"
                                data-slot="icon"
                                fill="none"
                                stroke-width="1.5"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"
                                ></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap"
                                >Manage Payments</span
                            >
                        </a>
                    </li>
                    <li>
                        <Link
                            :href="route('admin.settings')"
                            :class="{
                                'flex items-center p-2 text-green-500 rounded-lg dark:text-green-700 hover:bg-[#AAD1CB] dark:hover:bg-[#267e71] dark:hover:text-green-900 group': true,
                                'border-l-4 border-green-600 bg-[#f7f0d7] dark:bg-[#e4ce85]':
                                    route().current('admin.settings'),
                            }"
                        >
                            <svg
                                class="w-5 h-5 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-gray-900 dark:group-hover:text-green-900"
                                data-slot="icon"
                                fill="none"
                                stroke-width="1.5"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
                                ></path>
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                ></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap"
                                >Settings</span
                            >
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('user.account.index')"
                            class="flex items-center p-2 text-green-500 rounded-lg dark:text-green-700 hover:bg-[#AAD1CB] dark:hover:bg-[#267e71] dark:hover:text-green-900 group"
                        >
                            <svg
                                class="w-5 h-5 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-green-900 dark:group-hover:text-green-900"
                                data-slot="icon"
                                fill="none"
                                stroke-width="1.5"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                ></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap"
                                >Users View</span
                            >
                        </Link>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex items-center mt-44 p-2 text-green-500 rounded-lg dark:text-green-700 hover:bg-[#AAD1CB] dark:hover:bg-[#267e71] dark:hover:text-green-900 group"
                        >
                            <svg
                                class="w-5 h-5 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-gray-900 dark:group-hover:text-green-900"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 18 16"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"
                                />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap"
                                >Log out</span
                            >
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="p-4 sm:ml-64">
            <div>
                <nav class="flex justify-between p-4">
                    <p class="font-semibold text-xl">
                        Today’s Mass Booking Analytics
                    </p>

                    <Link
                        :href="route('admin.notification.index')"
                        id="dropdownNotificationButton"
                        data-dropdown-toggle="dropdownNotification"
                        class="relative inline-flex items-center text-xl font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400 pr-2 py-2"
                        type="button"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 14 20"
                        >
                            <path
                                d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"
                            />
                        </svg>

                        <div
                            v-if="notificationCount"
                            class="absolute right-0 top-0 w-4 h-4 bg-red-700 dark:bg-red-400 text-white font-medium border-white dark:border-gray-900 rounded-full text-xs text-center"
                        >
                            {{ notificationCount }}
                        </div>
                    </Link>

                    <!-- <div
                        id="dropdownNotification"
                        class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700"
                        aria-labelledby="dropdownNotificationButton"
                    >
                        <div
                            class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white"
                        >
                            Notifications
                        </div>
                        <div
                            class="divide-y divide-gray-100 dark:divide-gray-700"
                        >
                            <a
                                href="#"
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        class="rounded-full w-11 h-11"
                                        src="/images/people/profile-picture-1.jpg"
                                        alt="Jese image"
                                    />
                                    <div
                                        class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800"
                                    >
                                        <svg
                                            class="w-2 h-2 text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 18 18"
                                        >
                                            <path
                                                d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"
                                            />
                                            <path
                                                d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div
                                        class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"
                                    >
                                        New message from
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white"
                                            >Jese Leos</span
                                        >: "Hey, what's up? All set for the
                                        presentation?"
                                    </div>
                                    <div
                                        class="text-xs text-blue-600 dark:text-blue-500"
                                    >
                                        a few moments ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        class="rounded-full w-11 h-11"
                                        src="/images/people/profile-picture-2.jpg"
                                        alt="Joseph image"
                                    />
                                    <div
                                        class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-gray-900 border border-white rounded-full dark:border-gray-800"
                                    >
                                        <svg
                                            class="w-2 h-2 text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 20 18"
                                        >
                                            <path
                                                d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div
                                        class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"
                                    >
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white"
                                            >Joseph Mcfall</span
                                        >
                                        and
                                        <span
                                            class="font-medium text-gray-900 dark:text-white"
                                            >5 others</span
                                        >
                                        started following you.
                                    </div>
                                    <div
                                        class="text-xs text-blue-600 dark:text-blue-500"
                                    >
                                        10 minutes ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        class="rounded-full w-11 h-11"
                                        src="/images/people/profile-picture-3.jpg"
                                        alt="Bonnie image"
                                    />
                                    <div
                                        class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-red-600 border border-white rounded-full dark:border-gray-800"
                                    >
                                        <svg
                                            class="w-2 h-2 text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 20 18"
                                        >
                                            <path
                                                d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div
                                        class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"
                                    >
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white"
                                            >Bonnie Green</span
                                        >
                                        and
                                        <span
                                            class="font-medium text-gray-900 dark:text-white"
                                            >141 others</span
                                        >
                                        love your story. See it and view more
                                        stories.
                                    </div>
                                    <div
                                        class="text-xs text-blue-600 dark:text-blue-500"
                                    >
                                        44 minutes ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        class="rounded-full w-11 h-11"
                                        src="/images/people/profile-picture-4.jpg"
                                        alt="Leslie image"
                                    />
                                    <div
                                        class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-green-400 border border-white rounded-full dark:border-gray-800"
                                    >
                                        <svg
                                            class="w-2 h-2 text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 20 18"
                                        >
                                            <path
                                                d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div
                                        class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"
                                    >
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white"
                                            >Leslie Livingston</span
                                        >
                                        mentioned you in a comment:
                                        <span
                                            class="font-medium text-blue-500"
                                            href="#"
                                            >@bonnie.green</span
                                        >
                                        what do you say?
                                    </div>
                                    <div
                                        class="text-xs text-blue-600 dark:text-blue-500"
                                    >
                                        1 hour ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        class="rounded-full w-11 h-11"
                                        src="/images/people/profile-picture-5.jpg"
                                        alt="Robert image"
                                    />
                                    <div
                                        class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-purple-500 border border-white rounded-full dark:border-gray-800"
                                    >
                                        <svg
                                            class="w-2 h-2 text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 20 14"
                                        >
                                            <path
                                                d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div
                                        class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"
                                    >
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white"
                                            >Robert Brown</span
                                        >
                                        posted a new video: Glassmorphism -
                                        learn how to implement the new design
                                        trend.
                                    </div>
                                    <div
                                        class="text-xs text-blue-600 dark:text-blue-500"
                                    >
                                        3 hours ago
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a
                            href="#"
                            class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white"
                        >
                            <div class="inline-flex items-center">
                                <svg
                                    class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 20 14"
                                >
                                    <path
                                        d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"
                                    />
                                </svg>
                                View all
                            </div>
                        </a>
                    </div> -->
                </nav>
                <div>
                    <Alert
                        v-if="showAlert"
                        :message="alertMessage"
                        :duration="5000"
                    />
                    <!-- Other content -->
                </div>
            </div>
        </div>
    </body>
    <slot></slot>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { ref, computed } from "vue";
import Alert from "../Components/Alert.vue";
defineProps({
    intentions: Array, // intentions should be of type Object
});
const page = usePage();
const user = computed(() => page.props.user);
// alert
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

const notificationCount = computed(() =>
    Math.min(page.props.user.notificationCount, 9)
);
</script>
