require('./bootstrap');



import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
// import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
    progress:{
        color: '#4B5563'
    }
});

// InertiaProgress.init({ color: '#4B5563' });
