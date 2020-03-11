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
import AcceptedBids from '../components/view/AcceptedBids'
import DriverProject from '../components/view/Driver'
import SingleProject from '../components/view/SingleProject'
import review from '../components/view/rating/MyReview'
import reviewed from '../components/view/rating/Review'
import test from '../components/view/test'
import reset from '../components/view/ForgotPassword'
import NewPassword from '../components/view/Reset'
import TransferistaInfo from '../components/view/TransferistaDetails'
const routes = [
    { path: '/',redirect: '/home' },
    {path:'/home',component: AvailableProjects,name: 'home' ,meta: { auth: false, title: 'Home' }},
    // {path:'/position',component: google},
    {path:'/project-details/:id',component: ProjectDetails,name:'singleProject', meta: { auth: false, title: 'Project Details' }},
    {path:'/project/create',component: ProjectCreate,name:'create', meta: { auth: false, title: 'Create' }},    
    {path:'/profile',component: profile},
    {path:'/register',component: register, name: 'register', meta: { auth: false, title: 'Login' }},
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
        // {path:'positions',component: markers,name:'list', meta: { auth: true, title: 'Profile' }},    
        {path:'projects',component: MyProjects},
        {path:'transferista',component: TransferistaList},
        {path:'bidded-projects',component: BiddedProjects},
        {path:'accepted-projects',component: AcceptedBids},
        {path:'my-projects',component: DriverProject}
    ]},
    
    {path:'/customer/:role',component: UserCustomerForm, name: 'customer', meta: { auth: true, title: 'User Information' }},
    {path:'/driver/project/:id',component: SingleProject, name: 'driver'},
    {path:'/form/:role',component: UserCompanyTransferistaForm, name: 'form', meta: { auth: true, title: 'User Information' }},
    {path:'/review',component: review},
    {path:'/reviewed',component: reviewed},
    {path:'/show',component: show},
    {path:'/forgot-password',component: reset},
    {path:'/paypal',component: PaypalData},
    {path:'/test',component: test},
    {path:'/reset-password/:token',component: NewPassword},
    {path:'/transferista-info/:id',component: TransferistaInfo,name: 'transferista'},
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history',
});

// router.beforeResolve((to, from, next) => {
//     // If this isn't an initial page load.
//     if (to.name) {
//         // Start the route progress bar.
//         NProgress.start()
//     }
//     next()
//   })
  
//   router.afterEach((to, from) => {
//     // Complete the animation of the route progress bar.
//     NProgress.done()
//   })
  

export default router