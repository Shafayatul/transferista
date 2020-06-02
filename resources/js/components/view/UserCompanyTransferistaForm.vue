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
                   <label >Company </label>
                   <input v-model="form.company" type="text" class="form-control"  placeholder="Enter zip">
                  <small class="form-text text-muted" v-if="errors.company">{{errors.company[0]}}</small>
               </div>
                <div class="form-group col-md-6">
                   <label >Company Email</label>
                   <input v-model="form.email_company" type="text" class="form-control"  placeholder="Enter Company">
                  <small class="form-text text-muted" v-if="errors.email_company">{{errors.email_company[0]}}</small>
               </div>
                <div v-if="flag" class="form-group col-md-6">
                   <label >VAT</label>
                   <input :class="{error: errors.vat}" v-model="form.vat" type="text" class="form-control"  placeholder="Enter VAT">
                  <small class="form-text text-muted" v-if="errors.email_company">{{errors.email_company[0]}}</small>
               </div>
                <div class="form-group col-md-6">
                   <label >IBAN</label>
                   <input :class="{error: errors.iban}" v-model="form.iban" type="text" class="form-control"  placeholder="Enter IBAN">
                  <small class="form-text text-muted" v-if="errors.iban">{{errors.iban[0]}}</small>
               </div>
               <div class="form-group col-md-6">
                   <label >BIC</label>
                   <input :class="{error: errors.bic}" v-model="form.bic" type="text" class="form-control"  placeholder="Enter BIC">
                  <small class="form-text text-muted" v-if="errors.bic">{{errors.bic[0]}}</small>
               </div>
                <div class="form-group col-md-6">
                   <label >URL</label>
                   <input :class="{error: errors.url}" v-model="form.url" type="text" class="form-control"  placeholder="Enter URL">
                  <small class="form-text text-muted" v-if="errors.url">{{errors.url[0]}}</small>
               </div>
               <div class="form-group col-md-6">
                   <label >Paypal Account Email:</label>
                   <input :class="{error: errors.paypal}" v-model="form.paypal" type="text" class="form-control"  placeholder="Enter Paypal Account Email">
                  <small class="form-text text-muted" v-if="errors.paypal">{{errors.paypal[0]}}</small>
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
               company:null,
               url:null,
               vat:null,
               email_company:null, 
               iban:null,
               bic:null,
               role_id:null,
               paypal:null
            },
            role:null,
            area_code:null,
            number: null,
            errors:{},
            flag:null
        }
    },
    computed:{
        phoneNumber(){
            this.form.phone = this.area_code + this.number
        }
    },
    methods:{
        userInfo(){
            axios.post('/api/user-info-save',this.form)
            .then(res=>{
                // alert(11111)
                let role; 
                if(this.form.role_id == 2){
                    role = 'company'
                }
                if(this.form.role_id == 3){
                    role = 'transferista'
                    this.flag =true
                }
                if(this.form.role_id == 1){
                    role = 'customer'
                }
                localStorage.setItem('role', role) 
                this.$router.push({name:'userInfo'})
            })
            .catch(error=> {
                
                this.errors = error.response.data.errors
                console.log(error)
                }
            )
        }
    },
    created(){
        this.form.role_id = this.$route.params.role
        console.log(this.form.role_id)
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