<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit car</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Transferista Info
                    </h3>
                </div>
                <ul class="list-group">
                    <a class="list-group-item">Name:        {{bid.bid_transferista_name}}</a>
                    <a class="list-group-item">Bidded With: {{bid.bid_amount}}</a>
                    <a class="list-group-item">Vat:         {{bid.bid_transferista_vat}}</a>
                    <a class="list-group-item">Total:             {{totalAmount}}</a>
                </ul>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-dismiss="modal" @click="confirm">Confirm</button>
            </div>
        </div>
    </div>    
</template>
<script>
export default {
    props:['bid','accepted'],
    data(){
        return{
            total:null
        }
    },
    methods:{
        confirm(){
            this.accepted(this.bid.bid_project_id,this.bid)
        }
    },
    computed:{
        totalAmount(){
            return (parseFloat(this.bid.bid_amount) +(parseFloat(this.bid.bid_amount) * (parseFloat(this.bid.bid_transferista_vat) / 100)))
        }
    }
}

</script>