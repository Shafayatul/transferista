<template>
    <div class="body-class catagoris">	
        <section id="catagoribody">
			<div class="container">
			<div class="row">
					
					<!-- <div class="col-md-12">
						 <div class="basic-search">
							<div class="input-field">
							<input id="search" type="text" placeholder="Type Keywords" />
							<div class="icon-wrap">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
								</svg>
							</div>
							</div>
						</div>
					</div> -->
				</div>
		</div>	
            <div class="container">
				<div class="row mamunurrashid_gig_wraper">
					<!-- <div class="col-lg-3 order-last order-lg-first">
                        <div class="mr_aside">
                            <h3>Filters</h3>
							<div class="filter-by m-4">
								<p class="p-2">Short By :</p>
								<form action="#">
									<select class="mr_select w-100">
										<option value="1">Best Selling</option>
										<option value="2">New</option>
										<option value="3">Popular</option>
										<option value="4">Tranding</option>
									</select>
								</form>
							</div>
							<div class="filter-by m-4">
								<p class="p-2">Duration :</p>
								<form action="#">
									<select  class="mr_select w-100" >
										<option value="latest">Latest</option>
										<option value="2">New</option>
										<option value="3">Popular</option>
										<option value="4">Tranding</option>
									</select>
								</form>
							</div>
						
                    	</div>
                    </div> -->
					<div class="col-lg-12 order-first order-lg-last">
						<div v-if="success" class="alert alert-warning alert-dismissible fade show" role="alert">
								You should check in on some of those fields below.
							<button @click="success = !success" type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="mr_card" v-for="(data,index) in projects" :key="index">
							<div class="mr_card_body card-body p-3">									
																		
										<a @click=singleProject(data.id) class="p " href="">
											<h5 class="fonts-title">{{data.project_title}}<br><small>Posted {{ data.created_at }}</small></h5>
											<div class="card-text">
												<span class="body-color">
													{{data.project_description}}
												</span>
											</div>
										</a>
										<br>
										<button v-show="flag" class="btn btn-success" @click=singleProject(data.id) ><a class="font-color" >Bid Now</a></button>
										<br>
										<!-- <div class=" m-2 d-flex">
											<p class="col-md-4">$10</p>
											<p class="col-md-4">10 bid</p>
											<p class="col-md-4"><button v-show="flag" class="btn btn-success" @click=singleProject(data.id) ><a class="font-color" >Bid Now</a></button></p>
										</div> -->

								
									<!-- <div class=" d-flex  ">											
										<p class="sr col-md-4">
											<span class="stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span><br>
											<span class="review">
												23 Review
											</span>
										</p>
										<p class="col-md-4"><i class="fas fa-google-map"></i>Location</p>
										<p class="col-md-4">Review</p>
									</div> -->
								</div>
							<div  class="modal fade" :id="data.id"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<bid  :bid="bid" :data="data"></bid>
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
            	
				</div>
            </div>
															
        </section>
    </div>
</template>
<script>
// import Axios from 'axios'
// Axios.defaults.baseURL = 'http://192.168.0.101:8000'
import bid from './Bid'
import DashboardLayout from "../layers/DashboardLayout";
export default {
	data(){
		return{
			seleted: 0,
			query: null,
			filterBy: null,
			// selectItem: null,
			projects:{},
			meta: {},
			success: false,
			flag:true,
			bidded: false
		}
	},
    components:{
		DashboardLayout,
		bid
	},
	methods:{
		singleProject(d){
			console.log(d)
			const id = d
			this.$router.push({name: 'singleProject',params:{
				id: id
				} 
			})
		},
		modal(index){
            $(`#${ this.projects[index].id}`).modal('show');
		}
		,
		bid(bidData){
			if(!User.transferista()){
				window.location('/register')
			}
			axios.post('/api/bids',bidData)
			.then(res=>{
				this.bidded = true
			}
			)
		},
		// sortBy(value){
		// 	if(value == "latest"){
		// 		this.sortByDate()
		// 	}
		// },
		// sortByDate(){
		// 	this.showed.sort((a,b)=>{
		// 		return a.getTime() - b.getTime();
		// 	})
		// }
		itemClicked(){
			this.seleted = index;
			this.selectItem();
		},
		selectItem(){
			this.selectItem = this.matches[this.seleted];
			this.visible = null;
		},
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			console.log('1111111111111');
			// axios.get('example/results?page=' + page)
			// 	.then(response => {
				// 		this.laravelData = response.data;
			// 	});
			axios.get('/api/project-list/available?page=' + page)
			.then(res =>{ 
				this.projects = res.data.data
				console.log('2312321');
				this.meta = res.data.meta;
				console.log(res.data.meta);
				})
			.catch(error=>console.log(error))
		}
	},
	mounted() {
			console.log('44444444444');
		// Fetch initial results
		this.getResults();
	},
	
    created(){
		this.$emit(`update:layout`,DashboardLayout)
		


		if(User.customer() || User.company() || !User.loggedIn()){
			
			this.flag = false
		}
		
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