
require('./bootstrap');
import Vue from 'vue';
import App from "./app/App";
import router, { routes } from './app/routes';
import VueRouter from 'vue-router';
import { store } from './app/store'
import 'es6-promise/auto'
import axios from 'axios'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import auth from './app/auth'


window.Vue = Vue
// Set Vue router
Vue.router = router

Vue.use(VueRouter)

// Set Vue authentication
Vue.use(VueAxios, axios)

axios.defaults.baseURL = '${process.env.MIX_APP_URL}/api/'
Vue.use(VueAuth, auth)

// Load Default
Vue.component('app', App)
const app = new Vue({
    el: '#app',
   router
});
