<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit car</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form @submit.prevent="update">
                <div class="modal-body">
                    <div class=" model-div">
                    <span class="md-btn addBtn">Brand</span>
                    <input v-model="form.brand"  class="form-control md-form">
                    </div>
                    <div class=" model-div">
                    <span class="md-btn addBtn">Type</span>
                    <input v-model="form.type"   class="form-control md-form">
                    </div>
                    <div class=" model-div">
                    <span class="md-btn addBtn">Number Plate</span>
                    <input v-model="form.plate"  class="form-control md-form">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary" @click="editCar">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    props:['car','update'],
    data(){
        return{
            form:{
                id: this.car.id,
                brand: this.car.brand,
                type: this.car.type,
                plate: this.car.plate
            }
        }
    },
    methods: {
        editCar() {
            this.update(this.form)
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