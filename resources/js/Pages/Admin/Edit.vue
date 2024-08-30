<template>
    <body>
        <div class="p-4 sm:ml-64">
            <div></div>

            <!-- search bar -->

            <div class="flex justify-between">
                <div class="p-4">
                    <Link class="flex" :href="route('admin.intentions')">
                        <svg
                            class="w-6 h-6"
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
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                            ></path>
                        </svg>
                        <span class="pl-4">Mass Booking Intention details</span>
                    </Link>
                </div>
                <div class="flex justify-between">
                    <button
                        type="button"
                        class="flex w-[221px] h-[56px] mr-4 text-gray-500 bg-white rounded-md border border-green-700 dark:border-[#007464] hover:text-green-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-green-400 dark:bg-white dark:hover:bg-green-800 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400"
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
                            >Export Mass Intention</span
                        >
                    </button>
                </div>
            </div>

            <!-- end of search bar -->

            <section class="bg-white">
                <div class="max-w-2xl px-4 py-8 mx-auto lg:py-3">
                    <h2 class="mb-4 text-xl font-bold text-black">
                        Update intention
                    </h2>
                    <form @submit.prevent="update">
                        <div
                            class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5"
                        >
                            <div class="sm:col-span-2">
                                <label
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-black"
                                >
                                    Name</label
                                >
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Users Name"
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="w-full">
                                <label
                                    for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Email</label
                                >
                                <input
                                    v-model="form.email"
                                    type="email"
                                    name="Email"
                                    id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="users Email"
                                />
                                <div
                                    v-if="form.errors.email"
                                    class="text-red-600"
                                >
                                    {{ form.errors.email }}
                                </div>
                            </div>
                            <div class="w-full">
                                <label
                                    for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Phone Number</label
                                >
                                <input
                                    v-model="form.phone"
                                    type="text"
                                    name="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="users number"
                                />
                                <div
                                    v-if="form.errors.phone"
                                    class="text-red-600"
                                >
                                    {{ form.errors.phone }}
                                </div>
                            </div>
                            <div>
                                <label
                                    for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Date</label
                                >
                                <input
                                    v-model="form.created_at"
                                    type="number"
                                    name="price"
                                    id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="The start date"
                                />
                            </div>
                            <div>
                                <label
                                    for="Payment"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Payment</label
                                >
                                <input
                                    type=""
                                    name="payments"
                                    id="brand"
                                    class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="#1000"
                                    placeholder="payment"
                                    disabled
                                />
                            </div>
                            <h2
                                class="mb-4 text-xl font-bold text-gray-900 dark:text-white"
                            >
                                Intention For
                            </h2>
                            <div class="w-full">
                                <label
                                    for="thanskgiving"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Open in church thanksgiving
                                </label>
                                <input
                                    type="text"
                                    name="Thanksgiving"
                                    id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="None"
                                    placeholder="No/Yes"
                                />
                            </div>
                            <div class="w-full">
                                <label
                                    for="intention_for"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Intention Made For</label
                                >
                                <input
                                    v-model="form.intention_for"
                                    type="text"
                                    name="number"
                                    id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Intenton made for"
                                />
                                <div
                                    v-if="form.errors.intention_for"
                                    class="text-red-600"
                                >
                                    {{ form.errors.intention_for }}
                                </div>
                            </div>
                            <div class="w-full">
                                <label
                                    for="start and end date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Start - End date</label
                                >
                                <input
                                    type="text"
                                    name="s/a_date"
                                    id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    :value="`${props.intention.start_date} - ${props.intention.end_date}`"
                                    placeholder="start and end date"
                                />
                            </div>
                            <div class="w-full">
                                <label
                                    for="start and end date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Preferred Sunday Mass</label
                                >
                                <input
                                    v-model="form.sunday_mass"
                                    type="text"
                                    name="sun_mass"
                                    id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="6am Sunday mass"
                                    placeholder="Preferred Sunday mass"
                                />
                            </div>
                            <div class="w-full">
                                <label
                                    for="wkd_mass"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Preferred week day masses</label
                                >
                                <input
                                    v-model="form.weekday_mass"
                                    type="text"
                                    name="wkd_date"
                                    id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="Monday, Wednesday, Saturday"
                                    placeholder="Preferred weekday mass"
                                />
                            </div>
                            <div class="sm:col-span-2">
                                <label
                                    for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Mass Intention
                                </label>
                                <textarea
                                    v-model="form.intention"
                                    id="description"
                                    rows="8"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="The users Intentions"
                                ></textarea>
                                <div
                                    v-if="form.errors.intention"
                                    class="text-red-600"
                                >
                                    {{ form.errors.intention }}
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5 flex gap-2 justify-center">
                            <div>
                                <button
                                    class="btn hover:bg-green-600 hover:text-white text-gray-700 border border-gray-300 py-2 px-4 rounded-md"
                                    type="reset"
                                    @click="clear"
                                >
                                    Clear
                                </button>
                            </div>
                            <div>
                                <button
                                    type="submit"
                                    class="btn bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <!-- Pagination component -->
    </body>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";
const props = defineProps({
    intention: Object,
});

const form = useForm({
    name: props.intention.name,
    email: props.intention.email,
    phone: props.intention.phone,
    intention_for: props.intention.intention_for,
    intention: props.intention.intention,
    start_date: props.intention.start_date,
    end_date: props.intention.end_date,
    sunday_mass: props.intention.sunday_mass,
    weekday_mass: props.intention.weekday_mass,
    created_at: props.intention.created_at,
});

const clear = () => {
    form.reset();
};

const update = () =>
    form.put(
        route("admin.intention.update", { intention: props.intention.id })
    );
</script>
