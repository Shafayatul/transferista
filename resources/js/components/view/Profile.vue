<template>
<div>
    <!-- Sidebar -->
    <side-bar></side-bar>
    <!-- Sidebar -->
    <!--Main layout-->
    <router-view ></router-view>
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
            user_id:null,
            form:{
                transferista_id:null,
                lat:null,
                lng:null
            }
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
                axios.get('api/user-details')
                .then(res=>{
                    this.user_id = res.data.user.id
                })
                .catch(eror=>console.log(error))
                axios.get(`api/drivers/${this.user_id}`)
                .then(res=>this.form.transferista_id = res.data.driver.transferista_id)
                .catch(eror=>console.log(error))
                 
                axios.post('/api/position',this.form)
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
    
        }
    },
    created(){
        // axios.get('/api/user-details')
        // .then(res=> this.user=res.data.user)
        // .catch(error =>console.log(error))
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
<style scoped>

main{
    padding-left: 270px;
}
</style>
