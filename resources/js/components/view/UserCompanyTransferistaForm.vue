<template>
<div class="card card-5">
        <div class="card-heading">
            <h2 class="title">Registration Form</h2>
        </div>
        <div class="card-body">
            <form @submit.prevent="userInfo">
                <div class="form-row m-b-55">
                    <div class="name">Address</div>
                    <div class="value">
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group-desc" >
                                    <input v-model="form.address" class="input--style-5" type="text" name="Address">
                                    <span v-if="errors.address" class="help-block" role="alert">
                                        <strong>{{errors.address[0]}}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Zip</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.zip}">
                            <input v-model="form.zip" class="input--style-5"  name="zip">
                            <span v-if="errors.zip" class="help-block" role="alert">
                                <strong>{{errors.zip[0]}}</strong>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="name">Town</div>
                    <div class="value" >
                        <div class="input-group">
                            <input v-model="form.town" class="input--style-5" type="text" name="town">
                        </div>
                        <span v-if="errors.town" class="help-block" role="alert">
                            <strong>{{errors.town[0]}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Country</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.country}">
                            <input v-model="form.country" class="input--style-5" type="text" name="country">
                        </div>
                        <span v-if="errors.country" class="help-block" role="alert">
                            <strong>{{errors.country[0]}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Company</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.company}">
                            <input v-model="form.company" class="input--style-5" type="text" name="country">
                        </div>
                        <span v-if="errors.company" class="help-block" role="alert">
                            <strong>{{errors.company[0]}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Company Email</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.email_company}">
                            <input v-model="form.email_company" class="input--style-5" type="text" name="country">
                        </div>
                        <span v-if="errors.email_company" class="help-block" role="alert">
                            <strong>{{errors.email_company[0]}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">IBAN</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.iban}">
                            <input v-model="form.iban" class="input--style-5" type="text" name="country">
                        </div>
                        <span v-if="errors.iban" class="help-block" role="alert">
                            <strong>{{errors.iban[0]}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">BIC</div>
                    <div class="value">
                        <div class="input-group" :class="{error: errors.bic}">
                            <input v-model="form.bic" class="input--style-5" type="text" name="country">
                        </div>
                        <span v-if="errors.bic" class="help-block" role="alert">
                            <strong>{{errors.bic[0]}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-row m-b-55">
                    <div class="name">Phone</div>
                    <div class="value">
                        <div class="row row-refine">
                            <div class="col-6">
                                <div class="input-group-desc">
                                    <input v-model="area_code" class="input--style-5" type="text" name="area_code">
                                    <label class="label--desc">Area Code</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group-desc">
                                    <input v-model="number" class="input--style-5" type="text" name="phone">
                                    <label class="label--desc">Phone Number</label>
                                </div>
                            </div>
                            <span v-if="errors.phone" class="help-block" role="alert">
                                <strong>{{errors.phone[0]}}</strong>
                            </span>
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
               email_company:null, 
               iban:null,
               bic:null,
               role_id:null
            },
            role:null,
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
            axios.post('/api/user-info-save',this.form)
            .then(res=>{
                let role; 
                if(this.form.role_id == 2){
                    role = 'company'
                }
                if(this.form.role_id == 3){
                    role = 'transferista'
                }
                if(this.form.role_id == 1){
                    role = 'customer'
                }
                localStorage.setItem('role', role) 
                this.$router.push({name:'userInfo'})
            })
            .catch(error=> {this.errors = error.response.data.errors
                console.log(error)}
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