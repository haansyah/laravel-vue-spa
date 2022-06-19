import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// try {
//     require("bootstrap");
// } catch (e) { }

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");
} catch (e) {}

import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./router";
import Toasted from "vue-toasted";

Vue.use(Toasted);

Vue.use(VueRouter);
window.Vue = require("vue").default;

Vue.component("navigation", require("./components/Navigation.vue").default);
Vue.productionTips = false;

const app = new Vue({
    el: "#parsinta",
    router: new VueRouter(routes),
});
