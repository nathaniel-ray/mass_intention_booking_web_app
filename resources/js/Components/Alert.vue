<template>
    <transition name="slide-right">
        <div
            v-if="visible"
            class="fixed top-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg w-64 z-50"
        >
            <div class="flex justify-between items-center">
                <p>{{ message }}</p>
                <button @click="closeAlert" class="text-white">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="h-1 bg-gray-300 mt-2">
                <div
                    class="h-full bg-white"
                    :style="{ width: `${progress}%` }"
                ></div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { ref, onMounted, watchEffect } from "vue";

const props = defineProps({
    message: String,
    duration: {
        type: Number,
        default: 5000,
    },
});

const visible = ref(false);
const progress = ref(100);

let intervalId;
let timeoutId;

const startTimer = () => {
    visible.value = true;
    progress.value = 100;

    intervalId = setInterval(() => {
        progress.value -= 100 / (props.duration / 100);
        if (progress.value <= 0) {
            clearInterval(intervalId);
            visible.value = false;
        }
    }, 100);

    timeoutId = setTimeout(() => {
        clearInterval(intervalId);
        visible.value = false;
    }, props.duration);
};

const closeAlert = () => {
    clearTimeout(timeoutId);
    clearInterval(intervalId);
    visible.value = false;
};

watchEffect(() => {
    if (props.message) {
        startTimer();
    }
});
</script>

<style scoped>
.slide-right-enter-active,
.slide-right-leave-active {
    transition: all 0.3s ease;
}
.slide-right-enter-from,
.slide-right-leave-to {
    transform: translateX(100%);
    opacity: 0;
}
</style>

<!-- info about this component -->

<!-- The template section defines the HTML structure of the component. It uses a transition element to animate the notification when it appears and disappears. The notification is only visible when the visible property is true. -->

<!-- The component defines two properties:

message: a string that represents the text to be displayed in the notification.
duration: a number that represents the duration (in milliseconds) for which the notification should be displayed. It defaults to 5000 (5 seconds). -->

<!-- State

The component defines two state variables:

visible: a boolean that indicates whether the notification is visible or not.
progress: a number that represents the progress of the notification (i.e., the width of the progress bar). -->

<!-- Lifecycle Hooks

The component uses two lifecycle hooks:

onMounted: not used in this example.
watchEffect: watches the message property and starts the timer when it changes. -->

<!-- Methods

The component defines three methods:

startTimer: starts the timer and sets the visible property to true. It also sets up an interval to 
decrease the progress value every 100 milliseconds.

closeAlert: clears the timeout and interval, and sets the visible property to false.

clearInterval and clearTimeout: used to clear the interval and timeout, respectively. -->
