import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import LoginPage from '../components/pages/auth/LoginPage.vue';
import RegisterPage from '../components/pages/auth/RegisterPage.vue';
import LandingPage from '../components/pages/LandingPage.vue';
import AdminHome from '../components/pages/admin/AdminHome.vue';

let router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/login', component: LoginPage, name: 'login' },
    { path: '/login/professor', component: LoginPage, name: 'login' },
    { path: '/login/student', component: LoginPage, name: 'login' },
    { path: '/register/professor', component: RegisterPage, name: 'register' },
    { path: '/register/student', component: RegisterPage, name: 'register' },
    { path: '/', component: LandingPage, name: 'landing' },
    { path: '/professor',  component: AdminHome, name: 'professor' },
  ],
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  } 
});

export default router;