<template>
    <div class="card card-5 f">
        <div v-if="flag" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>An Email has been sent to your mail address</strong> 
        </div> 
        <div class="card-heading">
            <h2 class="title">Forgot Password  hnnbmb ?</h2>
        </div>
        <div class="card-body">
            
            <form @submit.prevent="login">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input v-model="form.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small  v-if="errors.message" id="emailHelp" class="form-text text-muted">{{errors.message}}</small>
                </div>  
                <button  class="btn  submit-btn customBtn" type="submit">Submit</button>
                    <p class="pt-1">Not signed-up yet? 
                        <router-link to="/register">
                            <a>Sign-up</a>
                        </router-link>
                    </p>
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
.page-wrapper{
    height: 100vh;
}
.card-5{
    max-width:400px;
    margin: 0 auto; 
    padding: 20px;
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
btn--red {
  background: #ff4b5a;
}
.btn--red:hover {
  background: #eb3746;
}
.customBtn {
  border-radius: 0;
 background-color: #000;
 border: 0;
}
</style>