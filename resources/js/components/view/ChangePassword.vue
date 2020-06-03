<template>
    <main class="pt-5 mx-lg-5" style="height:90vh;">
            <div class=" emp-profile">
            <div class="profile-color col-lg-6 mr-auto">
                <div v-show="error" class="alert alert-warning alert-dismissible fade " role="alert">
                Credentials dont match
                <button @click="error =!error" type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div v-show="success" class="alert alert-warning alert-dismissible fade " role="alert">
                 Paassword changed successfully
                <button @click="success =!success" type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
                        <p class="">Use the form below to change your password. Your password cannot be the same as your username.</p>
                        <form   @submit.prevent="reset" id="passwordForm">
                        <div class="form-group">
                           <input type="password" v-model="form.old_password" class=" form-control pass-input" name="password1" id="password1" placeholder="Previous Password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" v-model="form.new_password" class=" form-control pass-input" name="password1" id="password1" placeholder="New Password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" v-model="form.confirm_password" class=" form-control pass-input" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
                        </div>
                        </form>
                            <button type="submit" class=" btn customBtn btn-load " data-loading-text="Changing Password..." >Submit</button>
                    
            </div>
        </div> 
    </main>
</template>
<script>
export default {
    data(){
        return{
            success:false,
            error:false,
            form:{
                old_password:null,
                new_password: null,
                confirm_password: null
            }
        }
    },
    methods:{
        reset(){
            axios.get('/api/password-update',this.form)
            .then(res=>{
                this.success = true
                this.form.old_password = null
                this.form.new_password = null
                this.form.confirm_password = null
                })
            .catch(error=>this.error = true)
        }
    }
}
</script>
<style scoped>
.customBtn{
    color: #fff;
    background-color: #000;
    border: 0;
    opacity: .9;
}
</style>