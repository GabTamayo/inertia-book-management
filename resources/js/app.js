import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import '../css/app.css';
import Layout from './Layout.vue';
import { Modal, ModalLink, renderApp } from '@inertiaui/modal-vue'

import { OhVueIcon, addIcons } from "oh-vue-icons";
import { HiMenu, BiSearch, BiPlus } from "oh-vue-icons/icons";

addIcons(HiMenu, BiSearch, BiPlus);

createInertiaApp({
    progress: {
        delay: 250,

        color: '#29d',

        includeCSS: true,

        showSpinner: false,
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: renderApp(App, props) })
            .use(plugin)
            .component('Modal', Modal)
            .component('ModalLink', ModalLink)
            .component("Link", Link)
            .component('v-icon', OhVueIcon)
            .mount(el)
    },
})
