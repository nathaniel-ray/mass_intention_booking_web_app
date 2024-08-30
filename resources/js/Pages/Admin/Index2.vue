<template>
    <div class="px-4 sm:ml-64">
        <!-- Search Bar -->
        <div class="">
            <form class="flex justify-start max-w-sm m-4">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div
                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                    >
                        <svg
                            class="w-4 h-4 text-gray-500 dark:text-gray-400"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 18 20"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"
                            />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="simple-search"
                        class="bg-gray-50 border border-green-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search branch name..."
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-green-700 rounded-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                        />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>

        <!-- Filter and Export -->
        <div class="grid grid-cols-1 gap-3 mb-2 mt-5">
            <div class="p-4">
                <div class="flex gap-4">
                    <p class="font-normal text-sm">Filter Mass Bookings</p>
                    <button
                        id="dropdownDefaultButton"
                        data-dropdown-toggle="dropdown"
                        class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-sm px-1 text-center inline-flex items-center dark:bg-white dark:focus:ring-blue-800"
                        type="button"
                    >
                        Today
                        <svg
                            class="w-2.5 h-2.5 ms-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 10 6"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 4 4 4-4"
                            />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div
                        id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                    >
                        <ul
                            class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton"
                        >
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >Dashboard</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >Settings</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >Earnings</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >Sign out</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="flex justify-between">
                    <button
                        type="button"
                        class="flex w-[221px] h-[56px] text-gray-500 bg-white rounded-md border border-green-700 dark:border-[#007464] hover:text-green-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-green-400 dark:bg-white dark:hover:bg-green-800 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400"
                    >
                        <svg
                            class="w-5 h-5 mb-1 mt-5 ml-3 text-[#007464]"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"
                            />
                            <path
                                d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"
                            />
                        </svg>
                        <span
                            class="mt-4 pl-2 text-md font-medium text-[#007464] dark:hover:text-white"
                            >Export Mass Intension</span
                        >
                    </button>
                    <a
                        href="#"
                        class="flex text-green-700 dark:text-black hover:underline font-semibold mt-3"
                        >12th Oct
                        <span>
                            <svg
                                class="w-2.5 h-2.5 ms-3 mt-2"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 10 6"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 1 4 4 4-4"
                                />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Intentions List -->
            <div
                v-for="intention in intentions.data"
                :key="intention.id"
                class=""
            >
                <div class="">
                    <div
                        class="items-start p-2 rounded bg-gray-50 h-auto dark:bg-white border border-neutral-400"
                    >
                        <div class="flex justify-between">
                            <div class="text-sm text-black dark:text-black">
                                {{ intention.name }}
                            </div>
                            <div class="ml-72 text-gray-400">
                                {{ daysAgo(intention.created_at) }}
                            </div>
                        </div>
                        <div class="flex justify-start gap-2 text-xs py-2">
                            <p class="rounded bg-green-300 px-1">
                                Scheduled to be read on
                                {{ formatDate(intention.start_date) }}
                            </p>
                        </div>
                        <p class="text-sm">{{ intention.intention }}</p>
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
                                />
                            </svg>
                            <p class="pl-2">
                                {{ formatDate(intention.created_at) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination Component -->
        <div
            v-if="intentions.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="intentions.links" />
        </div>
    </div>
</template>

<script setup>
import Box from "../../Components/UI/Box.vue";
import Pagination from "../../Components/UI/Pagination.vue";

const props = defineProps({
    intentions: Object, // Ensure intentions prop is received as expected
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
