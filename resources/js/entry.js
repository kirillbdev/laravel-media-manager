import Vue from 'vue';
import Vuex from 'vuex';
import VueI18n from 'vue-i18n';

import MediaManager from './components/media-manager.vue';
import Store from './store/index';

Vue.use(Vuex);
Vue.use(VueI18n);

const store = new Vuex.Store(Store);

window.MediaManager = {
  init (el) {
    return new Vue({
      el: `#${el}`,
      store,
      render: (h) => h(MediaManager)
    });
  }
};

