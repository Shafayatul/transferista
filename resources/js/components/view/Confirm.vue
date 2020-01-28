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
                        Transferista Info</h3>
                </div>
                <ul class="list-group">
                    <a class="list-group-item">{{bid.bid_transferista_name}}</a>
                    <a class="list-group-item">{{bid.bid_amount}}</a>
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
    methods:{
        confirm(){
            this.accepted(this.bid.bid_project_id,this.bid)
        }
    }
}

</script>