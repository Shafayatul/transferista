<template>
    
    <main class="pt-5 mx-lg-5 " style="height:100vh;">
        <div class="container-fluid mt-5">
            <div class="container emp-profile">
                <div v-show="noProject" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>You haven't bidded any project</strong> 
                </div>
                <div class="mr_card" v-for="(data,index) in projects" :key="index">
                    <div class="mr_card_body">
                        <div class="offset-1">
                            <div class="p-box row ">											
                                <a @click=singleProject(data.id) class="p col-md-9">
                                    <h5 class="fonts-title">{{data.project_title}}<br><small>Bidded {{ data.created_at }} ago</small></h5>
                                    <span class="body-color">
                                        {{data.project_description}}
                                    </span>
                                </a>
                                <ul class="col-md-3 text-center">
                                    <li class="mb-2"><small></small></li>
                                </ul>
                            </div>
                            <div class=" d-flex ">											
                                <p class="sr col-md-4">
                                    <!-- <span class="stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span><br> -->
                                    <span class="review">
                                        Bidded with: {{data.estimated_cost}}$
                                    </span>
                                </p>
                                <p class="col-md-4"><i class="fas fa-google-map"></i>From: {{data.origin_address}}</p>
                                <p class="col-md-4">To: {{data.destination_address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
export default {
    data(){
        return{
            projects:{},
            noProject:false
        }
    },
    created(){
		axios.get('/api/bids')
		.then(res =>{ 
                console.log(res.data)
                this.projects = res.data.data
                if(this.projects.length == 0){
                    this.noProject = true
                }
			})
        .catch(error=>{
            console.log(error)
        })
    }
}
</script>
<style scoped>

</style>