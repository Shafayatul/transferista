<template>
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="container emp-profile">
                <div class="well">
                    <div v-if="success" class="alert alert-warning alert-dismissible fade show" role="alert">
                        
                        <strong>You haven't Submitted any projects</strong> 
                        
                    </div>
                    <h1 class="text-center">Projects</h1>
                    <div class="list-group">
                        <a v-for="project in projects" :key="project.id" href="#" class="list-group-item active">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img class="media-object img-rounded img-responsive"  src="http://placehold.it/350x250" alt="placehold.it/350x250" >
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h4 class="list-group-item-heading"> {{project.title}} </h4>
                                <p class="list-group-item-text"> {{project.description}}</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <h2> {{project.bids}} <small> Bids </small></h2>
                                <button @click="showProjectDetails(project.id)" type="button" class="btn btn-default btn-lg btn-block"> See bids </button>
                                <div class="stars">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </div>
                                <p> Average 4.5 <small> / </small> 5 </p>
                            </div>
                        </a>
                    </div>
                </div>          
            </div>
        </div> 
    </main>
</template>
<script>
export default {
    data(){
        projects:null
    },
    methods:{
        showProjectDetails(id){
            this.$router.push({
                name:'projectDetails',
                params: id
            })
        }
    },
    created(){
        axios.get('/api/projects')
        .then(res=>this.projects = res.data.data)
        .catch(error=> this.success = true)
    }
}
</script>