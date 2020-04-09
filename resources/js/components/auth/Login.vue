<template>
   <div class="session-wrapper fade-in-up">
      <div id="login" class="view jarallax page-wrapper" data-jarallax='{"speed": 0.2}'>
        <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class="intro-info-content text-center">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s">Sign In</h1>
                            <h5 class="text-uppercase white-text mb-5 mt-1 font-weight-bold wow fadeInDown" data-wow-delay="0.3s"> </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loginPge">
      <div class="container container-full-width">
      <div class="row" style="margin-top: -100px;">
            <div class="col-sm-12 col-md-11 col-lg-9 mx-auto">
               <div class="row no-gutters align-items-center">
                  <div class="col-sm-12 col-md-6 d-xs-none bg-image card-shadow">
                     <div class="card text-white border-rad shadow border-0 z-index">
                        
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                     <div class="card border-0 rounded-0 card-shadow">
                    
                        <form @submit.prevent="login" class="session-form">
                           <div class="social-widget mb-4">
                              <h2 class="text-capitalize font-2x mb-4">Sign In</h2>
                           </div><!-- Social widget closed -->
                           <div class="mb-4">
                              <div class="form-group">
                                    <label for="InputEmail1">Email Address</label>
                                    <input v-model="form.email" class="form-control form-control-lg"  name="InputEmail1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" >Password</label>
                                <input v-model="form.password" class="form-control form-control-lg" type="password" name="password">
                            </div>
                            <span v-if="errors" class="help-block" role="alert">
                                <strong>{{errors}}</strong>
                            </span>
                            <div class="form-row input-group regBtn">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="form.remember_me">
                                        <label class="form-check-label pt-1 remember" for="remember">
                                            Remember Me
                                        </label><br>
                                <button class="btn btn-primary btn-block btn-lg submit-btn customBtn" type="submit">Login</button>
                                    
                                    <p class="pt-1">Have you forgotten your password?
                                        <router-link to="/forgot-password">
                                            <a>Click </a>
                                        </router-link>
                                    </p> 
                                    <p class="pt-1">Not signed-up yet? 
                                        <router-link to="/register">
                                            <a>Sign-up</a>
                                        </router-link>
                                    </p>
                            </div>
                        </form>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- container closed -->
     </div> 
   </div><!-- session Wrapper closed -->
</template>
<script>
import navbar from "../layers/navbar1";
export default {
    data(){
        return{
            form:{
                email: null,
                password: null,
                remember_me:false
            },
            errors:null
        }
    },
    computed:{
    },
    components:{
        navbar
    },
    methods:{
        login(){
            // User.login(this.form)
            axios.post('/api/login',this.form)
            .then(res=>{
                User.responseAfterLogin(res)
            })
            .catch(error=>console.log(this.errors= error.response.data.message))
        }
        
    },
    created(){
        this.$emit(`update:layout`,navbar)
    }
}
</script>
<style scoped>
#profile-body{
  background: red !important;
}
.page-wrapper{
  background-image: url('/../static/img/transferista_4.jpg');
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
  height: 100%;
  overflow: hidden;
  
}
.remember {
    position: relative;
    top: -5px;
    font-size: 14px;
}
.sign-up-page {
    margin: 30px 0 40px;
}
.loginPge{
    margin-top:30px;
}
.bg-image{ 
  background-image: url('/../static/img/login.png');
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  -moz-background-size: cover;
  -webkit-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  margin: 0px;
  padding-left: 0;
  min-height: 650px;
  
}
.customBtn {
  border-radius: 0;
}
.sign-up-using {
  margin: 0 2rem;
}
form.session-form input {
    font-size: 14px;
    border-radius: 0;
}
.form-row.regBtn {
    margin: 0px;
}

.sign-up-using.text-center {
    margin: 0 2rem;
}
.session-wrapper {
  padding-top: 0 !important;
}
.white-text {
    color: #fff;
    font-weight: 900;
}
form.session-form {
    padding: 30px;
}
.card.border-0.card-shadow {
    min-height: 650px;
    border-radius: 0;
}
.jarallax {
    height: 100px !important;
    min-height: 600px;
}
.rgba-stylish-light {
    background-color: rgba(62,69,81,0.5);
    height: 100%;
}
.card-5{
    max-width: 70%;
    margin: 0 auto;
}
.select2-selection__rendered {
    line-height: 50px;
  padding-left: 0;
  color: #555;
  font-size: 16px;
  font-family: inherit;
  padding-left: 22px;
  padding-right: 50px;
}
.btn {
  display: inline-block;
  line-height: 50px;
  padding: 0 50px;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  cursor: pointer;
  font-size: 15px;
  text-transform: uppercase;
  font-weight: 700;
  color: #fff;
  font-family: inherit;
} 
/* .btn--radius {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
} */
.btn .btn--radius-2 {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.btn .btn--red {
  background: #ff4b5a;
}
.btn .btn--red:hover {
  background: #eb3746;
}
</style>