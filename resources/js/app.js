import './bootstrap';
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import Layout from "@/Shared/Layout.vue";
import 'bootstrap';
import '@popperjs/core';

createInertiaApp({
    progress: {
        delay: 250,
        color: 'red',
        includeCSS: true,
        showSpinner: false,
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({el, App, props, plugin}) {
        const app = createApp({render: () => h(App, props)})
            // .component('inertia-link', Link)
            .use(plugin)
        app.config.globalProperties.$filters = {
            currency(value) {
                return 'DZD ' + new Intl.NumberFormat('ar-DZ').format(value);
            },
        }
        app.mount(el);
    },
})

