import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import AdminLayout from "./layouts/AdminLayout.vue";
import { ZiggyVue } from "ziggy-js";
import "../css/app.css";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || AdminLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});
