import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AvailableProjects from '../components/view/AvailableProjects'
import ProjectDetails from '../components/view/ProjectDetails'
import google from '../components/googlemap'
import markers from '../components/view/Markers'
import register from '../components/auth/Register'
import login from '../components/auth/Login'
import role from '../components/view/Role'
import profile from '../components/view/Profile'
import ProjectCreate from '../components/view/ProjectCreate'
import UserCustomerForm from '../components/view/UserCustomerForm'
import UserCompanyTransferistaForm from '../components/view/UserCompanyTransferistaForm'
import Employee from '../components/view/EmployeeList'
import Car from '../components/view/CarsList'
import Driver from '../components/view/DriversList'
import show from '../components/view/Show'
import logout from '../components/layers/Logout'
import userInfo from '../components/view/UserInfo'
import CustomerEdit from '../components/view/EditProfile'
import ChangePassword from '../components/view/ChangePassword'
import PaypalData from '../components/view/Paypal'
import MyProjects from '../components/view/MyProjects'
import TransferistaList from '../components/view/TransferistaList'
import BiddedProjects from '../components/view/BiddedProjects'
const routes = [
    {path:'/',component: AvailableProjects,meta: { auth: false, title: 'Project Details' }},
    {path:'/position',component: google},
    {path:'/project-details/:id',component: ProjectDetails,name:'singleProject', meta: { auth: false, title: 'Project Details' }},
    {path:'/project/create',component: ProjectCreate, meta: { auth: false, title: 'Create' }},    
    {path:'/profile',component: profile},
    {path:'/register',component: register},
    {path:'/login',component: login, name: 'login', meta: { auth: false, title: 'Login' }},
    {path:'/logout',component: logout},
    {path:'/role',component: role, name: 'role'},
    {path:'/profile', component: profile,  children:[
        {path:'user',component: userInfo , name: 'userInfo', meta: { auth: true, title: 'User' }},
        {path:'cars',component: Car, meta: { auth: true, title: 'Profile' }},
        {path:'employees',component: Employee, meta: { auth: true, title: 'Profile' }},
        {path:'drivers',component: Driver, meta: { auth: true, title: 'Profile' }},
        {path:'edit-customer',component: CustomerEdit, meta: { auth: true, title: 'Profile' }},
        {path:'credentials',component: ChangePassword, meta: { auth: true, title: 'Profile' }},    
        {path:'positions',component: markers,name:'list', meta: { auth: true, title: 'Profile' }},    
        {path:'projects',component: MyProjects},
        {path:'transferista',component: TransferistaList},
        {path:'bidded-projects',component: BiddedProjects}
    ]},
    {path:'/customer/:role',component: UserCustomerForm, name: 'customer'},
    {path:'/form/:role',component: UserCompanyTransferistaForm, name: 'form'},
    {path:'/show',component: show},
    {path:'/paypal',component: PaypalData},
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history',
});

export default router