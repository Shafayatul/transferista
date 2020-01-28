<template>
    <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
        <img src="img/TransferistaC22b-A00aT03a-Z.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <router-link v-for="item in items" :key="item.title" :to="item.to" v-show="item.show">
                <a href="dashbard.html" class="list-group-item active waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>{{item.title}}
                </a>
            </router-link>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return{
            items:[
                {title: 'Profile',to:'/profile/user',show: true},
                {title: 'Change Password',to:'/profile/credentials',show: true},
                {title: 'Emplyees',to:'/profile/employees',show: (User.company() || User.transferista())},
                {title: 'Drivers',to:'/profile/drivers',show: (User.company() || User.transferista())},
                {title: 'Cars',to:'/profile/cars',show: (User.company() || User.transferista())},
                {title: 'My Projects',to:'/profile/cars',show: (User.company() || User.customer())},
                {title: 'Active Members',to:'/profile/cars',show: (User.company() || User.transferista())},
                {title: 'Login',to:'/login',show: !User.loggedIn()},

                
            ]
        }
    }    
}
</script>