<template>
    <!-- <div>This is Index</div>
    <Link href="/hello">Show Page</Link>
    <div>The message is {{ message }}</div> -->
    <body class="bg-gray-100">
        <!-- Jumbotron -->
        <div class="relative bg-gray-900" id="#">
            <img
                src="/img/bgimg.jpeg"
                alt="Jumbotron Image"
                class="w-full h-96 md:h-[817px] lg:h-auto object-cover opacity-50"
            />
            <div
                class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center text-center text-white px-4"
            >
                <img
                    src="/img/logo.png"
                    alt="Logo"
                    class="absolute top-4 left-4 w-16 h-16 md:w-20 md:h-20"
                />
                <h1 class="text-2xl md:text-6xl font-bold">
                    Regina Pacis Mass Booking
                </h1>
                <p class="text-sm md:text-3xl mt-2">
                    Book mass for your prayer intention...
                </p>

                <!-- Transparent Container -->
                <div
                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 px-6 flex items-center justify-between space-x-2 md:space-x-4 lg:space-x-6"
                >
                    <img
                        src="img/praying.jpeg"
                        alt="Icon Left"
                        class="w-20 h-40 md:w-28 md:h-32 lg:w-56 lg:h-44 ml-2 md:ml-4 lg:ml-6"
                    />
                    <div class="text-center text-white flex-1">
                        <p class="text-sm md:text-base lg:text-lg">
                            Send in your prayer request for this mass
                        </p>
                        <div class="flex items-center justify-center mt-2">
                            <svg
                                class="w-4 h-4 md:w-5 md:h-5 mr-2"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v1H3a2 2 0 000 4h1v7a2 2 0 002 2h10a2 2 0 002-2V9h1a2 2 0 100-4h-1V4a2 2 0 00-2-2H6zm0 3V4h10v1H6zm-1 3v7h12V8H5zm8 4a1 1 0 112-0 1 1 0 01-2 0z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span class="text-sm md:text-base lg:text-lg">{{
                                currentDate
                            }}</span>
                        </div>
                        <div class="pb-2">
                            <!-- <Link
                                class="mt-1 md:mt-4 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 md:py-3 md:px-6 lg:py-2 lg:px-5 rounded text-sm md:text-base lg:text-lg"
                                as="button"
                                :href="route('intention.create')"
                            >
                                Book mass
                            </Link> -->
                        </div>
                    </div>
                    <img
                        src="img/consencration.jpeg"
                        alt="Icon Right"
                        class="w-24 h-40 md:w-28 md:h-32 lg:w-52 lg:h-44 mr-2 md:mr-4 lg:mr-10 lg:pr-12"
                    />
                </div>
            </div>
        </div>

        <!-- Mass Information -->
        <section class="mt-20 p-5">
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-4">
                    <div class="order-2 md:order-1">
                        <p class="text-3xl text-left md:text-left font-medium">
                            The Church is a Home for all to <br />
                            come together <br />
                            <span class="text-xl pt-3 font-normal">
                                📖 Colossians 3:2 (NIV): <br />
                                “Set your minds on things that are above, not on
                                things that are on earth. For you have died, and
                                your life is hidden with Christ in God. When
                                Christ who is your life appears, then you also
                                will appear with him in glory.” <br />
                                Discover a meaningful way to honor your loved
                                ones, celebrate special moments, and seek
                                solace. Reserve a Mass intention today. 🕊️
                            </span>
                        </p>
                        <Link
                            class="mt-1 md:mt-4 bg-green-700 hover:bg-green-600 text-white font-bold py-3 px-4 md:py-3 md:px-6 lg:py-4 lg:px-3 rounded text-sm md:text-base lg:text-lg"
                            as="button"
                            :href="route('intention.create')"
                        >
                            Book mass
                        </Link>
                    </div>
                    <div class="order-1 md:order-2">
                        <img
                            src="img/bible.jpeg"
                            alt="Bible Image"
                            class="w-full h-auto rounded-md"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Mass Schedule -->
        <section class="mt-20 p-5 bg-red-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Side: Image with Green Boxes -->
                <div class="relative">
                    <!-- <div
            class="absolute top-0 left-0 w-1/2 h-1/2 bg-green-900 rounded-tl-xl border-green-900 opacity-50 transform -translate-x-1/4 -translate-y-1/4"
          ></div>
          <div
            class="absolute bottom-0 right-0 outline border-green-900 border-8 rounded w-48 h-40 transform translate-x-1/4 translate-y-1/4"
          ></div> -->
                    <!-- class="absolute bottom-0 right-0 w-1/2 h-1/2border-solid border-2
          border-sky-500 transform translate-x-1/4 translate-y-1/4" -->
                    <img
                        src="img/chalice.jpeg"
                        alt="Rectangular Image"
                        class="w-full lg:w-3/4 h-auto relative z-10 mx-auto rounded-md"
                    />
                </div>

                <!-- Right Side: Schedule -->
                <div class="flex flex-col justify-center">
                    <h2 class="text-3xl font-bold mb-8">
                        Parish Mass Activities Schedule
                    </h2>
                    <div class="space-y-8">
                        <!-- Schedule Item 1 -->
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-green-500 text-white font-bold rounded-full"
                            >
                                1
                            </div>
                            <p class="ml-4 text-lg">
                                Sunday Masses <br />6:30am, 8:15am, 10:30am &
                                6:00pm
                            </p>
                        </div>
                        <!-- Schedule Item 2 -->
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-green-500 text-white font-bold rounded-full"
                            >
                                2
                            </div>
                            <p class="ml-4 text-lg">
                                Daily Masses <br />6:00am & 7:00pm
                            </p>
                        </div>
                        <!-- Schedule Item 3 -->
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 flex items-center justify-center bg-green-500 text-white font-bold rounded-full"
                            >
                                3
                            </div>
                            <p class="ml-4 text-lg">
                                Special Events <br />Check the parish bulletin
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->

        <footer class="mt-20">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <div class="flex items-center">
                            <p
                                class="self-center text-2xl font-semibold whitespace-nowrap text-black dark:text-white"
                            >
                                Visit us <br />
                                <span class="text-sm text-gray-500">
                                    8, Felix Oriarevho Street, Checking Point
                                    Bus Stop. PEACE
                                    <br />
                                    ESTATE Lekki-Epe Expressway, Sangotedo,
                                    Lagos, Nigeria</span
                                >
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
                                    <a href="" class="hover:underline"
                                        >Parish</a
                                    >
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
                                    <a href="" class="hover:underline"
                                        >Donate</a
                                    >
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
                            <span class="hover:underline"
                                >Back to the top ↑</span
                            >
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</template>

<script setup>
// import UserLayout from "../../layouts/UserLayout.vue";
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import { route } from "ziggy-js";
defineProps({
    message: String,
});
const currentDate = ref("");

onMounted(() => {
    const date = new Date();
    const day = date.toLocaleString("en-us", { weekday: "short" });
    const dayNumber = date.getDate();
    const month = date.toLocaleString("en-us", { month: "short" });
    const year = date.getFullYear();

    currentDate.value = `${day} ${dayNumber} ${month} ${year}`;
});
</script>

<script>
import EmptyLayout1 from "../../layouts/EmptyLayout1.vue";

export default {
    layout: EmptyLayout1,
};
</script>
