require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Toaster from '@meforma/vue-toaster';

//import {VueTailwind} from 'vue-tailwind';

const el = document.getElementById('app');

// createApp.use(VueTailwind,settings)

createApp({
    render: () =>
      h(InertiaApp, {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: (name) => require(`./Pages/${name}`).default,
      }),
  })
  .mixin({ methods: { route } })
  .use(InertiaPlugin)
  .use(Toaster)
  .mount(el);

InertiaProgress.init({ color: '#4B5563' });