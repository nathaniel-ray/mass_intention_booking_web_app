<template>
    <div>Show</div>
    <Link href="/">Main Page</Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<script>
import UserLayout from "../../layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
