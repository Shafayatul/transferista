<template>
<div class="mt-b">
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
            info:{
                transferista_email:null,
                name: null,
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
        
        // console.log(this.$route.path)
        // axios.get('/api/user-details')
        // .then(res=> this.user=res.data.user)
        // .catch(error =>console.log(error))
        if( User.driver()){
            this.info.name = User.name()
            this.location()
        }
        
        this.$emit(`update:layout`,ProfileLayout)
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
    }
}
</script>
<style scoped>
footer.page-footer a {
    color: rgb(196, 178, 178) !important;
}
.mt-b{
    margin-bottom: -2%;
}

main{
    padding-left: 270px;
}
a .navbar-brand img{
display: none;
}
footer.page-footer {
    bottom: 0;
    color: #fff;
}


</style>

