<template>
    <span>
        {{ intention.name }}, {{ intention.email }}, {{ intention.phone }}
        {{ intention.intention_for }}, {{ intention.start_date }}
        {{ intention.end_date }}, {{ intention.intention }}
    </span>
</template>

<script setup>
defineProps({
    intention: Object,
});
</script>

<script>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
