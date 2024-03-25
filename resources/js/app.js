import './bootstrap';
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import Layout from "@/Common/Layout.vue";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({el, App, props, plugin}) {
        const app = createApp({render: () => h(App, props)})
            .use(plugin)
        app.config.globalProperties.$filters = {
            currency(value) {
                return new Intl.NumberFormat('ar-DZ').format(value) + ' DZD'
            },
            // Put the rest of your filters here
        }

        app.mount(el);
        // .mount(el)
    },
})


