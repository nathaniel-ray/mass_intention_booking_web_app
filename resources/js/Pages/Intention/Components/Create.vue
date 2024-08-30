<template>
    <div class="pt-6 px-4 md:p-16">
        <div>
            <h1 class="text-sm md:text-3xl font-medium text-gray-800">
                Please Fill This Form To Book Your Mass
            </h1>
            <p class="mt-2 text-xs md:text-xl text-gray-700">
                Ensure you fill the details correctly to aviod error when
                reading your mass intention.
            </p>
        </div>

        <div class="mt-5">
            <p class="text-sm lg:text-2xl text-gray-950 font-medium">
                YOUR DETAILS —————
            </p>
            <p class="text-xs text-gray-500 mt-3 font-medium">
                Details of the person booking
            </p>
        </div>
        <div class="container mx-auto mt-3">
            <form @submit.prevent="create">
                <div class="mb-3 mt-3">
                    <input
                        v-model="form.name"
                        type="text"
                        class="input"
                        id="text"
                        placeholder="Name*"
                        name="text"
                    />
                    <div v-if="form.errors.name" class="text-red-600">
                        {{ form.errors.name }}
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <input
                            v-model="form.email"
                            type="text"
                            class="input"
                            placeholder="Email*"
                            name="email"
                        />
                        <div v-if="form.errors.email" class="text-red-600">
                            {{ form.errors.email }}
                        </div>
                    </div>
                    <div>
                        <input
                            v-model="form.phone"
                            type="text"
                            class="input"
                            placeholder="Phone Number*"
                            name="text"
                        />
                        <div v-if="form.errors.phone" class="text-red-600">
                            {{ form.errors.phone }}
                        </div>
                    </div>
                </div>
                <h2 class="mt-5 text-xl font-semibold">INTENTION FOR —————</h2>
                <div class="mb-3 mt-3">
                    <input
                        v-model="form.intention_for"
                        type="text"
                        class="input"
                        id="text"
                        placeholder="Name*"
                        name="text"
                    />
                    <div v-if="form.errors.intention_for" class="text-red-600">
                        {{ form.errors.intention_for }}
                    </div>
                </div>
                <div class="mb-3">
                    <textarea
                        v-model="form.intention"
                        placeholder="Write your prayer request *"
                        class="form-control w-full md:w-2/4 md:h-40 p-2 border border-gray-500 rounded"
                        id="exampleFormControlTextarea1"
                        rows="3"
                    ></textarea>
                    <div v-if="form.errors.intention" class="text-red-600">
                        {{ form.errors.intention }}
                    </div>
                </div>
                <p class="text-xs mb-7 font-semibold">
                    Select a start and end date for mass intention to be read
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input
                            v-model="form.start_date"
                            type="date"
                            class="input"
                            placeholder="Start Date*"
                            name="startD"
                        />
                        <div v-if="form.errors.start_date" class="text-red-600">
                            {{ form.errors.start_date }}
                        </div>
                    </div>
                    <div>
                        <input
                            v-model="form.end_date"
                            type="date"
                            class="input"
                            placeholder="End Date*"
                            name="EndD"
                        />
                        <div v-if="form.errors.end_date" class="text-red-600">
                            {{ form.errors.end_date }}
                        </div>
                    </div>
                </div>
                <label for="start" class="text-xs mb-7 mt-4 font-medium block"
                    >Preferred Sunday Mass and/or Weekday mass</label
                >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input
                            v-model="form.sunday_mass"
                            type="text"
                            class="input"
                            placeholder=" e.g 2nd, sunday of the month"
                            name="start"
                        />
                    </div>
                    <div>
                        <input
                            id="inputState"
                            class="input"
                            v-model="form.weekday_mass"
                            placeholder=" monday, tuesday..."
                        />
                    </div>
                </div>
                <div class="form-check mt-3">
                    <label class="flex items-center">
                        <div class="flex items-center">
                            <input
                                id="link-checkbox"
                                type="checkbox"
                                v-model="form.has_open_thanksgiving"
                                value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            />
                            <label
                                for="link-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >
                                <span class="ml-2 text-green-600"
                                    >Would you be having an open (in church)
                                    thanksgiving</span
                                ></label
                            >
                        </div>
                    </label>
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
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";
const form = useForm({
    name: null,
    email: null,
    phone: null,
    intention_for: null,
    intention: null,
    start_date: null,
    end_date: null,
    sunday_mass: null,
    weekday_mass: null,
    has_open_thanksgiving: false, // Add this property
});

const clear = () => {
    form.reset();
};

const create = () => {
    form.post(route("intention.store"));
    form.has_open_thanksgiving = form.has_open_thanksgiving ? "yes" : "no"; // Set the value based on the checkbox state
};
</script>

<script>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
