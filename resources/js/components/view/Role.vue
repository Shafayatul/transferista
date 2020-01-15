<template>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="basic-from">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Basic Information Form</h2>
                </div>
                <div class="my-body ">
                    <form @submit.prevent="enter">
                        <div class="form-check m-b-20">
                          <input v-model="form.role"  class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="customer" checked>
                          <label class="form-check-label" for="exampleRadios1">
                           Customer
                          </label>
                        </div>
                        <div class="form-check">
                          <input v-model="form.role" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="company">
                          <label class="form-check-label" for="exampleRadios2">
                           Company
                          </label>
                        </div>
                        <div class="form-check">
                          <input v-model="form.role" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="transferista">
                          <label class="form-check-label" for="exampleRadios2">
                            Transferista
                          </label>
                        </div>
                       
                        <div class="margin-1">
                            <button class="btn btn--radius-2 btn-success" type="submit">Register</button>
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
            form:{
                role: 'customer'
            }
        }
    },
    components:{
        DashboardLayoutVue
    },
    methods:{
        enter(){
            axios.post('',this.form)
        }
    },
    created(){
        this.$emit(`update:layout`, DashboardLayoutVue)
    }
}
</script>