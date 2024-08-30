<template>
    <div class="px-4 sm:ml-64">
        <div class="grid grid-cols-2">
            <SearchBar />
            <div class="mt-2">
                <div class="flex justify-between">
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
        </div>

        <!-- Action table -->
        <div class="relative overflow-x-auto mt-7">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">NAME</th>
                        <th scope="col" class="px-6 py-3">iNTENTION FOR</th>
                        <th scope="col" class="px-6 py-3">START DATE</th>
                        <th scope="col" class="px-6 py-3">END DATE</th>
                        <th scope="col" class="px-6 py-3">OPEN THANKSGIVING</th>
                        <th scope="col" class="px-6 py-3">ACTIONS</th>
                    </tr>
                </thead>
                <tbody v-for="intention in intentions.data" :key="intention.id">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ intention.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ intention.intention_for }}
                        </td>
                        <td class="px-6 py-4">
                            {{ formatDate(intention.start_date) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ formatDate(intention.end_date) }}
                        </td>
                        <td class="px-6 py-4">N/A</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <Link
                                :href="
                                    route('admin.intention.edit', {
                                        intention: intention.id,
                                    })
                                "
                                as="button"
                                :class="{
                                    'text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800':
                                        canEdit(intention),
                                    'text-gray-400 bg-green-300 cursor-not-allowed px-5 py-2.5 me-2 mb-2  rounded-lg':
                                        !canEdit(intention),
                                }"
                                :disabled="!canEdit(intention)"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="
                                    route('admin.intention.destroy', {
                                        intention: intention.id,
                                    })
                                "
                                method="delete"
                                as="button"
                                :class="{
                                    'text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800':
                                        canDelete(intention),
                                    'text-gray-400 bg-red-300 cursor-not-allowed px-5 py-2.5 me-2 mb-2  rounded-lg':
                                        !canDelete(intention),
                                }"
                                :disabled="!canDelete(intention)"
                            >
                                Delete
                            </Link>
                            <Link
                                :href="
                                    route('admin.intention.show', {
                                        intention: intention.id,
                                    })
                                "
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            >
                                View
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination Component -->
            <div
                v-if="intentions.data.length"
                class="w-full flex justify-center mt-8 mb-8"
            >
                <Pagination :links="intentions.links" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import Pagination from "../../Components/UI/Pagination.vue";
import SearchBar from "../../Components/SearchBar.vue";

defineProps({ intentions: Object, search: Object });

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toDateString();
}

const canEdit = (intention) => {
    const createdAt = new Date(intention.created_at);
    const now = new Date();
    const timeDiff = now - createdAt;
    const twoHours = 72 * 60 * 60 * 1000; // 24 hours in milliseconds
    return timeDiff < twoHours;
};

const canDelete = (intention) => {
    return canEdit(intention);
};
</script>
