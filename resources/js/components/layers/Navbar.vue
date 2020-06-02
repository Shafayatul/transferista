<template>
<!-- Navbar -->
    <nav class="navbar navbar-expand-md  navbar-light">
        <div class="container">
            
            <router-link to="/" class="navbar-brand" :class="{no : currentPage}">
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

                    <li class="nav-item" v-for="(item,index) in item1" :key="index" :class="{no : currentPage}">
                        <a style=""  class="nav-link list-group-item  waves-effect"  :href="item.to" v-show="item.show">
                            {{item.title}}
                        </a>
                        
                        <!-- <a  href="#banner"></a> -->
                    </li>

                    <li class="nav-item" v-for="item in item2" :key="item.title">
                        <router-link style=""  class="nav-link list-group-item  waves-effect"  :to="item.to" v-show="item.show">
                            {{item.title}}
                        </router-link>
                    </li>

                    <li class="dropdown  nav-item" v-show="loggedIn">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="true">
                        <img width="40" alt="image" :src="'/img/avatar-1.png'" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{name}}</div></a>
                        <div class="dropdown-menu dropdown-menu-right ">
                            <!-- <div class="dropdown-title">
                                Logged in 5 min ago
                            </div> -->
                            <router-link v-for="item in items" class="dropdown-item" :key="item.title" :to="item.to" v-show="item.show">
                               
                                  {{item.title}}
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
            loggedIn: false,
            item1:[
                {title: 'Add Project',to:'/project/create',show: (User.company() ||User.customer() || User.employee())},
                {title: 'My Projects',to:'/profile/projects',show: (User.company()  || User.customer() || User.employee())}
                // {title: 'Accepted Bids',to:'/profile/edit-customer',show: User.transferista()},
                
            ],
        
            items:[
                {title:'Profile',to:'/profile/user',show: User.loggedIn()},
                {title:'Log-out',to:'/logout',show: User.loggedIn()}
            ],
            item2:[
                {title:'Login',to:'/login',show: !User.loggedIn()},
                {title:'Register',to:'/register',show: !User.loggedIn()}
            ],
            activeClass: 'active'
        }
    },
    computed:{
        name(){
            return localStorage.getItem('user')
        },
        currentPage(){
            return this.$route.path.includes("profile");
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
    },
    created(){
        this.loggedIn = User.loggedIn()
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
    .no{
        display: none;
    }
    #header .nav-item a{
        border: none;
    }
</style>
