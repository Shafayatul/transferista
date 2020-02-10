<template>
    
    <main class="pt-5 mx-lg-5 catagoris ">
        <section  id="catagoribody">
            <div class="container mamunurrashid_gig_wraper">
                <div v-show="noProject" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>You haven't submitted any project</strong> 
                </div>
                <div class="mr_card" v-for="(data,index) in projects" :key="index">
                    <div class="mr_card_body">
                        <div class="p-box d-flex">											
                            <a href="" @click=singleProject(data.id) class="p col-md-9">
                                <h5 class="fonts-title">{{data.project_title}}<br><small>Posted {{ data.created_at }}</small></h5>
                                <span class="body-color">
                                    {{data.project_description}}
                                </span>
                                <div v-show="data.project_status == 2" class="badge badge-pill badge-info ml-2">On going</div>
                            </a>
                            <button   @click="modal(data.id)"  v-if="data.project_status == 3"  class="btn btn-success" style="height: 36px;" ><a class="font-color" >Review</a></button>
                        
                            <Paypal :project=data :t_id=data.transferista_id  v-if="data.project_status == 3 || data.project_status == 4"></Paypal>
                        </div>
                    </div>
                    <div  class="modal fade" :id="data.id"  tabindex="-1" role="dialog" aria-labelledby="oneModalLabel" aria-hidden="true">   
                        <MyRating :project="data"  :id="data.id"></MyRating>
                    </div>
                </div>
                <div class="paginationsarea">
                    <div class=" d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <button class="page-link" aria-label="Previous" v-show="left" :disabled="!left"   @click="getResults1(meta.current_page-1) , left-- , right++">
                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                </li>
                                <li v-if="meta.current_page-2 >= 1" class="page-item"><a class="page-link" @click="getResults2(meta.current_page-2)">{{meta.current_page-2}}</a></li>
                                <li v-if="meta.current_page-1 >= 1" class="page-item"><a class="page-link" @click="getResults2(meta.current_page-1)">{{meta.current_page-1}}</a></li>
                                <li class="page-item active"><a class="page-link">{{meta.current_page}}</a></li>
                                <li v-if="meta.current_page+1 <= meta.total" class="page-item"><a class="page-link" @click="getResults2(meta.current_page+1)">{{meta.current_page+1}}</a></li>
                                <li v-if="meta.current_page+2 <= meta.total" class="page-item"><a class="page-link" @click="getResults2(meta.current_page+2)">{{meta.current_page+2}}</a></li>
                                
                                <li class="page-item">
                                    <button class="page-link"  :disabled="right==1" aria-label="Next"  @click="getResults1(meta.current_page+1) , right-- , left++">
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </button>
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
import Paypal from './Paypal'
import MyRating from './rating/MyReview'
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
            reviewed:false,
            meta:{
                current_page:null
            },
            left: 0,
            right:null

        }
    },
    components:{
        Paypal,MyRating
    },
    computed:{
         index1(i){
            return this.arr[i]
        }
    },
    methods:{
        
		modal(id){
            $(`#${id}`).modal('show');
        },
       
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
		getResults1(page = 1) {
			// v-show="meta.current_page-2 >= 1"
			// v-show="meta.current_page+2 <= meta.total"
			// console.log(this.left+' '+this.right)
			
			if(this.right+1>this.meta.total){
				this.right = this.meta.total
			}

			
			// axios.get('example/results?page=' + page)
			// 	.then(response => {
				// 		this.laravelData = response.data;
			// 	});
			axios.get('/api/projects?page=' + page)
			.then(res =>{ 
					this.projects = res.data.data
					this.count = this.projects.length;
					this.meta = res.data.meta;
					if(this.right == null){
						this.right = this.meta.total
					}
				})
			.catch(error=>console.log(error))
		},
		getResults2(page) {
			// v-show="meta.current_page-2 >= 1"
			// v-show="meta.current_page+2 <= meta.total"
			// console.log(this.left+' '+this.right)
			this.left = page -1
			this.right = this.meta.total - this.left
			// axios.get('example/results?page=' + page)
			// 	.then(response => {
				// 		this.laravelData = response.data;
			// 	});
			axios.get('/api/projects?page=' + page)
			.then(res =>{ 
					this.projects = res.data.data
					this.count = this.projects.length;
					this.meta = res.data.meta;
				})
			.catch(error=>console.log(error))

            if(User.customer() || User.company() ){
                this.flag = false
            }
		}
        
    },
    created(){
         this.getResults1();
    },
    mounted(){
       

        EventBus.$on('CustomerReviewed',(id)=>{
            let i = this.projects.findIndex(obj =>obj.id === id)
            console.log(i)
            this.projects[i].project_status = 4
        })

        EventBus.$on('Paid',(id)=>{
            this.getResults();
            let i = this.projects.findIndex(obj =>obj.id === id)
            console.log(i)
            this.projects[i].project_status = 5
                
        })
        //  Echo.private('positions')
        //      .listen('Positions', (e) => {
        //          console.log(e.project_id)
        //         var i = this.projects.findIndex(obj=>obj.id === e.project_id)
        //         console.log(i)
        //         this.onTheWay(i)
        //     }
            
        // )
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