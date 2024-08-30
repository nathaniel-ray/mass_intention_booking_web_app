<template>
    <div class="mx-2 md:mx-16">
        <div id="accordion-collapse">
            <div class="p-2 md:p-16">
                <div
                    class="accordion-item border border-green-500 rounded"
                    :class="{ open: addOpen }"
                >
                    <h2 class="accordion-header">
                        <button
                            type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-green-500 focus:ring-4 focus:ring-green-300"
                            @click="toggleAdd"
                        >
                            <span>Add Intention</span>
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
                        :class="{ hidden: !addOpen }"
                    >
                        <form @submit.prevent="submitAdd">
                            <!-- form fields here -->
                            <div class="mt-4">
                                <button
                                    type="submit"
                                    class="btn bg-green-500 text-white px-4 py-2 rounded"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="p-2 md:p-16 mt-9">
                <div
                    class="accordion-item border border-green-500 rounded"
                    :class="{ open: editOpen }"
                >
                    <h2 class="accordion-header">
                        <button
                            type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-green-500 focus:ring-4 focus:ring-green-300"
                            @click="toggleEdit"
                        >
                            <span>Edit Intention</span>
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
                        :class="{ hidden: !editOpen }"
                    >
                        <form @submit.prevent="submitEdit">
                            <!-- form fields here -->
                            <div class="mt-4">
                                <button
                                    type="submit"
                                    class="btn bg-green-500 text-white px-4 py-2 rounded"
                                >
                                    Edit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    intention: Object,
});

const addOpen = ref(false);
const editOpen = ref(false);

const toggleAdd = () => (addOpen.value = !addOpen.value);
const toggleEdit = () => (editOpen.value = !editOpen.value);

const addForm = useForm({
    name: "",
    email: "",
    phone: "",
    intention_for: "",
    intention: "",
    start_date: "",
    end_date: "",
});

const editForm = useForm({
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
</script>
