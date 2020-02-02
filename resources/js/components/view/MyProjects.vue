<template>
    
    <main class="pt-5 mx-lg-5 catagoris ">
        <section  id="catagoribody">
            <div class="container mamunurrashid_gig_wraper">
                <div v-show="noProject" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>You haven't submitted any project</strong> 
                </div>
                <div class="mr_card" v-for="(data,index) in projects" :key="index">
                    <div class="mr_card_body">
                        <div class="p-box ">											
                            <a href="" @click=singleProject(data.id) class="p col-md-9">
                                <h5 class="fonts-title">{{data.project_title}}<br><small>Posted {{ data.created_at }}</small></h5>
                                <span class="body-color">
                                    {{data.project_description}}
                                </span>
                            </a>
                            <ul class="col-md-3 text-center">
                                <li class="mb-2"><small>10 bids</small></li>
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
                                    23 Review
                                </span>
                            </p>
                            <p class="col-md-4"><i class="fas fa-google-map"></i>Location</p>
                            <p class="col-md-4">Review</p>
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
            noProject:false,
            flag:true,
            projects:{}
        }
    }
    ,
    methods:{
        singleProject(d){
			console.log(d)
			const id = d
			this.$router.push({name: 'singleProject',params:{
				id: id
				} 
			})
        }
        
    },
    created(){
		axios.get('/api/projects')
		.then(res =>{ 
            this.projects = res.data.data
            if(this.projects.length == 0){
                this.noProject = true
            }
			})
        .catch(error=>{
            console.log(error)
        })

		if(User.customer() || User.company() ){
			this.flag = false
		}
    }
}
</script>
<style scoped>

</style>