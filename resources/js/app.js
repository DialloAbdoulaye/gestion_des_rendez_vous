/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import TodayComponent from "./components/TodayComponent";

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
Vue.component('pagination', require('laravel-vue-pagination'));

import Content from "./components/ContentComponent";
import Example from "./components/CreateComponent";

const routes = [
    { path: '/content', component: Content },
    { path: '/example', component: Example },
    { path: '/today', component: TodayComponent }
]

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/CreateComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('menu-component', require('./components/MenuComponent.vue').default);
Vue.component('footer-component',require('./components/FooterComponent').default);

const router = new VueRouter({
    routes:routes
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
