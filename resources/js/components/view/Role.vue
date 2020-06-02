<template>
          <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Basic Information Form</h2>
                </div>
                <div class="my-body ">
                    <form @submit.prevent="enter">
                        <div class="form-check m-b-20">
                          <input v-model="role"  class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                          <label class="form-check-label" for="exampleRadios1">
                           Customer
                          </label>
                        </div>
                        <div class="form-check">
                          <input v-model="role" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2">
                          <label class="form-check-label" for="exampleRadios2">
                           Company
                          </label>
                        </div>
                        <div class="form-check">
                          <input v-model="role" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="3">
                          <label class="form-check-label" for="exampleRadios3">
                            Transferista
                          </label>
                        </div>
                       
                       
                            <button class="btn btn-primary  btn-lg submit-btn customBtn" type="submit">Confirm</button>
                       
                    </form>
                </div>
            </div>
       
</template>
<script>
import AuthLayout from '../layers/AuthLayout'
export default {
    data(){
        return{
            role: null
        }
    },
   
    methods:{
        enter(){
            if(this.role == 1){
                this.$router.push({
                    name: 'customer',
                    params: {
                        role: this.role
                    }
                })
            }
            if(this.role == 2 || this.role == 3){
                this.$router.push({
                    name: 'form',
                    params: {
                        role: this.role
                    }
                })
            }

        }
    },
    created(){
       this.$emit(`update:layout`,AuthLayout)
    }
}
</script>
<style scoped>
.card-5 {
    padding: 20px;
    max-width: 300px;
}
.customBtn {
 background-color: #000;
 
}
.form-check-input{
   position: inherit !important;
}
</style>