<template>
    <div class="side-nav" >
         
        <div class="logo-wrapper ">
            <a @click="home">
                <img :src="'/img/TransferistaC22b-A00aT03a-Z.png'" class="img-fluid" alt="">
            </a>
        </div>

        <div class="list-group list-group-flush">
            <router-link class="list-group-item  waves-effect" v-for="(item,index) in items" :key="index" :to="item.to" v-show="item.show">
                    <i class="mr-3" :class="item.icon"></i>{{item.title}}
            </router-link>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        
        return{
            opened: false,
            items:[
                {title: 'Profile', icon: "fa fa-user", to:'/profile/user',show: true},
                {title: 'Change Password', icon: "fa fa-key", to:'/profile/credentials',show: true},
                {title: 'Employees', icon: "fa fa-users", to:'/profile/employees',show: (User.company() )},
                {title: 'Add Project',icon: "fa fa-plus", to:'/project/create',show: (User.company() ||User.customer()||User.employee())},
                {title: 'Accepted Transferista',icon: "fa fa-car", to:'/profile/transferista',show: (User.company() || User.customer())},
                {title: 'My Projects', icon: "fa fa-product-hunt", to:'/profile/projects',show: (User.company()  || User.customer() || User.employee() )},
                {title: 'Accepted Projects', icon: "fa fa-users", to:'/profile/accepted-projects',show: (User.transferista())},
                {title: 'Drivers', icon: "fa fa-users", to:'/profile/drivers',show: ( User.transferista())},
                {title: 'Cars', icon: "fa fa-users", to:'/profile/cars',show: ( User.transferista())},
                // {title: 'Active Drivers',to:'/profile/positions',show: (User.transferista())},
                {title: 'Bidded Projects',icon: "fa fa-users", to:'/profile/bidded-projects',show: User.transferista()},
                {title: 'My Projects',icon: "fa fa-product-hunt", to:'/profile/my-projects',show: User.driver()},
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
<style scoped>
.logo-wrapper{
    text-align: center;
    margin-top: -20px;
    padding-bottom: 40px;
    border-bottom: 2px solid;
}
.list-group-item {  
    font-size: 16px;
}
.mainopen{
    width: 0;
}
</style>