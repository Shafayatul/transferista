<template> 
    <form @submit.prevent ="submit">   
        <star-rating v-model="form.rating"></star-rating>      
        <div class="form-group">
            <textarea v-model="form.rating_text" class="form-control col-5" name="review" required rows="5" cols="5"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
    </form>
</template>
<script>
import StarRating from 'vue-star-rating'
export default {
    props:['id'],
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
            axios.post('/api/ratings',this.form)
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
</style>