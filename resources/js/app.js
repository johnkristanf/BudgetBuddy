import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import Layout from './Layout/Layout.vue';

createInertiaApp({
  title: (title) => `BudgetBuddy ${title}`,

  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    let page =  pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout
    return page;
  },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Head', Head)
      .component('Link', Link)
      .mount(el)

  },

  progress: {
    color: 'blue',
    includeCSS: true,
    showSpinner: true,
  },
})