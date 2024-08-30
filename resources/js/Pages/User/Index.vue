<template>
    <div class="p-6 bg-gray-100">
        <h1 class="text-2xl md:text-3xl mb-4">My Profile</h1>
        <!-- Profile Details Section -->
        <section
            class="py-3 px-4 border border-gray-200 rounded-3xl w-full h-auto bg-white"
        >
            <div class="flex gap-4 items-center">
                <div class="border rounded-full w-32 h-32 overflow-hidden">
                    <!-- Display User Profile Picture -->
                    <img
                        :src="user.images?.[0]?.src ?? '/img/R.jpeg'"
                        alt="Profile Picture"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="ml-8">
                    <div class="mb-4 text-4xl font-bold">{{ user.name }}</div>
                    <div class="mb-4 px-2 text-sm text-gray-400">
                        Email: {{ user.email }}
                    </div>
                    <div class="mb-4 px-2 text-sm text-gray-400">
                        Phone number: 09011336759
                    </div>
                    <!-- Admin Button Visible Only for Admins -->
                    <div class="flex gap-2">
                        <Link
                            v-if="canViewAdmin"
                            :href="route('admin.user.index')"
                            class="border w-auto p-2 text-center mb-2 mt-3 bg-green-500 rounded-md text-white cursor-pointer hover:bg-green-600 hover:shadow-md"
                        >
                            Admin
                        </Link>
                        <div
                            class="border w-32 p-2 text-center mb-2 mt-3 border-green-500 bg-white rounded-md text-green-500 cursor-pointer hover:text-white hover:bg-green-600 hover:shadow-md"
                        >
                            <Link
                                :href="
                                    route('user.user.image.create', {
                                        user: user.id,
                                    })
                                "
                                >Change Image
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Intentions Section -->
        <section
            class="mt-8 w-full h-auto py-3 px-4 border border-gray-200 rounded-3xl bg-white"
        >
            <div class="text-4xl font-semibold py-6 px-4">
                Your Intentions Made
            </div>
            <div class="text-sm font-semibold py-1 px-2 pb-2">
                Please make necessary edits and deletes, the buttons disable
                after 24hrs
            </div>
            <!-- <UserFilters /> -->
            <div v-if="intentions.data.length === 0" class="text-center py-6">
                <div class="text-2xl">
                    No intentions made yet, click on the link to
                    <Link
                        :href="route('intention.create')"
                        class="text-green-500 underline"
                        >book your intention</Link
                    >.
                </div>
            </div>
            <div v-else>
                <Box
                    v-for="intention in intentions.data"
                    :key="intention.id"
                    class="border-b pb-4 mb-4"
                >
                    <div class="text-xs lg:text-lg">
                        You booked an intention for
                        <span class="font-bold text-black">{{
                            intention.intention_for
                        }}</span>
                        on {{ formatDate(intention.created_at) }}
                    </div>
                    <div class="pt-1 text-xs lg:text-lg">
                        The details of the intentions are;
                    </div>
                    <div
                        class="font-light italic text-xs md:text-lg text-black pt-1"
                    >
                        {{ intention.intention }}
                    </div>
                    <div class="flex gap-3 pt-2">
                        <div class="text-xs lg:text-base">
                            <span class="text-black font-bold">From:</span>
                            {{ intention.start_date }}
                        </div>
                        <div class="text-xs lg:text-base">
                            <span class="text-black font-bold">To:</span>
                            {{ intention.end_date }}
                        </div>
                    </div>
                    <div class="flex gap-5 py-1">
                        <div class="text-xs lg:text-base">
                            Preferred weekday mass:
                            <span class="text-black font-bold">{{
                                intention.weekday_mass
                            }}</span>
                        </div>
                        <div class="text-xs lg:text-base">
                            Preferred Sunday mass:
                            <span class="text-black font-bold">{{
                                intention.sunday_mass
                            }}</span>
                        </div>
                    </div>
                    <div class="text-xs lg:text-base">Thanksgiving:</div>
                    <div class="flex gap-3 justify-end items-center mt-auto">
                        <Link
                            :href="
                                route('intention.edit', {
                                    intention: intention.id,
                                })
                            "
                            as="button"
                            :class="[
                                'border py-2 px-3 text-sm rounded-3xl w-auto h-auto flex gap-2',
                                canEdit(intention)
                                    ? 'bg-green-400 hover:bg-green-600 cursor-pointer'
                                    : 'bg-green-300 cursor-not-allowed opacity-50',
                            ]"
                            :disabled="!canEdit(intention)"
                        >
                            <i class="fa-solid fa-pencil"></i> Edit
                        </Link>

                        <Link
                            :href="
                                route('intention.destroy', {
                                    intention: intention.id,
                                })
                            "
                            method="delete"
                            as="button"
                            :class="[
                                'border py-2 px-3 text-sm rounded-2xl w-auto h-auto flex gap-2',
                                canDelete(intention)
                                    ? 'bg-red-600 hover:bg-red-700 text-white cursor-pointer'
                                    : 'bg-red-200 cursor-not-allowed opacity-50',
                            ]"
                            :disabled="!canDelete(intention)"
                        >
                            <i class="fa-regular fa-trash-can"></i> Delete
                        </Link>
                    </div>
                </Box>
            </div>

            <div
                v-if="intentions.data.length"
                class="w-full flex justify-center mt-8 mb-8 col-span-2"
            >
                <Pagination :links="intentions.links" />
            </div>
        </section>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { route } from "ziggy-js";
import Box from "../../Components/UI/Box.vue";
import UserFilters from "./Index/Components/UserFilters.vue";
import Pagination from "../../Components/UI/Pagination.vue";

const props = defineProps({ user: Object, intentions: Object });

const page = usePage();
const user = computed(() => page.props.user);
const canViewAdmin = computed(() => page.props.user.is_admin);

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toDateString();
}

const canEdit = (intention) => {
    const createdAt = new Date(intention.created_at);
    const now = new Date();
    const timeDiff = now - createdAt;
    const twentyFourHours = 24 * 60 * 60 * 1000; // 24 hours in milliseconds
    return timeDiff < twentyFourHours;
};

const canDelete = (intention) => {
    return canEdit(intention);
};
</script>

<script>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
