import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link} from '@inertiajs/vue3';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { faGauge, faMoneyBill, faGear, faRightFromBracket, faFaceSmile } from '@fortawesome/free-solid-svg-icons';

library.add(faGauge, faMoneyBill, faGear, faRightFromBracket, faFaceSmile);


import Layout from './Layout/Layout.vue';

createInertiaApp({
  title: (title) => `BudgetBuddy ${title}`,

  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    let page =  pages[`./Pages/${name}.vue`]
    
    if (name === 'Auth/Login') {
      page.default.layout = null;
    } else {
      page.default.layout = page.default.layout || Layout;
    }
    
    return page;
  },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('font-awesome-icon', FontAwesomeIcon)
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