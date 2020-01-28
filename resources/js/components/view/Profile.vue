<template>
<div>
    <!-- Sidebar -->
    <side-bar></side-bar>
    <!-- Sidebar -->
    <!--Main layout-->
    <router-view></router-view>
  <!--Main layout-->

</div>
</template>
<script>
// import userInfo from './UserInfo'
import Sidebar from './Sidebar'
import ProfileLayout from '../layers/ProfileLayout' 
export default {
    data(){
        return{
            lat:null,
            lng:null,
            user:null
        }
    },
    components:{
        'side-bar':Sidebar,
        ProfileLayout
    },
    methods:{
        location(){
             if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    console.log(position);
                    this.form.lat = position.coords.latitude; 
                    this.form.lng = position.coords.longitude;
                    // document.getElementById("result").innerHTML = positionInfo;
                }.bind(this));

            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
    
        }
    },
    created(){
        if(User.employee() || User.driver()){
            this.location()
        }
        this.$emit(`update:layout`,ProfileLayout)
    },
    mounted(){
        Echo.channel('location')
        .listen('SendPosition', (e) => {
            this.updatePath(e)
        });
    }
}
</script>