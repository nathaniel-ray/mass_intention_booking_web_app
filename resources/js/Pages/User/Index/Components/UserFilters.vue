<template>
    <form>
        <div class="mb-4 mt-4 flex flex-wrap gap-4">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    v-model="filterForm.deleted"
                    type="checkbox"
                    id="deleted"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="deleted">Deleted</label>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { route } from "ziggy-js";
import { debounce } from "lodash";

const filterForm = reactive({
    deleted: false,
});

// Create a debounced version of the Inertia.get call
const debouncedInertiaGet = debounce((filterForm) => {
    Inertia.get(route("user.account.index"), filterForm, {
        preserveScroll: true,
        preserveState: true,
    });
}, 1000); // Adjust the delay as needed

// Use a getter function for the watch source
watch(
    () => filterForm.deleted,
    (newVal) => {
        console.log("filterForm.deleted changed:", newVal); // Debugging log
        debouncedInertiaGet(filterForm);
    }
);
</script>
