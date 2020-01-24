<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form @submit.prevent="update">
                <div class="modal-body">
                    <div class=" model-div">
                    <span class="md-btn addBtn">First Name</span>
                    <input v-model="form.first_name"  class="form-control md-form">
                    </div>
                    <div class=" model-div">
                    <span class="md-btn addBtn">Last Name</span>
                    <input v-model="form.last_name"   class="form-control md-form">
                    </div>
                    <div class=" model-div">
                    <span class="md-btn addBtn">Phone Number</span>
                    <input v-model="form.phone"  class="form-control md-form">
                    </div>
                    <div class=" model-div">
                    <span class="md-btn addBtn">E-mail</span>
                    <input v-model="form.email" class="form-control md-form">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" @click="editEmployee">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    props:['employee','update'],
    data(){
        return{
            form:{
                id: this.data.id,
                amount: this.data.amount
            }
        }
    },
    methods: {
        biding() {
            this.bid(this.form)
            // this.$emit('update',{
            //     first_name:this.form.first_name,
            //     last_name:this.form.last_name,
            //     email: this.form.email,
            //     phone:this.form.phone
            // });
        }
    }
}
</script>
    