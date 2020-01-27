import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AvailableProjects from '../components/view/AvailableProjects'
import ProjectDetails from '../components/view/ProjectDetails'
import google from '../components/googlemap'
import register from '../components/auth/Register'
import login from '../components/auth/Login'
import role from '../components/view/Role'
import profile from '../components/view/Profile'
import editprofile from '../components/view/EditProfile'
import ProjectCreate from '../components/view/ProjectCreate'
import UserCustomerForm from '../components/view/UserCustomerForm'
import UserCompanyTransferistaForm from '../components/view/UserCompanyTransferistaForm'
import Employee from '../components/view/EmployeeList'
import Car from '../components/view/CarsList'
import Driver from '../components/view/DriversList'
import show from '../components/view/Show'
const routes = [
    {path:'/',component: AvailableProjects},
    {path:'/position',component: google},
    {path:'/project_details',component: ProjectDetails},
    {path:'/project/create',component: ProjectCreate},    
    {path:'/profile',component: profile},
    {path:'/profile/edit',component: editprofile},
    {path:'/register',component: register},
    {path:'/login',component: login, name: 'login'},
    {path:'/role',component: role, name: 'role'},
    {path:'/profile', component: profile ,children:[
        {path:'',component: userInfo},
        {path:'cars',component: Car},
        {path:'employees',component: Employee},
        {path:'drivers',component: Driver},
    ]},
    {path:'/customer/:role',component: UserCustomerForm, name: 'customer'},
    {path:'/form/:role',component: UserCompanyTransferistaForm, name: 'form'},
    {path:'/employee',component: Employee, name: 'employee'},
    {path:'/show',component: show},
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
});

export default router