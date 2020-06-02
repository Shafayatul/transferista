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
            <div class="col-sm-12  col-md-8 ml-auto partnerRegFrm">
               <div class="row">
               <div class="col-sm-12 col-md-6  bg-image card-shadow">
                   <div class="regcard">
                    <h2 class="reg-title">Welcome</h2>
                    <p class="reg-subtitle">Register and enjoy our benefit</p>
                     <div class="socal">
                         <h2 class="socal-title">Sign Up Using</h2>
                         <div class="d-block mt-5">
                          <button class="btn btn-facebook" @click="AuthProvider('facebook')"><i class="fa fa-facebook-f"></i></button>
                           <button class="btn btn-twitter" @click="AuthProvider('twitter')"><i class="fa fa-twitter"></i></button>
                         </div> 
                     </div>
                  </div>
               </div>  
              <div class="card border-0 card-shadow col-md-6">
                  <form  class="session-form" @submit.prevent="register">   
                  <div class="social-widget mb-4">
                    <h2 class="text-capitalize font-2x mb-4">Sign Up</h2>
                
                  </div>
                  <!-- Social widget closed -->
                    
                    <div class="form-group">
                        <label for="name">Frist Name</label>
                    
                        <div class="input-group" :class="{error: errors.email}">
                            <input v-model="form.first_name" class="form-control form-control-lg" type="text" placeholder="Frist Name" name="first_name">                                   
                            <strong> <label v-if="errors.first_name" class="help-block p-2" role="alert" >{{errors.first_name[0]}}</label></strong>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="last_name">Last Name</label>
                
                    <div class="input-group" :class="{error: errors.email}">
                        <input v-model="form.last_name" :class="{error: errors.name}" class="form-control form-control-lg" type="text" placeholder="Last Name" id="last_name" name="last_name">
                        <strong><label  v-if="errors.last_name" class="help-block p-2" role="alert">{{errors.last_name[0]}}</label></strong>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="name">Email</label>
                        <div class="input-group" :class="{error: errors.email}">
                            <input v-model="form.email" class="form-control form-control-lg" placeholder="Email" name="email">
                            <span v-if="errors.email" class="help-block p-2" role="alert">
                                <strong>{{errors.email[0]}}</strong>
                            </span>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label class="name">Password</label>
                        <div class="input-group">
                            <input v-model="form.password" class="form-control form-control-lg" type="password" name="password" placeholder="Password">
                            <span v-if="errors.password" class="help-block p-2" role="alert">
                            <strong>{{errors.password[0]}}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="confirm">Confirm Password</label>
                   
                        <div class="input-group" :class="{error: errors.password}">
                            <input v-model="form.password_confirmation" id="confirm" class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                    
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
        },
        AuthProvider(provider) {
            
              var self = this
              
              this.$auth.authenticate(provider).then(res =>{
                 console.log(res)
                self.SocialLogin(provider,res)
                }).catch(err => {
                    console.log({err:err})
                })
            },
       SocialLogin(provider,res){
             console.log(res)
            // User.login(this.form)
            axios.post('sociallogin/'+provider,res)
            .then(res=>{
                console.log(res.data)
                User.responseAftersocalLogin(res)
               
            })
            .catch(error => {
                    console.log(error)
                })
        }
    },
    created(){
        this.$emit(`update:layout`,navbar)
    }
}
</script>
<style scoped>
.page-wrapper{
  background-image: url('/../static/img/transferista_5.jpg');
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
   height: 550px;
  
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
  
}
.regcard{
    padding-top: 100px;
}
.sign-up-page {
    margin: 30px 0 40px;
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
.reg-title{
    font-size: 40px;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
}
.btn-facebook {
	  background: #3B5998;
	  border-radius:4px;
	  color: #fff;
      padding: 2px 10px;
     font-size: 18px;
     margin-right: 20px;
	}
	.btn-facebook:link, .btn-facebook:visited {
	  color: #fff;
	}
	.btn-facebook:active, .btn-facebook:hover {
	  background: #263961;
	  color: #fff;
    }
    .btn-twitter {
	  background: #00ACEE;
	  border-radius: 4px;
	  color: #fff;
	
      padding: 2px 10px;
    font-size: 18px;
	}
	.btn-twitter:link, .btn-twitter:visited {
	  color: #fff; 
	}
	.btn-twitter:active, .btn-twitter:hover {
	  background: #0075a2;
	  color: #fff; 
	}
    .socal{
    background: #2d2d2d26;
    text-align: center;
    padding: 20px;
    margin-left: 40px;
    margin-right: 40px;
    margin-top: 70px;
    }
    .reg-subtitle{
        color: #fff;
        text-align: center;
    }
    .socal-title{
        font-size: 18px;
        color: #fff;
        text-align: center;
    }
</style>