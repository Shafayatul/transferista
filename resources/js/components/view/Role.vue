<template>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <br>
        <br>
        <br>
        <br>
        <div class="basic-from">
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
                          <input v-model="role" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="3">
                          <label class="form-check-label" for="exampleRadios2">
                            Transferista
                          </label>
                        </div>
                       
                        <div class="margin-1">
                            <button class="btn btn--radius-2 btn-success" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import DashboardLayoutVue from '../layers/DashboardLayout.vue'
export default {
    data(){
        return{
            role: null
        }
    },
    components:{
        DashboardLayoutVue
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
        this.$emit(`update:layout`, DashboardLayoutVue)
    }
}
</script>