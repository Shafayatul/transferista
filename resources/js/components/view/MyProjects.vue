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
                                <div v-show="data.project_status == 2" class="badge badge-pill badge-info ml-2">On going</div>
                            </a>
                        </div>
                    </div>
                </div>
						  <div class="paginationsarea">
							<div class=" d-flex justify-content-end">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item">
											<a class="page-link" aria-label="Previous" :disabled="meta.current_page == meta.from" @click="getResults(meta.current_page-1)">
												<span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
												<span class="sr-only">Previous</span>
											</a>
										</li>
										<li v-if="meta.current_page-2 >= 1" class="page-item"><a class="page-link" @click="getResults(meta.current_page-2)">{{meta.current_page-2}}</a></li>
										<li v-if="meta.current_page-1 >= 1" class="page-item"><a class="page-link" @click="getResults(meta.current_page-1)">{{meta.current_page-1}}</a></li>
										<li class="page-item active"><a class="page-link">{{meta.current_page}}</a></li>
										<li v-if="meta.current_page+1 <= meta.total" class="page-item"><a class="page-link" @click="getResults(meta.current_page+1)">{{meta.current_page+1}}</a></li>
										<li v-if="meta.current_page+2 <= meta.total" class="page-item"><a class="page-link" @click="getResults(meta.current_page+2)">{{meta.current_page+2}}</a></li>
										
										<li class="page-item">
											<a class="page-link" aria-label="Next" :disabled="meta.current_page == meta.total" @click="getResults(meta.current_page+1)">
												<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
												<span class="sr-only">Next</span>
											</a>
										</li>
									</ul>
								</nav>
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
            arr:new Array(10000).fill(null),
            projects:{},
            center1:{
                project_id:null,
                lat:0.0,
                lng:0.0
            },
            center2:{
                lat:0.0,
                lng:0.0
            },
            directionsDisplay: null,
        }
    }
    ,
    computed:{
         index1(i){
            return this.arr[i]
        }
    },
    methods:{
       
        onTheWay(i){
            console.log(i)
            this.arr[i] = true
        },
        singleProject(d){
			console.log(d)
			const id = d
			this.$router.push({name: 'singleProject',params:{
				id: id
				} 
			})
        },
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
            axios.get('/api/projects?page='+page)
            .then(res =>{ 
                this.projects = res.data.data
                if(this.projects.length == 0){
                    this.noProject = true
                }
                this.meta = res.data.meta;
                })
            .catch(error=>{
                console.log(error)
            })

            if(User.customer() || User.company() ){
                this.flag = false
            }
		}
        
    },
    mounted(){
        this.getResults();
    
         Echo.private('positions')
             .listen('Positions', (e) => {
                 console.log(e.project_id)
                var i = this.projects.findIndex(obj=>obj.id === e.project_id)
                console.log(i)
                this.onTheWay(i)
            }
            
        )
    }
}
</script>
<style scoped>
.page-item.active .page-link {
    z-index: 3 !important;
    color: #fff !important;
    background-color: #007bff !important;
    border-color: #007bff !important;
}
</style>