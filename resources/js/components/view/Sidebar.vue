<template>
    <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
        <img src="img/TransferistaC22b-A00aT03a-Z.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <a href="dashbard.html" class="list-group-item active waves-effect">
            <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="profile.html" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-user mr-3"></i>Profile</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-table mr-3"></i>Tables</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-map mr-3"></i>Maps</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-money-bill-alt mr-3"></i>Orders</a>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return{
            items:[
                {title: 'Profile',to:'/profile',show: true},
                {title: 'Login',to:'/login',show: !User.loggedIn()},
                {title: 'Change Password',to:'/profile/credentials',show: true},
                {title: 'Emplyees',to:'/profile/employees',show: (User.company() || User.transferista())},
                {title: 'Drivers',to:'/profile/drivers',show: (User.company() || User.transferista())},
                {title: 'Cars',to:'/profile/cars',show: (User.company() || User.transferista())},
                {title: 'Cars',to:'/profile/cars',show: (User.company() || User.transferista())},
            ]
        }
    }    
}
</script>