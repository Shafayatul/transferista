<template>
   <div class="session-wrapper fade-in-up">
      <div class="container container-full-width">
         <div class="row">
            <div class="col-sm-12 col-md-11 col-lg-9 mx-auto">
               <div class="row no-gutters align-items-center">
                  <div class="col-sm-12 col-md-6 d-xs-none">
                     <div class="card text-white border-rad shadow border-0 z-index">
                        <img class="card-img img-fluid" src="/static/img/login.png" alt="Card image" width="400" height="500" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                     <div class="card border-0 p-5 rounded-0 card-shadow">
                    
                        <form @submit.prevent="login">
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
                            <div class="form-row input-group ">

                                <div class="col-lg-9 offset-3 ">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="form.remember_me">
                                        <label class="form-check-label pt-1" for="remember">
                                            Remember Me
                                        </label><br>
                                <button class="btn btn-primary btn-block btn-lg submit-btn" type="submit">Login</button>
                                    
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
                            </div>
                        </form>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- container closed -->
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