<template>
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">Registration Form</h2>
        </div>
        <div class="card-body">
            <form @submit.prevent="register">               
                <div class="form-row">
                    <div class="name">Frist Name</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.email}">
                            <input v-model="form.first_name" class="input--style-5" type="text" placeholder="Frist Name" name="first_name">                                   
                              <strong> <label v-if="errors.first_name" class="help-block p-2" role="alert" >{{errors.first_name[0]}}</label></strong>
                        </div>
                    </div>
                </div>
                 <div class="form-row">
                    <div class="name">Last Name</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.email}">
                             <input v-model="form.last_name" :class="{error: errors.name}" class="input--style-5" type="text" placeholder="Frist Name" name="last_name">
                             <strong><label  v-if="errors.last_name" class="help-block p-2" role="alert">{{errors.last_name[0]}}</label></strong>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Email</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.email}">
                            <input v-model="form.email" class="input--style-5" placeholder="Email" name="email">
                            <span v-if="errors.email" class="help-block p-2" role="alert">
                                <strong>{{errors.email[0]}}</strong>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="name">Password</div>
                    <div class="value" >
                        <div class="input-group">
                            <input v-model="form.password" class="input--style-5" type="password" name="password" placeholder="Password">
                             <span v-if="errors.password" class="help-block p-2" role="alert">
                            <strong>{{errors.password[0]}}</strong>
                             </span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Confirm Password</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.password}">
                            <input v-model="form.password_confirmation" class="input--style-5" type="password" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                       
                    </div>
                </div>
                <div>
                    <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                </div>
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
        AuthLayout
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
        this.$emit(`update:layout`,AuthLayout)
    }
}
</script>
<style scoped>
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