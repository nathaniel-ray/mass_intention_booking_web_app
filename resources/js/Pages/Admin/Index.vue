<template>
    <div class="px-4 sm:ml-64">
        <div class="grid grid-cols-1 gap-4 mb-4">
            <div class="px-4">
                <p class="font-bold text-2xl">Mass Booking Overview</p>
                <p>
                    Keep track of all the mass booking and payment at a glance.
                </p>
                <div class="flex -space-x-4 rtl:space-x-reverse">
                    <img
                        class="w-10 h-10 border-2 border-white rounded-full dark:border-green-800"
                        src="/img/rosary.jpg"
                        alt=""
                    />
                    <img
                        class="w-10 h-10 border-2 border-white rounded-full dark:border-green-800"
                        src="/img/follow-him.jpg"
                        alt=""
                    />
                    <img
                        class="w-10 h-10 border-2 border-white rounded-full dark:border-green-800"
                        src="/img/chalice.jpg"
                        alt=""
                    />
                    <img
                        class="w-10 h-10 border-2 border-white rounded-full dark:border-green-900"
                        src="/img/mary.jpg"
                        alt=""
                    />
                </div>

                <!-- Grid with 3 columns -->
                <div id="grid-container" class="grid grid-cols-3 gap-4 mt-5">
                    <div id="grid" class="relative">
                        <img
                            class="h-[150px] w-full object-cover"
                            src="/img/benediction.jpg"
                            alt=""
                        />
                        <div
                            class="text-[#888883] text-2xl items-center font-bold rounded-full p-2 absolute top-0 ml-2 mt-5"
                        >
                            <p class="text-white font-semibold text-lg">200+</p>
                            <p class="text-white font-normal text-lg">
                                Total Mass booked
                            </p>
                            <div class="mt-3">
                                <Link
                                    :href="route('admin.index2')"
                                    class="rounded-md text-white bg-green-700 dark:bg-green-900 w-24 h-6 p-2 text-sm hover:shadow-lg"
                                    >See more</Link
                                >
                            </div>
                        </div>
                    </div>
                    <div id="grid" class="relative">
                        <img
                            class="h-[150px] w-full object-cover"
                            src="/img/crucifix.jpg"
                            alt=""
                        />
                        <div
                            class="text-[#888883] text-2xl items-center font-bold rounded-full p-2 absolute top-0 ml-2 mt-5"
                        >
                            <p class="text-white font-semibold">20+</p>
                            <p class="text-white font-normal text-lg">
                                Mass Booked for the day
                            </p>
                            <div class="mt-3">
                                <a
                                    href="#"
                                    class="rounded-md text-white bg-green-700 dark:bg-green-900 w-20 h-4 p-2 text-sm hover:shadow-lg"
                                    >See more</a
                                >
                            </div>
                        </div>
                    </div>
                    <div id="grid" class="relative">
                        <img
                            class="h-[150px] w-full object-cover"
                            src="/img/rosary.jpg"
                            alt=""
                        />
                        <div
                            class="text-[#888883] text-lg items-center font-bold rounded-full p-2 absolute top-0 ml-2 mt-10"
                        >
                            <p class="text-white align-middle font-normal">
                                Track Payments
                            </p>
                            <div class="mt-3">
                                <a
                                    href="#"
                                    class="rounded-md text-white bg-green-700 dark:bg-green-900 w-20 h-4 p-2 text-sm hover:shadow-lg"
                                    >See more</a
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Intentions Section -->
                <div class="mt-9">
                    <div>
                        <div class="flex justify-between mt-6">
                            <p class="font-bold mb-3 text-2xl">
                                Mass Booking Intentions
                            </p>
                            <Link
                                :href="route('admin.index2')"
                                class="text-green-700 dark:text-[#007464] hover:underline font-semibold"
                                >View all</Link
                            >
                        </div>
                        <Box
                            v-for="intention in intentions.data"
                            :key="intention.id"
                            class="items-start p-2 rounded bg-gray-50 h-auto dark:bg-white mt-2 border border-neutral-400"
                        >
                            <div class="flex justify-between">
                                <div class="text-sm text-black dark:text-black">
                                    {{ intention.name }}
                                </div>
                                <div class="text-gray-400">
                                    {{ daysAgo(intention.created_at) }}
                                </div>
                            </div>
                            <div class="flex justify-start gap-2 text-xs py-2">
                                <p class="rounded bg-green-300 px-1">
                                    Scheduled to be read on
                                    {{ formatDate(intention.start_date) }}
                                </p>
                            </div>
                            <p class="text-sm">
                                {{ intention.intention }}
                            </p>
                            <div class="flex justify-start text-xs py-2">
                                <svg
                                    class="w-4 h-4 text-green-600 transition duration-75 dark:dark:text-green-700 group-hover:text-gray-900 dark:group-hover:text-green-900"
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
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"
                                    ></path>
                                </svg>
                                <p class="pl-2">
                                    {{ formatDate(intention.created_at) }}
                                </p>
                            </div>
                        </Box>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import Box from "../../Components/UI/Box.vue";

// Define the 'intentions' prop here
defineProps({
    intentions: Object, // intentions should be of type Object
});

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toDateString();
}

function daysAgo(dateString) {
    const currentDate = new Date();
    const createdAtDate = new Date(dateString);
    const diffInDays = Math.floor(
        (currentDate - createdAtDate) / (1000 * 3600 * 24)
    );

    if (diffInDays === 0) {
        return "Today";
    } else if (diffInDays === 1) {
        return "1d ago";
    } else {
        return `${diffInDays}d ago`;
    }
}
</script>

<script>
import AdminLayout from "@/layouts/AdminLayout.vue";

export default {
    components: { Box },
    layout: AdminLayout,
};
</script>
