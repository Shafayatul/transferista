<template>
	
    <div class="body-class catagoris">	
		
        <section id="catagoribody" class="catagoribody">
			<div class="container">
			<GmapMap
			  :center="{lat:10, lng:10}"
			  :zoom="7"
			  map-type-id="terrain"
			  style="width: 100%; height: 50vh;"
			>
			  <GmapMarker
			    :key="index"
			    v-for="(m, index) in markers"
			    :position="m.position"
			    :clickable="true"
			    :draggable="true"
			    @click="center=m.position"
			  />
			</GmapMap>
			</div>
            <div class="container mt-5 search-section">
				<div class="row">
					<div class="col-md-3">
                        <label class=" label-title">Origin:</label>
			            <div class="form-control">
							<gmap-autocomplete
								@place_changed="setPlace1">
							</gmap-autocomplete>
						</div>
					</div>
					<div class="col-md-3">
                        <label class=" label-title">Destination:</label>
			            <div class="form-control">
						<gmap-autocomplete
							@place_changed="setPlace2">
						</gmap-autocomplete>
					</div>
					</div>
					<div class="col-md-3">	
                        <label class=" label-title">Product Size:</label>				
						<select  v-model="size" class="form-control custom-select" id="exampleFormControlSelect1">
								<option value="5" >S: 100cm</option>
								<option value="7.5">M: 150cm</option>
								<option value="10">L: 180cm</option>
								<option value="15">XL: 200cm</option>
								<option value="20">XXL: 250cm</option>
								<option value="25">XXXL: 300cm</option>
						</select></div>
					   <div class="col-md-3">
					        <label class="label-title">Estimated Price:</label>						
							<div class="form-control">
								<h3>${{estimated_price}}</h3>
								
							</div>
						
						</div>

					</div>
					<div class="col-md-12 text-center mt-5">  <button  @click="create" class="btn btn-light text-center btn-lg">Create</button></div>
				 
				<div class="row mamunurrashid_gig_wraper">
					
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
									
								</div>
							<div  class="modal fade" :id="data.id"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<bid  :bid="bid" :data="data"></bid>
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
.catagoribody{
  background: url('/../img/bg.jpg') no-repeat center center fixed !important;
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  width: 100%;
  height: auto;
  padding-bottom: 10%;
  padding-top:10%; 
}
.label-title{
	color: #fff;
	font-size: 22px;
}
.search-section{
	background: #dfe1d573;
box-shadow: 10px 5px 10px 10px
rgba(0, 0, 0, 0.19);
padding-top: 2%;
}
</style>