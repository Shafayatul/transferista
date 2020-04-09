<template>
    <div class="card card-5">
        <div v-if="flag" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>An Email has been sent to your mail address</strong> 
        </div> 
        <div class="card-heading">
            <h2 class="title">Forgot Password  hnnbmb ?</h2>
        </div>
        <div class="card-body">
            
            <form @submit.prevent="login">
                <div class="form-row">
                    <div class="name col-md-3">Email</div>
                    <div class="value col-md-9">
                        <div class="input-group" >
                            <input v-model="form.email" class="input--style-5"  name="email">
                            <span v-if="errors.message" class="help-block" role="alert">
                                <strong>{{errors.message}}</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-row input-group ">

                    <div class="col-lg-9 offset-3 ">
                     <button class="btn btn--radius-2 btn--red" type="submit">Submit</button>
                
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
</template>
<script>
import AuthLayout from '../layers/AuthLayout'
export default {
    data(){
        return{
            form:{
                email: null
            },
            errors:{},
            flag: null
        }
    },
    computed:{
    },
    components:{
        AuthLayout
    },
    methods:{
        login(){
            // User.login(this.form)
            axios.post('/api/password/create',this.form)
            .then(res=>{
                this.flag = true,
                console.log(res)
            })
            .catch(error=>console.log(this.errors= error.response.data))
        }
        
    },
    created(){
        this.$emit(`update:layout`,AuthLayout)
    }
}
</script>
<style scoped>
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