<template>
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">Login Form</h2>
        </div>
        <div class="card-body">
            <p>Not signed-up yet?</p>
            <router-link to="/register">
                <a>Sign-up</a>
            </router-link>
            <form @submit.prevent="login">
                <div class="form-row">
                    <div class="name">Email</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.email}">
                            <input v-model="form.email" class="input--style-5"  name="email">
                            <span v-if="errors.email" class="help-block" role="alert">
                                <strong>{{errors.email[0]}}</strong>
                            </span>
                        </div>
                        <span v-if="errors.email" class="help-block" role="alert">
                            <strong>{{errors.email[0]}}</strong>
                        </span>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="name">Password</div>
                    <div class="value" >
                        <div class="input-group">
                            <input v-model="form.password" class="input--style-5" type="password" name="password">
                        </div>
                        <span v-if="errors.password" class="help-block" role="alert">
                            <strong>{{errors.password[0]}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="value" >
                        <div class="input-group">
                             <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="form.remember_me">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <button class="btn btn--radius-2 btn--red" type="submit">Login</button>
                
            </form>
        </div>
    </div>             
</template>
<script>
import AuthLayout from '../layers/AuthLayout'
export default {
    data(){
        return{
            form:{
                email: null,
                password: null,
                remember_me:false
            },
            errors:{}
        }
    },
    computed:{
    },
    components:{
        AuthLayout
    },
    methods:{
        login(){
            User.login(this.form)
            .catch(error=>this.errors= error.data.response.errors)
        }
        
    },
    created(){
        this.$emit(`update:layout`,AuthLayout)
    }
}
</script>
<style scoped>
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