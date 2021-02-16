import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import locale from "element-ui/lib/locale/lang/en";

import http from "./lib/http-common";
import { api } from "./utils/api";
Vue.prototype.http = http;
Vue.prototype.api = api;

Vue.use(ElementUI, { locale });
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
