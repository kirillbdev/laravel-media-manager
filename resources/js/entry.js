import Vue from 'vue';
import Vuex from 'vuex';
import VueI18n from 'vue-i18n';

import App from './components/app.vue';

Vue.use(Vuex);
Vue.use(VueI18n);

const store = new Vuex.Store({
  state: {}
});

new Vue({
  el: '#media-manager',
  store,
  render: (h) => h(App)
});