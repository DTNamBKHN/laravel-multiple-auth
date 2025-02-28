
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');
import "core-js/fn/object/assign";
import Vue from 'vue';
import vuetify from '../../plugins/vuetify'
import router from './router'
import store from './store';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from '../components/App.vue'

const app = new Vue({
  vuetify,
  router,
  store,
  render: h => h(App),
  el: '#app',
});
