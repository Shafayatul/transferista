<template>
    <main class=" " style="height: 90vh;">
        <div class="container emp-profile">
          
                <form method="post">
                 
                        
                        <div class="col-md-8 mx-auto profile-color">
                            <div class="profile-head">                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link  active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
                                    </li>
                                    <li class="nav-item ">
                                         <router-link class="nav-link" to='edit-customer'>Edit Profile</router-link>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{user.name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{user.email}}</p>
                                        </div>
                                    </div>
                                    <div v-if="userInfo">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{userInfo.address}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Town</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{userInfo.town}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{userInfo.country}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Company Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{userInfo.email_company}}</p>
                                            </div>
                                        </div>
                                        <div v-if="flag1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Vat</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{userInfo.vat}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Url</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{userInfo.url}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                  
                                        <h4>No reviews to show</h4> 
                                

                                    <div class="row" v-for="(data,index) in rating" :key="index">
                                        <div class="col-md-3">
                                            <label>{{data.rating_from.name}}</label>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fas fa-star"  v-for="(data,index) in parseFloat(data.rating)" :key="index"></i>
                                        </div>
                                        <div class="col-md-6">
                                            {{data.rating_text}}
                                        </div>
                                    </div>


                                    <div class="row" >
                                        <div class="col-md-6">
                                            <label>Average Rating :</label>
                                        </div>
                                        <div class="col-md-6">
                                            {{avg_rating}}
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                     
                   
                    
                </form>           
            
       </div>
    </main>

</template>
<script>
export default {
    data(){
        return{
            user:{},
            userInfo:{},
            name:null,
            rating:{},
            avg_rating: 0,
            flag: null,
            flag1: null,
            employee:true
        }
    }
    ,
    created(){
        if(User.employee()){
            this.employee = false;
        }
        if(User.transferista())
        {
            this.flag1 = true    
        }        
        this.name = User.name()
        axios.get(`/api/user-details`)
        .then(res=>{
            this.user = res.data.user
            this.userInfo = res.data.user.user_info
             this.rating = res.data.rating
            if(this.rating.length==0){
                this.flag = true
            }
            
            this.avg_rating = res.data.avg_rating

        })
        .catch(error=>this.errors=error.response.data.errors)
    }
}
</script>

<style scoped>
.profile-head h5[data-v-4941e4b0] {
    color: red;
}
#profile-body {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.tab-content > .active {
    display: block;
    z-index: 2000;
    opacity: 2.0 !important;
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
    margin-bottom: -2%;
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
