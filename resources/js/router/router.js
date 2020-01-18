import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AvailableProjects from '../components/view/AvailableProjects'
import googlemap from '../components/googlemap.vue'
import register from '../components/auth/Register'
import role from '../components/view/Role'
import profile from '../components/view/Profile'
import editprofile from '../components/view/EditProfile'
import ProjectCreate from '../components/view/ProjectCreate'
const routes = [
    {path:'/',component: AvailableProjects},
    {path:'/google',component: googlemap},
    {path:'/project/create',component: ProjectCreate},    
    {path:'/profile',component: profile},
    {path:'/profile/edit',component: editprofile},
    {path:'/register',component: register},
    {path:'/role',component: role}
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
});

export default router