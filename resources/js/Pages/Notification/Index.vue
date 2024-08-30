<template>
    <div class="px-4 sm:ml-64">
        <h1 class="text-3xl mb-4">Your Notifications</h1>

        <section
            v-if="notifications.data.length"
            class="tetx-gray-700 dark:text-gray-400"
        >
            <div
                v-for="notification in notifications.data"
                :key="notification.id"
                class="border-b border-gray-200 dark:border-gray-800 py-4 flex justify-between items-center"
            >
                <div>
                    <span
                        v-if="
                            notification.type ===
                            'App\\Notifications\\IntentionMade'
                        "
                    >
                        <span class="font-bold">{{
                            notification.data.name
                        }}</span>
                        booked an intention for

                        <span class="font-bold">{{
                            notification.data.intention_for
                        }}</span
                        >,
                        <Link
                            :href="
                                route('admin.intention.show', {
                                    intention: notification.data.intention_id,
                                })
                            "
                            class="text-green-600"
                            >View.</Link
                        >
                    </span>
                </div>
                <div>
                    <Link
                        :href="
                            route('admin.notification.seen', {
                                notification: notification.id,
                            })
                        "
                        as="button"
                        method="put"
                        v-if="!notification.read_at"
                        class="btn-outline text-xs font-medium uppercase"
                    >
                        Mark as read
                    </Link>
                    <div v-else>✔️</div>
                </div>
            </div>
        </section>

        <EmptyState v-else>No Notifications yet!</EmptyState>

        <section
            v-if="notifications.data.length"
            class="w-full flex justify-center mt-8 mb-8"
        >
            <Pagination :links="notifications.links" />
        </section>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import EmptyState from "@/Components/UI/EmptyState.vue";
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    notifications: Object,
});
</script>
