import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import register from '../components/auth/Register'
import role from '../components/view/Role'
import profile from '../components/view/Profile'
const routes = [
    {path:'/',component: profile},
    {path:'/register',component: register},
    {path:'/role',component: role}
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
});

export default router