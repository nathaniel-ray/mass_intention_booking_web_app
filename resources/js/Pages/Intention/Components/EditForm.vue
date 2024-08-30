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
                <button type="submit">Update Intention</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive } from "vue";
import { usePage } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const { props } = usePage();
const form = useForm({
    name: props.intention.name,
    email: props.intention.email,
    phone: props.intention.phone,
    intention_for: props.intention.intention_for,
    intention: props.intention.intention,
    start_date: props.intention.start_date,
    end_date: props.intention.end_date,
});

const submit = () => {
    form.put(`/intentions/${props.intention.id}`);
};
</script>
<script>
import UserLayout from "@/layouts/UserLayout.vue";

export default {
    layout: UserLayout,
};
</script>
