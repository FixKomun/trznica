require("./bootstrap");

window.Vue = require("vue").default;

import iView from "iview";
import "iview/dist/styles/iview.css";
import Vue from "vue";
import router from "./router";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import VueTelInput from "vue-tel-input";
import "vue-tel-input/dist/vue-tel-input.css";
import common from "./common";
import store from "./store";

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(iView);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueTelInput);
Vue.mixin(common);

Vue.component("App", require("./App.vue").default);

const app = new Vue({
    el: "#app",
    router: router,
    store: store,
});
