<template>
    <form @submit.prevent="submit">
        <div>
            <div>
                <label>Name</label>
                <input v-model="form.name" type="text" />
            </div>
            <div>
                <label>Email</label>
                <input v-model="form.email" type="email" />
            </div>
            <div>
                <label>Phone</label>
                <input v-model="form.phone" type="text" />
            </div>
            <div>
                <label>Intention For</label>
                <input v-model="form.intention_for" type="text" />
            </div>
            <div>
                <label>Intention</label>
                <input v-model="form.intention" type="text" />
            </div>
            <div>
                <label>Start Date</label>
                <input v-model="form.start_date" type="date" />
            </div>
            <div>
                <label>End Date</label>
                <input v-model="form.end_date" type="date" />
            </div>
            <div>
                <button type="submit">Add Intention</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    email: null,
    phone: null,
    intention_for: null,
    intention: null,
    start_date: null,
    end_date: null,
});

const submit = () => {
    form.post("/intentions");
};
</script>
<script>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
