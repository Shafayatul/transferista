<template>
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">Registration Form</h2>
        </div>
        <div class="card-body">
            <form @submit.prevent="register">
                <div class="form-row m-b-55">
                    <div class="name">Name</div>
                    <div class="value">
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group-desc">
                                    <input v-bind="form.first_name" class="input--style-5" type="text" name="first_name" required>
                                    <span v-if="errors.name" class="help-block" role="alert">
                                        <strong>{{errors.first_name[0]}}</strong>
                                    </span>
                                    <label class="label--desc">first name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group-desc">
                                    <input v-bind="form.last_name" class="input--style-5" type="text" name="last_name" required>
                                    <span v-if="errors.name" class="help-block" role="alert">
                                        <strong>{{errors.last_name[0]}}</strong>
                                    </span>
                                    <label class="label--desc">last name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Email</div>
                    <div class="value">
                        <div class="input-group">
                            <input v-bind="form.email" class="input--style-5" type="email" name="email" required>
                            <span v-if="errors.email" class="help-block" role="alert">
                                <strong>{{errors.email[0]}}</strong>
                            </span> 
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Password</div>
                    <div class="value">
                        <div class="input-group">
                            <input v-bind="form.password" class="input--style-5" type="password" name="password" required>
                            <span v-if="errors.password" class="help-block" role="alert">
                                <strong>{{errors.password[0]}}</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Confirm Password</div>
                    <div class="value">
                        <div class="input-group">
                            <input v-bind="form.confirm_password" class="input--style-5" type="password" name="confirm_password" required>
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
                confirm_password: null
            },
            errors:{}
        }
    },
    components:{
        AuthLayout
    },
    methods:{
        register(){
            axios.post('',this.form)
            .then(res => this.$router.push({name:''}) )
            .catch(error=> this.errors = error.response.data.errors)
        }
    },
    created(){
        this.$emit(`update:layout`, AuthLayout)
    }
}
</script>