<template>
    <div v-for="intention in intentions.data" :key="intention.id">
        <div>
            <Link :href="route('intention.show', { intention: intention.id })">
                <IntentionDetails :intention="intention" />
            </Link>
        </div>
        <div>
            <Link :href="route('intention.edit', { intention: intention.id })"
                >Edit</Link
            >
        </div>
        <div>
            <Link
                :href="route('intention.destroy', { intention: intention.id })"
                method="delete"
                as="button"
                >Delete</Link
            >
        </div>
    </div>
    <div
        v-if="intentions.data.length"
        class="w-full flex justify-center mt-8 mb-8"
    >
        <Pagination :links="intentions.links" />
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import IntentionDetails from "@/Components/IntentionDetails.vue";
import Pagination from "../../Components/UI/Pagination.vue";

defineProps({
    intentions: Object,
});
</script>
<script>
import AdminLayout from "@/layouts/AdminLayout.vue";

export default {
    layout: AdminLayout,
};
</script>
