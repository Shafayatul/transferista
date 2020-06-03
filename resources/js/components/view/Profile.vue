<template>
<main>
    <nav class="navbar navbar-expand-md  navbar-light"  :class="{navbaropen: opened}">
        <div class="container">
             <a class="navbar-brand" href="#" @click="opened = !opened">
                    <div>
                        <div class="bar" :class="{topopen: opened}"></div>
                        <div class="bar" :class="{midopen: opened}"></div>
                        <div class="bar" :class="{botopen: opened}"></div>
                    </div>
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                 
                </li>
                </ul>
                
                
                <!-- Right -->
                <ul class="navbar-nav "> 
               
               
                    <!-- <li class="nav-item" v-for="(item,index) in item1" :key="index" :class="{no : currentPage}">
                        <a style=""  class="nav-link list-group-item  waves-effect"  :href="item.to" v-show="item.show">
                            {{item.title}}
                        </a>
                        
                        <a  href="#banner"></a>
                    </li> -->

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
     <div id="profile-design">
    
    <!-- Sidebar -->
    <side-bar  :class="{sidenavopen: opened}"></side-bar>
    <!-- Sidebar -->
    <!--Main layout-->
   <div :class="{mainopen: opened}"> 
    <router-view  ></router-view>
  <!--Main layout-->
   </div>
  </div>
</main>
</template>
<script>
// import userInfo from './UserInfo'
import Sidebar from './Sidebar'

export default {
    data(){
        return{
            loggedIn: false,
            opened: false,
            user_id:null,
            info:{
                transferista_email:null,
                name: null,
                lat:null,
                lng:null
            },
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
    components:{
        'side-bar':Sidebar,
        
    },
    methods:{
        location(){
             if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    axios.get('/api/transferista')
                    .then(res=>{
                        console.log('-----')
                        console.log(res.data.email)
                        this.info.transferista_email = res.data.email
                        this.info.lat = position.coords.latitude; 
                        this.info.lng = position.coords.longitude;
                        axios.post('/api/send-position',this.info)
                        console.log(this.info.transferista_email)
                    }).catch(error=>console.log(error))
                    console.log(this.info.transferista_email)
                    // document.getElementById("result").innerHTML = positionInfo;
                }.bind(this));
                // axios.get('/api/user-details')
                // .then(res=>{
                //     this.user_id = res.data.user.id
                // })
                // .catch(eror=>console.log(error))
                // axios.get(`/api/drivers/${this.user_id}`)
                // .then(res=>this.form.transferista_id = res.data.driver.transferista_id)
                // .catch(eror=>con/sole.log(error))
                 
                // axios.post('/api/position',this.form)
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
    
        }
    },
    created(){
         this.loggedIn = User.loggedIn()
        // console.log(this.$route.path)
        // axios.get('/api/user-details')
        // .then(res=> this.user=res.data.user)
        // .catch(error =>console.log(error))
        if( User.driver()){
            this.info.name = User.name()
            this.location()
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
    mounted(){
        
        Echo.private('CheckActiveDriver')
            .listen('SendEmail', (e) => {
                console.log('-----')
                console.log(e.email)
                if(this.info.transferista_email === e.email){
                    this.location()
                }
            });
    },
      beforeCreate(){
        EventBus.$on('logout',()=>{
            console.log('here')
            User.logout()
            window.location = '/'
        })
    },
    
}
</script>
<style scoped>
#profile-design{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff) !important;
}
footer.page-footer a {
    color: rgb(196, 178, 178) !important;
}
.mt-b{
    margin-bottom: -2%;
}


a .navbar-brand img{
display: none;
}
footer.page-footer {
    bottom: 0;
    color: #fff;
}
.navbaropen{
 
  margin-left: 250px;
}

</style>

