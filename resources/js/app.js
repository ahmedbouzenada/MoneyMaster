import './bootstrap';
import '../css/app.css';
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import 'bootstrap';
import '@popperjs/core';
import Layout from "@/Components/Shared/Layout.vue";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout ??= Layout
        return page
    },
    setup({el, App, props, plugin}) {
        const app = createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
        app.config.globalProperties.$filters = {
            currency(value) {
                return 'DZD ' + new Intl.NumberFormat('ar-DZ').format(value);
            },
        }
        app.mount(el);
    },
    progress: {
        delay: 250,
        color: 'red',
        includeCSS: true,
        showSpinner: false,
    },
});
