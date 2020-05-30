<template>

  <div class="session-wrapper fade-in-up " >
   <div id="partner_register">
       <div class="container container-full-width">
            <div class="row">
                <div class="col-sm-12 col-md-5 partnerRegContent">
                    <h5>Are you a transferista? Be part of it</h5>
                        <h2>Join Transferista  </h2>
                </div>
            </div>
        </div>
       <div class="page-wrapper"> 
    <div class="container container-full-width">
      <div class="row">
            <div class="col-sm-12 col-md-offset-7 col-md-5 partnerRegFrm">
              <div class="card border-0 card-shadow">
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
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="form.remember_me">
                                    <label class="form-check-label pt-1 remember" for="remember">
                                        Remember Me
                                    </label>
                                </div>    
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
    </div>
    </div>
    <!-- container closed -->       
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
    height: 550px;
 background-position: center;
  
}
.remember {
   
  
    font-size: 14px;
}
form.session-form p {
    font-size: 13px;
}
#partner_register{

    margin-top:210px;
}
.partnerRegFrm {
    position: relative;
    top: -140px;
}
.customBtn {
  border-radius: 0;
 background-color: #000;
 border: 0;
}
.partnerRegContent h2 {
    font-weight: 900;
}
.customBtn:hover {
    color: #fff;
    background-color: #000;
    border: 0;
    opacity: .9;
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
.sub-heading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 100%;
    color: #fff;
    text-align: center;
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
    padding: 30px 15px;
}
.card.border-0.card-shadow {
   
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
.card-5 {
   max-width: 70%;
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