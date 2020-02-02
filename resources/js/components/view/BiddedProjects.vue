<template>
    
    <main class=" mx-lg-5 catagoris" >
       <section  id="catagoribody">
            <div class="container mamunurrashid_gig_wraper">
                <div v-show="noProject" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>You haven't bidded any project</strong> 
                </div>
                <div class="mr_card" v-for="(data,index) in projects" :key="index">
                    <div class="mr_card_body">
                        <div class="p-box  ">											
                            <a href="" @click=singleProject(data.id) class="p ">
                                <h5 class="fonts-title">{{data.project_title}}<br><small>Bidded {{ data.created_at }}</small></h5>
                                <div class="project-body pt-2">
                                    <span class="body-color">
                                        {{data.project_description}}
                                    </span>
                                </div>
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
                                    Total bidded with: {{data.estimated_cost}}$
                                </span>
                            </p>
                            <p class="col-md-4"><i class="fas fa-google-map"></i>From: {{data.origin_address}}</p>
                            <p class="col-md-4">To: {{data.destination_address}}</p>
                        </div>
                    </div>
                </div>
            </div>
        
       </section>
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
    methods:{
        singleProject(d){
			const id = d
			this.$router.push({name: 'singleProject',params:{
				id: id
				} 
			})
        }
    }
    ,
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