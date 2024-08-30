<template>
    <div>
        <nav
            :class="[
                'bg-white p-2 fixed top-0 w-full transition-opacity duration-300 z-20',
                { 'opacity-100': showNav, 'opacity-0': !showNav },
            ]"
        >
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <a
                        :href="route('intention.home')"
                        class="flex items-center"
                    >
                        <img
                            src="/img/logo.png"
                            alt="Logo"
                            class="inline-block w-8 h-8 md:w-16 md:h-16"
                        />
                    </a>
                    <button class="text-gray-500 focus:outline-none md:hidden">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div v-if="user" class="flex items-center">
                        <Link class="relative flex items-center space-x-3">
                            <div
                                @mouseover="isDropdownOpen = true"
                                @mouseleave="isDropdownOpen = false"
                                class="flex items-center space-x-2 cursor-pointer"
                            >
                                <div class="flex items-center">
                                    <img
                                        :src="
                                            user.images?.[0]?.src ??
                                            '/img/R.jpeg'
                                        "
                                        alt="Profile Picture"
                                        class="w-7 h-7 rounded-full object-cover"
                                    />
                                    <Link :href="route('user.account.index')">
                                        <div
                                            v-if="user"
                                            class="text-secondary text-xs md:text-base p-1"
                                        >
                                            {{ user.name }}
                                        </div>
                                    </Link>
                                </div>
                            </div>
                            <div
                                v-if="isDropdownOpen"
                                class="absolute right-0 mt-16 w-18 bg-white border rounded-lg shadow-lg p-1 z-20"
                            >
                                <p class="text-gray-700 text-center">
                                    My profile
                                </p>
                            </div>
                        </Link>
                        <Link
                            class="p-2 text-secondary text-xs md:text-base bg-green-700 rounded-lg text-white ml-2 md:px-3 md:mx-3 cursor-pointer hover:bg-green-600"
                            :href="route('logout')"
                            method="delete"
                            as="button"
                        >
                            Logout
                        </Link>
                    </div>
                    <div v-else class="flex gap-2">
                        <div
                            class="mt-2 py-3 px-4 text-white border border-green-700 cursor-pointer bg-green-700 rounded-lg"
                        >
                            <Link :href="route('register')">Sign-up</Link>
                        </div>
                        <div
                            class="mt-2 py-3 px-4 text-green-700 hover:border-green-800 cursor-pointer border border-green-700 rounded-lg"
                        >
                            <Link :href="route('login')">Login</Link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div>
            <Alert v-if="showAlert" :message="alertMessage" :duration="5000" />
            <!-- Other content -->
        </div>
        <slot></slot>
    </div>
</template>

<script setup>
import Alert from "../Components/Alert.vue";
import { ref, onMounted, onUnmounted, computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";

//slide in navbar
const page = usePage();
const user = computed(() => page.props.user);

const showNav = ref(false);
const isDropdownOpen = ref(false);

const handleScroll = () => {
    showNav.value = window.scrollY > 50; // Show navbar after scrolling 50px
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});

// alert
const alertMessage = ref("");
const showAlert = ref(false);

const showNotification = (message) => {
    console.log("Showing notification:", message);
    alertMessage.value = message;
    showAlert.value = true;
    setTimeout(() => {
        showAlert.value = false;
    }, 5000); // Match the duration
};

// Handle Inertia messages
if (page.props.flash.success) {
    showNotification(page.props.flash.success);
}
</script>

<style scoped>
.opacity-0 {
    opacity: 0;
}

.opacity-100 {
    opacity: 1;
}
</style>

<!-- info about this code -->
<!--This is a Vue.js component written in a single file component (SFC) format. It's a navigation bar component that includes a logo, navigation links, and a dropdown menu for the user. Here's a breakdown of the code:

Template

The template section defines the HTML structure of the component. It consists of a nav element with a fixed position at the top of the page. The navigation bar has a logo, a button to toggle the navigation menu on mobile devices, and a dropdown menu for the user.

The dropdown menu is only visible when the user object is present, which is retrieved from the page.props object using the usePage hook from @inertiajs/vue3. The menu displays the user's name, email, and a "Logout" button.

If the user object is not present, the component displays "Sign-up" and "Login" buttons instead.

Script

The script section defines the component's logic using Vue's Composition API.

Variables and Computed Properties

page: an object retrieved from usePage() that provides access to the current page's props.
user: a computed property that returns the user object from page.props.
showNav: a ref that determines whether the navigation bar should be visible (opacity 1) or hidden (opacity 0).
isDropdownOpen: a ref that determines whether the dropdown menu should be visible or not.
alertMessage: a ref that stores the message to be displayed in the alert component.
showAlert: a ref that determines whether the alert component should be visible or not.
Lifecycle Hooks

onMounted: adds an event listener to the window object to listen for scroll events. When the user scrolls more than 50px, the showNav ref is set to true, making the navigation bar visible.
onUnmounted: removes the event listener when the component is unmounted.
Functions

handleScroll: updates the showNav ref based on the scroll position.
showNotification: displays an alert message with a duration of 5000ms (5 seconds).
Inertia.js Integration

The component uses Inertia.js to handle page props and flash messages. When the component is mounted, it checks if there's a success flash message and displays it using the showNotification function.

Styles

The styles section defines two CSS classes: .opacity-0 and .opacity-100, which are used to toggle the visibility of the navigation bar.

Overall, this component provides a navigation bar with a dropdown menu for the user, and integrates with Inertia.js to handle page props and flash messages  -->
