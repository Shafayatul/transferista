<template> 
    <!-- -->

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="submit">   
        <star-rating v-model="form.rating"></star-rating>      
        <div class="form-group my-text">
            <textarea v-model="form.rating_text" class="form-control" name="review" required rows="5" width="100%"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" @click="submit" class="btn btn-success btn-lg btn-block" data-dismiss="modal">Submit</button>
        </div>
    </form> 
      </div>

    </div>
  </div>

</template>
<script>
import StarRating from 'vue-star-rating'
export default {
    props:['id','project'],
    data(){
        return{
            form:{
                project_id: this.id,
                rating:null,
                rating_text:null

            }
        }
    },
    components: {
        StarRating
    },
    methods:{
        submit(){
            console.log('---')
            console.log(this.form)
            axios.post('/api/ratings',this.form)
            .then(res=>{
                console.log('-----')
                EventBus.$emit('reviewed')
                EventBus.$emit('CustomerReviewed',this.form.project_id)
            })
            .catch(error=>console.log(error))
        }
    },
    mounted(){

    }
}
</script>
<style scoped>
    .form-horizontal .form-group {
    margin-right: 15px !important;
    margin-left: 15px !important;
}
.my-text{
    margin-top: 15px !important;

}
</style>