import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.es'
import { modal } from 'momentum-modal'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import toast from './plugins/toast';

const appName = import.meta.env.VITE_APP_NAME

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(toast)
        .use(modal, {
            resolve: (name) => resolvePageComponent(`./Modals/${name}.vue`, import.meta.glob(`./Modals/**/*.vue`))
        })
        .use(ZiggyVue, Ziggy)
        .mount(el)
    },
})
