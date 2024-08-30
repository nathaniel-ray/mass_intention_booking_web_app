<template>
    <Edit :intention="intention" />
</template>

<script setup>
import Edit from "../User/Edit.vue";
const props = defineProps({
    intention: Object,
});
</script>

<script>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
