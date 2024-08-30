<template>
    <div>
        Your details
        <IntentionDetails :intention="intention" />
    </div>
</template>

<script setup>
import IntentionDetails from "../../Components/IntentionDetails.vue";
defineProps({
    intention: Object,
});
</script>

<script>
import AdminLayout from "@/layouts/AdminLayout.vue";

export default {
    layout: AdminLayout,
};
</script>
