<template>
<!-- Navbar -->
    <nav class="navbar navbar-expand-md  navbar-light">
        <div class="container">
            
            <router-link to="/" class="navbar-brand">
                <img :src="'/img/TransferistaC22b-A00aT03a-Z.png'">
            </router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                
                </ul>
                
                
                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons"> 
                    <!-- <li class="nav-item dropdown dropper">
                        <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell">Notifications</i>
                        </a>
                        <ul class="dropdown-menu Notifications">
                            <li class="head text-light bg-dark">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <a href="" class="text-light mr-1">Notifications (3)</a>
                                        <a href="" class="float-right text-light">Mark all as read</a>
                                    </div>
                                </div>
                            </li>
                            <li class="notification-box">
                            <div class="row">
                                <div class="col-lg-3 col-sm-3 col-3 text-center">
                                    <img src="img/avatar-1.png" class="w-50 rounded-circle">
                                </div>    
                                <div class="col-lg-8 col-sm-8 col-8">
                                    <strong class="text-info">David John</strong>
                                    <div>
                                        Lorem ipsum dolor sit amet, consectetur
                                    </div>
                                    <small class="text-warning">27.11.2015, 15:00</small>
                                </div>    
                            </div>
                            </li>
                            <li class="notification-box bg-gray">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        <img src="img/avatar-1.png" class="w-50 rounded-circle">
                                    </div>    
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <strong class="text-info">David John</strong>
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur
                                        </div>
                                        <small class="text-warning">27.11.2015, 15:00</small>
                                    </div>    
                                </div>
                            </li>
                            <li class="notification-box">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                    <img src="img/avatar-1.png" class="w-50 rounded-circle">
                                    </div>    
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <strong class="text-info">David John</strong>
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur
                                        </div>
                                        <small class="text-warning">27.11.2015, 15:00</small>
                                    </div>    
                                </div>
                            </li>
                            <li class="drop-footer bg-dark text-center">
                                <a href="" class="text-light">View All</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li>{{process.env.MIX_APP_NAME}}</li> -->

                    <li class="dropdown  nav-item">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="true">
                        <img alt="image" :src="'/img/avatar-1.png'" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{name}}</div></a>
                        <div class="dropdown-menu dropdown-menu-right ">
                            <!-- <div class="dropdown-title">
                                Logged in 5 min ago
                            </div> -->
                            <router-link v-for="item in items" :key="item.title" :to="item.to" v-show="item.show">
                                <a href="#" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> {{item.title}}
                                </a>
                                
                            </router-link>
<!--                             
                                <button @click="loggedout" href="#" v-if="logout" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Log-out
                                </button> -->
                                
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    
</template>
<script>
export default {
    data(){
        return{
            items:[
                {title:'Profile',to:'/profile/user',show: User.loggedIn()},
                {title:'Login',to:'/login',show: !User.loggedIn()},
                {title:'Register',to:'/register',show: !User.loggedIn()},
                {title:'Log-out',to:'/logout',show: User.loggedIn()}
            ],
            activeClass: 'active'
        }
    },
    computed:{
        name(){
            return localStorage.getItem('user')
        },
        currentPage(){
            return this.$route.path;
        }
    },
    methods:{
        // loggedout(){
        //     console.log('here')
        //     User.logout();
        //     window.location = '/'
        // }
    },
    beforeCreate(){
        EventBus.$on('logout',()=>{
            console.log('here')
            User.logout()
            window.location = '/'
        })
    }
}
</script>
<style scoped>
    .router-link-active{
        opacity: 1;
        visibility: visible;
        border-left-color: #4DB6AC;
        margin: 6px;
        transition: all 0.25s;
        background: none!important;
        box-shadow: none;
    }
</style>
