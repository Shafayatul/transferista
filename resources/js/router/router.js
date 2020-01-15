import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AvailableProjects from '../components/view/AvailableProjects'
import register from '../components/auth/Register'
import role from '../components/view/Role'
import profile from '../components/view/Profile'
import editprofile from '../components/view/EditProfile'
const routes = [
    // {path:'/',component: AvailableProjects},
    // {path:'/profile',component: profile},
    // {path:'/profile/edit',component: editprofile},
    // {path:'/register',component: register},
    // {path:'/role',component: role}
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
});

export default router