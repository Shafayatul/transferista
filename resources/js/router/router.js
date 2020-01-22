import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AvailableProjects from '../components/view/AvailableProjects'
<<<<<<< HEAD
import ProjectDetails from '../components/view/ProjectDetails'
import google from '../components/googlemap'
=======
>>>>>>> 9c41e962446b05c480e6f0093ea34b538b4f5f49
import register from '../components/auth/Register'
import role from '../components/view/Role'
import profile from '../components/view/Profile'
import editprofile from '../components/view/EditProfile'
import ProjectCreate from '../components/view/ProjectCreate'
const routes = [
    {path:'/',component: AvailableProjects},
<<<<<<< HEAD
    {path:'/position',component: google},
    {path:'/project_details',component: ProjectDetails},
=======
>>>>>>> 9c41e962446b05c480e6f0093ea34b538b4f5f49
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