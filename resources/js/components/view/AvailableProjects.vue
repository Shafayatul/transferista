<template>
	
    <div class="body-class catagoris">	
		
        <!-- <grid-loader :loading="loading" :color="color"  :margin="margin" :radius="radius"></grid-loader> -->
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
				<div class="row">
					<div class="col-md-3">
                        <label class=" label-title">Origin:</label>
			
						<gmap-autocomplete
							@place_changed="setPlace1">
						</gmap-autocomplete>
					</div>
					<div class="col-md-3">
                        <label class=" label-title">Destination:</label>
			
						<gmap-autocomplete
							@place_changed="setPlace2">
						</gmap-autocomplete></div>
					<div class="col-md-3">	
                        <label class=" label-title">Product Size</label>				
						<select  v-model="size" class="form-control custom-select" id="exampleFormControlSelect1">
								<option value="5" >S: 100cm</option>
								<option value="7.5">M: 150cm</option>
								<option value="10">L: 180cm</option>
								<option value="15">XL: 200cm</option>
								<option value="20">XXL: 250cm</option>
								<option value="25">XXXL: 300cm</option>
						</select></div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-sm-8">
								<h3>Estimated Price:</h3>
								${{estimated_price}}
							</div>
							<div class="col-sm-4">
								<button  @click="create" class="btn btn-success">Create</button>
							</div>
						</div>
					</div>
				</div>
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
						<div class="mr_card" v-if="count==0">
							<div class="mr_card_body card-body p-3">
								<h2>There is no available project at this moment.</h2>	
							</div>								
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
											<button class="page-link" aria-label="Previous" v-show="left" :disabled="!left"   @click.prevent="getResults1(meta.current_page-1) , left-- , right++">
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
											<button class="page-link"  :disabled="right==1" aria-label="Next"  @click.prevent="getResults1(meta.current_page+1) , right-- , left++">
												<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
												<span class="sr-only">Next</span>
											</button>
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
<script src="vue-google-maps.js"></script>
<script>
// import Axios from 'axios'
// Axios.defaults.baseURL = 'http://192.168.0.101:8000'
import bid from './Bid'
import DashboardLayout from "../layers/DashboardLayout";
export default {
	data(){
		return{
			size: null,
			from: null,
			to: null,
			center1:{
				lat: null,
				lng: null
			},
			center2:{
				lat:null,
				lng:null
			},
			seleted: 0,
			count: null,
			query: null,
			filterBy: null,
			// selectItem: null,
			projects:{},
			meta: {},
			success: false,
			flag:true,
			bidded: false,
            layout: 'div',
            color: '#3AB982',
            height: '35px',
            width: '4px',
            margin: '2px',
            radius: '2px',
			loading: true,
			left:0,
			right:null
		}
	},
    components:{
		DashboardLayout,
		bid
	},
	beforeCreate(){
		this.loading = true
	},
	computed:{
		estimated_price(){
			if(this.center1.lng !== null && this.center2.lng !==null && this.size!==null ){
				let dist =  this.getDistance()
				let cost = parseFloat(dist*1.5 + parseFloat(this.size) )
				return cost.toFixed(2)
			}
		}
	},
	methods:{
		create(){
			if((User.customer() || User.company()) && this.center1.lat !==null && this.center2.lat !== null && this.size !== null){
				this.$router.push({
					name: 'create',
					params:{
						center1: this.center1,
						center2: this.center2,
						size: this.size,
						place1: this.from,
						place2: this.to
					}
				})
			}
			if(!User.loggedIn())
			this.$router.push('login')
			
		},
        getDistance(){

            var radlat1 = Math.PI * this.center1.lat/180;
            var radlat2 = Math.PI * this.center2.lat/180;
            var theta = this.center1.lng-this.center2.lng;
            var radtheta = Math.PI * theta/180;
            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
            if (dist > 1) {
                dist = 1;
            }
            dist = Math.acos(dist);
            dist = dist * 180/Math.PI;
            dist = dist * 60 * 1.1515;
            dist = dist * 1.609344 
            // console.log(dist)
            return dist;
        },
		setPlace1(place){
			this.from = place
			this.center1 = {
				lat: place.geometry.location.lat(),
				lng: place.geometry.location.lng()
			};
		},
		setPlace2(place){
			this.to = place
			this.center2 = {
				lat: place.geometry.location.lat(),
				lng: place.geometry.location.lng()
			};
		},
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
		getResults1(page = 1) {
			
			if(this.right+1>this.meta.total){
				this.right = this.meta.total
			}

		
			axios.get('/api/project-list/available?page=' + page)
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
			axios.get('/api/project-list/available?page=' + page)
			.then(res =>{ 
					this.projects = res.data.data
					this.count = this.projects.length;
					this.meta = res.data.meta;
				})
			.catch(error=>console.log(error))
		}
	},
	mounted() {
		// Fetch initial results
		this.getResults1();
	},
	
    created(){
		this.loading = false
		if(User.customer() || User.company() || User.employee() || !User.loggedIn()){
			
			this.flag = false
		}
		this.$emit(`update:layout`,DashboardLayout)
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