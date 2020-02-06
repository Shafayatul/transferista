<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bid</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="model-div">
                    <span class="md-btn addBtn">Amount</span>
                    <input v-model="form.amount"  class="form-control md-form">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  >Close</button>
                <button  class="btn btn-primary" data-dismiss="modal" @click="biding">Submit</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['id','bid'],
    data(){
        return{
            form:{
                id: this.id,
                amount: null
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
    