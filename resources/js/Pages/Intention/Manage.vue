<template>
    <div class="mx-2 md:mx-16">
        <div>
            <div class="bg-white p-5" id="b-mass">
                <div class="container mx-auto mt-3">
                    <p class="text-2xl font-normal">
                        Your mass booking intention has been saved.
                    </p>
                    <p class="text-sm mt-2 text-gray-700">
                        Before we proceed, would you like to book another mass?
                    </p>
                </div>
            </div>
        </div>
        <div id="accordion-collapse">
            <div class="p-2 md:p-16">
                <div
                    v-for="(item, index) in firstAccordionItems"
                    :key="index"
                    class="accordion-item border border-green-500 rounded"
                    :class="{ open: item.open }"
                >
                    <h2 class="accordion-header">
                        <button
                            type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-green-500 focus:ring-4 focus:ring-green-300"
                            @click="toggleFirstAccordion(index)"
                        >
                            <span>{{ item.title }}</span>
                            <svg
                                class="w-3 h-3 transform transition-transform"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                        </button>
                    </h2>
                    <div
                        class="accordion-body p-5 border-t border-gray-200"
                        :class="{ hidden: !item.open }"
                    >
                        <!-- <Create /> -->
                        <form @submit.prevent="submitAdd">
                            <h2 class="mt-5 text-xl font-semibold">
                                INTENTION FOR —————
                            </h2>
                            <div class="mb-3 mt-3">
                                <input
                                    v-model="form.intention_for"
                                    type="text"
                                    class="input"
                                    id="text"
                                    placeholder="Name*"
                                    name="text"
                                />
                                <div v-if="form.errors.intention_for">
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
                                <div v-if="form.errors.intention">
                                    {{ form.errors.intention }}
                                </div>
                            </div>
                            <p class="text-xs mb-7 font-semibold">
                                Select a start and end date for mass intention
                                to be read
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
                                    <div v-if="form.errors.start_date">
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
                                    <div v-if="form.errors.end_date">
                                        {{ form.errors.end_date }}
                                    </div>
                                </div>
                            </div>
                            <label
                                for="start"
                                class="text-xs mb-7 mt-4 font-medium block"
                                >Preferred Sunday Mass and/or Weekday
                                mass</label
                            >
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <input
                                        type="text"
                                        class="input"
                                        placeholder="Select Sunday Mass*"
                                        name="start"
                                    />
                                </div>
                                <div>
                                    <select id="inputState" class="input">
                                        <option>Monday</option>
                                        <option>Tuesday</option>
                                        <option>Wednesday</option>
                                        <option>Thursday</option>
                                        <option>Friday</option>
                                        <option>Saturday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-check mt-3">
                                <label class="flex items-center">
                                    <div class="flex items-center">
                                        <input
                                            id="link-checkbox"
                                            type="checkbox"
                                            value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        />
                                        <label
                                            for="link-checkbox"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            <span class="ml-2 text-green-600"
                                                >Would you be having an open (in
                                                church) thanksgiving</span
                                            ></label
                                        >
                                    </div>
                                </label>
                            </div>
                            <div
                                class="text-center mt-5 flex gap-2 justify-center"
                            >
                                <div>
                                    <button
                                        type="submit"
                                        class="btn hover:bg-green-600 hover:text-white text-gray-700 border border-gray-300 py-2 px-4 rounded-md"
                                    >
                                        Cancel
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
            </div>
            <div class="p-2 md:p-16 mt-9">
                <div
                    v-for="(item, index) in secondAccordionItems"
                    :key="index"
                    class="accordion-item border border-green-500 rounded"
                    :class="{ open: item.open }"
                >
                    <h2 class="accordion-header">
                        <button
                            type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-green-500 focus:ring-4 focus:ring-green-300"
                            @click="toggleSecondAccordion(index)"
                        >
                            <span>{{ item.title }}</span>
                            <svg
                                class="w-3 h-3 transform transition-transform"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                        </button>
                    </h2>
                    <div
                        class="accordion-body p-5 border-t border-gray-200"
                        :class="{ hidden: !item.open }"
                    >
                        <form @submit.prevent="submitEdit">
                            <!-- form fields here -->
                            <div>
                                <!-- Your second accordion content -->
                                <p class="text-gray-950">SUMMARY —————</p>
                                <p class="text-gray-950">Masses Booked —————</p>
                                <div
                                    class="border border-gray-400 max-w-20 h-10 rounded mt-4"
                                >
                                    <p class="p-2">2</p>
                                </div>
                                <p class="mt-3 text-gray-950">
                                    Please check your intention request and edit
                                    where necessary —————
                                </p>
                                <div
                                    class="block md:grid md:grid-cols-2 mt-5 gap-4"
                                >
                                    <div class="">
                                        <p>First Intention</p>
                                        <div class="mb-3 mt-3">
                                            <input
                                                v-model="form.intention_for"
                                                type="text"
                                                class="input"
                                                id="text"
                                                placeholder="Name*"
                                                name="text"
                                            />
                                            <div
                                                v-if="form.errors.intention_for"
                                            >
                                                {{ form.errors.intention_for }}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <textarea
                                                v-model="form.intention"
                                                placeholder="Write your prayer request *"
                                                class="form-control w-full h-52 md:w-2/4 p-2 border border-gray-500 rounded"
                                                id="exampleFormControlTextarea1"
                                                rows="3"
                                            ></textarea>
                                            <div v-if="form.errors.intention">
                                                {{ form.errors.intention }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="text-center mt-5 flex gap-2 justify-center"
                                >
                                    <div>
                                        <button
                                            type="submit"
                                            class="btn hover:bg-green-600 hover:text-white text-gray-700 border border-gray-300 py-2 px-4 rounded-md"
                                        >
                                            Cancel
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
label {
    margin-right: 2em;
}
div {
    padding: 2px;
}
</style>

<script setup>
// import Create from "./Components/Create.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";

const props = defineProps({
    intention: Object,
});

const addForm = useForm({
    name: "",
    email: "",
    phone: "",
    intention_for: "",
    intention: "",
    start_date: "",
    end_date: "",
});

const form = useForm({
    name: props.intention.name,
    email: props.intention.email,
    phone: props.intention.phone,
    intention_for: props.intention.intention_for,
    intention: props.intention.intention,
    start_date: props.intention.start_date,
    end_date: props.intention.end_date,
});

const submitAdd = () =>
    addForm.post(route("intention.storeAdd", { id: props.intention.id }));
const submitEdit = () =>
    editForm.put(route("intention.update", { intention: props.intention.id }));
const firstAccordionItems = ref([{ title: "Yes", open: false }]);

const secondAccordionItems = ref([{ title: "No", open: false }]);

const toggleFirstAccordion = (index) => {
    firstAccordionItems.value = firstAccordionItems.value.map((item, i) => ({
        ...item,
        open: i === index ? !item.open : false,
    }));
};

const toggleSecondAccordion = (index) => {
    secondAccordionItems.value = secondAccordionItems.value.map((item, i) => ({
        ...item,
        open: i === index ? !item.open : false,
    }));
};
</script>
<script defer>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    // components: { Create },
    layout: UserLayout,
};
</script>
