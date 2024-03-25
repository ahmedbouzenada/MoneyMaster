import './bootstrap';
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import Layout from "@/Common/Layout.vue";
import 'bootstrap';
import '@popperjs/core';

createInertiaApp({
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
                return new Intl.NumberFormat('ar-DZ').format(value) + ' DZD'
            },
        }

        app.mount(el);
    },
})


