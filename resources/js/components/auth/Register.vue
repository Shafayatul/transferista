<template>
  <!-- Sign Up Layout -->
  <div class="session-wrapper fade-in-up sign-up-page" style="background-image: url('/public/images/office-1209640_1920.jpg'); background-color: rebeccapurple; ">
    <div class="container container-full-width">
      <div class="row">
        <div class="col-sm-12 col-md-11 col-lg-10 mx-auto"> 
          <div class="row no-gutters align-items-center">
            <div class="col-sm-12 col-md-6 d-xs-none">
              <div class="card text-white border-rad shadow-md border-0">
                <img
                  class="card-img w-100"
                  src="/static/img/sign-up.png"
                  alt="Card image"
                  width="445"
                  height="649"
                />
                <div class="card-img-overlay border-rad p-4 text-center">
                  <div>
                    <h2 class="text-white display-4 fw-700 text-uppercase">
                      WelCome!
                    </h2>
                    <p class="lead text-white mb-5">Register and enjoy our benifits, Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
							<div class="sign-up-using text-center">
								<h4 class="text-white mb-4">Sign Up Using</h4>
						   <ul class="list-inline">
                      <li class="list-inline-item mx-2">
                        <a href="javascript:void(0)" class="square-50 bg-facebook">
                          <i class="fa fa-facebook-f fa-inverse"></i>
                        </a>
                      </li>
                      <li class="list-inline-item mx-2">
                        <a href="javascript:void(0)" class="square-50 bg-twitter">
                          <i class="fa fa-twitter fa-inverse"></i>
                        </a>
                      </li>
                      <!-- <li class="list-inline-item mx-2">
                        <a href="javascript:void(0)" class="square-50 bg-google">
                          <i class="fa fa-google-plus-g fa-inverse"></i>
                        </a>
                      </li> -->
                    </ul>
						</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="card border-0 card-shadow">
                <form  class="session-form mb-4" @submit.prevent="register">   
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
                <div class="form-row">
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
    <!-- container closed -->
  </div>         
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
  background: url('/../img/bg.jpg') no-repeat center center fixed;
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  width: 100%;
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