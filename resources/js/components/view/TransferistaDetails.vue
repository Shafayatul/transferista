<template>
    <div class="row">
        <div class="" id="profile-design">
            <main class="pt-5 mx-lg-5">
                <div class="container-fluid mt-5">
                    <div class="container emp-profile">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                        
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
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
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                            <div class="row" v-if="flag">
                                                <h4>No reviews to show</h4> 
                                            </div>


                                            <div class="row" v-for="(data,index) in rating" :key="index">
                                                <div class="col-md-6">
                                                    <label>{{data.rating_from.name}}</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="fas fa-star"  v-for="(data,index) in parseFloat(data.rating)" :key="index"></i>
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
                            </div>
                            
                        </form>           
                    </div>
                </div> 
            </main>
        </div>
    </div>
</template>
<script>
import DashboardLayout from "../layers/DashboardLayout";
export default {
    data(){
        return{
            user:{},
            userInfo:{},
            rating:{},
            avg_rating: 0,
            flag: null
        }
    },
    components:{
        DashboardLayout
    },
    created(){
        let id = this.$route.params.id
        axios.get(`/api/transferista-details/${id}`)
        .then(res=>{
            console.log(res.data.rating)
            this.user = res.data.user
            this.userInfo = res.data.user.user_info
            this.rating = res.data.rating
            if(this.rating.length==0){
                this.flag = true
            }
            
            this.avg_rating = res.data.avg_rating



        })
        this.$emit('update:layout',DashboardLayout)
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
#profile-design{
    
    width: -webkit-fill-available;
    background: -webkit-linear-gradient(left, #3931af, #00c6ff) !important;
}
/* body{
 background: -webkit-linear-gradient(left, #3931af, #00c6ff) !important;
} */
main{
    padding-left: 270px;
    padding-bottom: 15%;
    height:auto ;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;    
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