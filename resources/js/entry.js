import Vue from 'vue';
import Vuex from 'vuex';
import VueI18n from 'vue-i18n';

import MediaManager from './components/media-manager.vue';
import AppStore from './store/store';

Vue.use(Vuex);
Vue.use(VueI18n);

const store = new Vuex.Store(AppStore);

new Vue({
  el: '#media-manager',
  store,
  render: (h) => h(MediaManager)
});