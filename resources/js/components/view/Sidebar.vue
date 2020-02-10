<template>
    <div class="sidebar-fixed position-fixed">

        <div class="logo-wrapper waves-effect">
            <a @click="home">
                <img :src="'/img/TransferistaC22b-A00aT03a-Z.png'" class="img-fluid" alt="">
            </a>
        </div>

        <div class="list-group list-group-flush">
            <router-link class="list-group-item  waves-effect" v-for="(item,index) in items" :key="index" :to="item.to" v-show="item.show">
                    <i class="fas fa-chart-pie mr-3"></i>{{item.title}}
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
                {title: 'Employees',to:'/profile/employees',show: (User.company() )},
                {title: 'Add Project',to:'/project/create',show: (User.company() ||User.customer()||User.employee())},
                {title: 'Accepted Transferista',to:'/profile/transferista',show: (User.company() || User.customer())},
                {title: 'My Projects',to:'/profile/projects',show: (User.company()  || User.customer() || User.employee() )},
                {title: 'Accepted Projects',to:'/profile/accepted-projects',show: (User.transferista())},
                {title: 'Drivers',to:'/profile/drivers',show: ( User.transferista())},
                {title: 'Cars',to:'/profile/cars',show: ( User.transferista())},
                // {title: 'Active Drivers',to:'/profile/positions',show: (User.transferista())},
                {title: 'Bidded Projects',to:'/profile/bidded-projects',show: User.transferista()},
                {title: 'My Projects',to:'/profile/my-projects',show: User.driver()},
                // {title: 'Accepted Bids',to:'/profile/edit-customer',show: User.transferista()},
                
            ]
        }
    },
    methods:{
        home(){
            this.$router.push({
                name: 'home'
            })
        }
    }
}
</script>