import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import AOS from "aos";
import "aos/dist/aos.css";
import VueScrollTo from "vue-scrollto";
import "../css/app.css";

// ✅ Tambahan: import Ziggy
import { ZiggyVue } from "ziggy-js"; // Ziggy helper
import { Ziggy } from "./ziggy"; // File Ziggy route (nanti digenerate)

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },

    setup({ el, App, props, plugin }) {
        const app = createApp({
            render: () => h("div", { id: "transition-wrapper" }, h(App, props)),
        });

        app.use(plugin);
        app.use(VueScrollTo);
        app.use(ZiggyVue, Ziggy);

        app.mount(el);

        AOS.init({
            duration: 800,
            once: true,
            easing: "ease-out-cubic",
            offset: 60,
        });
    },
});
