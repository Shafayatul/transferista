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
                <form  class="session-form" @submit.prevent="register">   
                  <div class="social-widget mb-4">
                    <h2 class="text-capitalize font-2x mb-4">Sign Up Now</h2>
                
                  </div>
                  <!-- Social widget closed -->
                    <div class="form-group">
                        
                        <div class="input-group" :class="{error: errors.email}">
                            <input v-model="form.email" class="form-control form-control-lg" placeholder="Email" name="email">
                            <span v-if="errors.email" class="help-block p-2" role="alert">
                                <strong>{{errors.email[0]}}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6" :class="{error: errors.email}">
                            <input v-model="form.first_name" class="form-control form-control-lg" type="text" placeholder="Frist Name" name="first_name">                                   
                            <strong> <label v-if="errors.first_name" class="help-block p-2" role="alert" >{{errors.first_name[0]}}</label></strong>
                        </div>
                
                        <div class="col-xs-6" :class="{error: errors.email}">
                            <input v-model="form.last_name" :class="{error: errors.name}" class="form-control form-control-lg" type="text" placeholder="Last Name" id="last_name" name="last_name">
                            <strong><label  v-if="errors.last_name" class="help-block p-2" role="alert">{{errors.last_name[0]}}</label></strong>
                        </div>
                    </div>
                              
                    <div class="form-group">
                        <div class="input-group">
                            <input v-model="form.password" class="form-control form-control-lg" type="password" name="password" placeholder="Create Password">
                            <span v-if="errors.password" class="help-block p-2" role="alert">
                            <strong>{{errors.password[0]}}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">                   
                        <div class="input-group" :class="{error: errors.password}">
                            <input v-model="form.password_confirmation" id="city" class="form-control form-control-lg" type="text" name="city" placeholder="City">
                        </div>
                    
                    </div>
                    <div class="form-group">                   
                        <div class="input-group" :class="{error: errors.password}">
                            <input v-model="form.password_confirmation" id="inviteCode" class="form-control form-control-lg" type="text" name="city" placeholder="Invite Code (Optional)">
                        </div>
                    
                    </div>
                    <div class="form-group">
                        <p>By proceeding, I consent to receive calls or SMS messages, including by automatic dialler, from Transferista and its affiliates to the number I provide<br><br>
                            By proceeding, I am also agreeing to receive marketing communications (including by automatic dialler) by SMS from Transferista to the phone number provided. These messages may promote our products and services, and those of our business partners. I understand that consent to receiving these marketing messages is not a requirement to use Transferistas services.
                            </p>
                    </div>
                <div class="form-row regBtn">
                    <div class="name"></div>
                       
                        <button class="btn btn-primary btn-block btn-lg submit-btn customBtn" type="submit">Register</button>
                        <p class="pt-1">All ready signed-up ? 
                            <router-link to="/login">
                                <a>Log-in</a>
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
                first_name: null,
                last_name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            errors:{}
        }
    },
    computed:{
    },
    components:{
        navbar
    },
    methods:{
        register(){
            axios.post('/api/register',this.form)
            .then(res => {
            console.log(res.data)
            this.$router.push({name:'login'})})
            .catch(error=> this.errors = error.response.data.errors)
        }
    },
    created(){
        this.$emit(`update:layout`,navbar)
    }
}
</script>
<style scoped>
.page-wrapper{
  background-image: url('/../static/img/transferista_2.jpg');
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
    height: 550px;
 background-position: center;
  
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