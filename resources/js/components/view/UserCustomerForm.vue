<template>
<div class="card card-5">
        <div class="card-heading">
            <h2 class="title">Registration Form</h2>
        </div>
        <div class="card-body">
            <form @submit.prevent="userInfo">
               <div class="row">
                 <div class="form-group col-md-6">
                   <label for="exampleInputEmail1">Address</label>
                   <input v-model="form.address" type="text" class="form-control"  placeholder="Enter Address">
                  <small class="form-text text-muted" v-if="errors.address">{{errors.address[0]}}</small>
               </div>    
               <div class="form-group col-md-6">
                   <label >Zip</label>
                   <input v-model="form.zip" type="text" class="form-control"  placeholder="Enter Zip">
                  <small class="form-text text-muted" v-if="errors.zip">{{errors.zip[0]}}</small>
               </div>
                <div class="form-group col-md-6">
                   <label >Town</label>
                   <input v-model="form.town" type="text" class="form-control"  placeholder="Enter Town">
                  <small class="form-text text-muted" v-if="errors.town">{{errors.town[0]}}</small>
               </div>
                <div class="form-group col-md-6">
                   <label >Country</label>
                   <input v-model="form.country" type="text" class="form-control"  placeholder="Enter Country">
                  <small class="form-text text-muted" v-if="errors.country">{{errors.country[0]}}</small>
               </div>
                 <div class="form-group col-md-6">
                   <label >Phone Number</label>
                   <input v-model="number" type="text" class="form-control"  placeholder="Enter Phone Number">
                  <small class="form-text text-muted" v-if="errors.phone">{{errors.phone[0]}}</small>
               </div>
                <div class="form-group col-md-6">
                   <label >Area Code</label>
                   <input v-model="area_code" type="text" class="form-control"  placeholder="Enter Area Code">
                  <small class="form-text text-muted" v-if="errors.paypal">{{errors.paypal[0]}}</small>
               </div>
               </div>       
               <button class="btn btn-primary  btn-lg submit-btn customBtn" type="submit">Register</button>
            </form>
        </div>
    </div>             
</template>
<script>
import AuthLayout from '../layers/AuthLayout'

export default{
    data(){
        return{
            form:{
                address:null,
                zip:null,
                town:null,
                country:null,
                phone:null,
                role_id:null
            },
            area_code:null,
            number: null,
            errors:{}
        }
    },
    computed:{
        phoneNumber(){
          return  this.form.phone = this.area_code + this.number
        }
    },
    methods:{
        userInfo(){
            console.log(this.form)
            axios.post('/api/user-info-save',this.form)
            .then(res=> this.$router.push({name: 'userInfo'}))
            .catch(error=> console.log(error))
        }
    },
    created(){
        let role = 'customer'
        localStorage.setItem('role', role) 
        this.form.role_id = this.$route.params.role
        this.$emit(`update:layout`,AuthLayout)
    }
}
</script>
<style scoped>
.card-5 {
   
    padding: 20px;
}
.customBtn {
 background-color: #000;
 
}
</style>