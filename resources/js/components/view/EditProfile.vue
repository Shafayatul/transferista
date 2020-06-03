


<template>
    <!-- Sidebar -->
    <!--Main layout-->
    <main class=" mx-lg-5">
        <div class="container emp-profile">
                      
                    <div class="col-md-8 mx-auto profile-color">
                        <div v-show="success" class="alert alert-warning alert-dismissible fade " role="alert">
                            Profile Updated Successfully
                            <button @click="success =!success" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="profile-head">
                                <!-- {{User.name()}} -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                        <form>
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="form-group row">
                                        <label class="col-3 control-label">First Name</label>
                                        <div class="col-9">
                                            <input required v-model ="user.first_name" class="form-control" placeholder="First Name" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Last name </label>
                                        <div class="col-9">
                                            <input required v-model="user.last_name" class="form-control" placeholder="Last name" data-type="string" data-original="islam" name="last_name" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Email</label>
                                        <div class="col-9">
                                            <input required v-model="user.email" class="form-control" placeholder="Email" data-type="string" data-original="islam" name="last_name" type="text" >
                                        </div>
                                    </div>
                                    <div v-if="user.user_info">
                                        <div class="form-group row">
                                            <label class="col-3 control-label">Address</label>
                                            <div class="col-9">
                                                <input required v-model="user.user_info.address" class="form-control" placeholder="Address " data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-3 control-label">Town </label>
                                            <div class="col-9">
                                                <input required  v-model="user.user_info.town" class="form-control" placeholder="Town" data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-3 control-label">Country</label>
                                            <div class="col-9">
                                                <input required v-model="user.user_info.country" class="form-control" placeholder="Country" data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-3 control-label">Company</label>
                                            <div class="col-9">
                                                <input required v-model="user.user_info.company" class="form-control" placeholder="Company" data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
            
                                        <div v-show="flag" class="form-group row">
                                            <label class="col-3 control-label">Vat</label>
                                            <div class="col-9">
                                                <input required v-model="user.user_info.vat" class="form-control" placeholder="Company" data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-3 control-label">Zip</label>
                                            <div class="col-9">
                                                <input required v-model="user.user_info.zip" class="form-control" placeholder="ZIP" data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
            
            
                                        <div class="form-group row">
                                            <label class="col-3 control-label">Phone</label>
                                            <div class="col-9">
                                                <input  v-model="user.user_info.phone" class="form-control" placeholder="Phone" data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 control-label">Paypal Account No:</label>
                                            <div class="col-9">
                                                <input  v-model="user.user_info.paypal" class="form-control" placeholder="Account no" data-type="string" data-original="islam" name="last_name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-5 offset-3">         
                                            <button type="button" class="btn customBtn " @click="submit">Update</button>
                                    <!-- </div>  
                                        <div class="col-md-4 offset-3">          -->
                                            <button type="button" class="btn btn-danger " @click="cancel">Cancel</button>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </form>


                  
         
        </div>
        </div>
    </main> 
  <!--Main layout-->


</template>
<script>




export default {

    data(){
        return {
            success:false,
            user: {
                user_info: {
                }
            },
            flag:false
        }
    },
    methods:{
        submit(){
            axios.post('/api/user-info-update',this.user)
            .then(res=>this.success=true )
        },
        cancel(){
            // axios.post('/api/user-info-update',this.user)
            // .then(res=>this.success=true )
            this.$router.push('user')
        }
    },
    beforeCreate(){
        axios.get('/api/user-details')
        .then(res=> {
                this.user = res.data.user
            })
        .catch(error=> console.log(error))
    },
    created(){
        if(User.transferista()){
            this.flag = true
        }
    }
}
</script>

<style scoped>
#profile-design{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff) !important;
}
.customBtn{
    color: #fff;
    background-color: #000;
    border: 0;
    opacity: .9;
}


.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
