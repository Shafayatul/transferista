


<template>

<div>
    <!-- Sidebar -->
    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div v-show="success" class="alert alert-warning alert-dismissible fade show" role="alert">
                            Paassword changed successfully
                            <button @click="success =!success" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="profile-head">
                                {{user.first_name}} {{user.last_name}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button @click="flag = !flag" type="submit" class="profile-edit-btn" name="btnAddMore" >Edit Profile</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form>
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="form-group row">
                                        <label class="col-3 control-label">First Name</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model ="user.first_name" class="form-control" placeholder="First Name" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Last name </label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.last_name" class="form-control" placeholder="Last name" data-type="string" data-original="islam" name="last_name" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Email</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.email" class="form-control" placeholder="Email" data-type="string" data-original="islam" name="last_name" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Address</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.user_info.address" class="form-control" placeholder="Address " data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Town </label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.user_info.town" class="form-control" placeholder="Town" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Country</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.user_info.country" class="form-control" placeholder="Country" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Company</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.user_info.company" class="form-control" placeholder="Company" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Zip</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.user_info.zip" class="form-control" placeholder="ZIP" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Phone</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.user_info.phone" class="form-control" placeholder="Phone" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
        
        
                                    <div class="form-group row">
                                        <label class="col-3 control-label">Paypal Account No:</label>
                                        <div class="col-9">
                                            <input :disabled="flag" v-model="user.user_info.paypal" class="form-control" placeholder="Account no" data-type="string" data-original="islam" name="last_name" type="text">
                                        </div>
                                    </div>
                                    <button type="button" class="btn" @click="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main> 
  <!--Main layout-->

</div>
</template>
<script>




export default {

    data(){
        return {
            success:false,
            flag: true,
            user: {
                user_info: {}
            }
        }
    },
    methods:{
        submit(){
            axios.post('/api/user-info-update',this.user)
            .then(res=>this.success=true )
        }
    },
    beforeCreate(){
        axios.get('/api/user-details')
        .then(res=> {
            this.user = res.data.user
            })
        .catch(error=> console.log(error))
    }
}
</script>

<style scoped>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff) !important;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
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
