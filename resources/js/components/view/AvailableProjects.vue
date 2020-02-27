<template>

    <div >


        <section id="banner">
               <v-carousel >
                    <v-carousel-item
                    v-for="(item,i) in items"
                    :key="i"
                    :src="item.src"
                    >
                       <div class="banner-text">
                                <div class="chid-pernt">
                                    <div class="child">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2>WELCOME TO</h2>
                                                    <h1>sky<span>ways</span></h1>
                                                    <a class="btn free-get" href="#">Get a free quote</a>
                                                    <a class="btn" href="#">Raed More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </v-carousel-item>
                </v-carousel>
        </section>

        <main class="main-containt">
        <section class="feature-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="feature-inner">
                            <div class="image-holder">
                                <a href="#">
                                	<img src="front/images/featured-image1.jpg" alt="" />
                                </a>
                            </div>
                            <div class="text-box">
                                <h3><a href="#">Air Freight</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. aenean nec eu augue posuere
                                    fermentem ut non</p>
                                <a class="btn" href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="feature-inner">
                            <div class="image-holder">
                                <a href="#"><img src="front/images/featured-image2.jpg" alt="" /></a>
                            </div>
                            <div class="text-box">
                                <h3><a href="#">Air Freight</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. aenean nec eu augue posuere
                                    fermentem ut non</p>
                                <a class="btn" href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="feature-inner">
                            <div class="image-holder">
                                <a href="#"><img src="front/images/featured-image3.jpg" alt="" /></a>
                            </div>
                            <div class="text-box">
                                <h3><a href="#">Air Freight</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. aenean nec eu augue posuere
                                    fermentem ut non</p>
                                <a class="btn" href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="requst-men">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="image-holder">
                            <!-- <img src="front/images/request-quote-image.png" alt="" /> -->
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="request-quote">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="haddings">
                            <div class="hadding-inner">
                                <h2>Request a quote </h2>
                                <span><img src="front/images/hedding-ven-image.png" alt="" /></span>
                            </div>
                            <p>We have wide network of offices in all major locations to help you.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="quote-form">
                            <form>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <!-- <input type="text" placeholder="Location" /> -->
                                            <div class="form-control ">
	                                            <gmap-autocomplete class="no-border"
													@place_changed="setPlace1">
												</gmap-autocomplete>
	                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <!-- <input type="text" placeholder="To Destination" /> -->
                                            <div class="form-control ">
												<gmap-autocomplete class="no-border"
													@place_changed="setPlace2">
												</gmap-autocomplete>
											</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <!-- <input type="text" placeholder="Person / Cargo" /> -->
                                        <select v-model="size" class="form-control custom-select" id="exampleFormControlSelect">
											<option value="5">S: 100cm</option>
											<option value="7.5">M: 150cm</option>
											<option value="10">L: 180cm</option>
											<option value="15">XL: 200cm</option>
											<option value="20">XXL: 250cm</option>
											<option value="25">XXXL: 300cm</option>
										</select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <!-- <input type="text" placeholder="E-mail or number" /> -->
                                            <div class="form-control">
												<h3>${{estimated_price}}</h3>

											</div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea>Message</textarea>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <div class="form-group last-group">
                                            <!-- <input class="btn" type="submit" value="get a quote" /> -->
                                            <button  @click="create" class="btn">Get A Quote</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding our-services home2-our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="haddings">
                            <div class="hadding-inner">
                                <h2>OUR <strong>SERVICES</strong></h2>
                                <span><img src="front/images/hedding-ven2-image.png" alt="" /></span>
                            </div>
                            <p>We have wide network of offices in all major locations to help you.</p>
                        </div>
                    </div>
                </div>
                <div class="our-services-inner">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blue-grid clearfix">
                                <div class="image-holder">
                                    <div class="chid-pernt">
                                        <div class="child">
                                            <i class="flaticon-air-transport"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-box">
                                    <h3>Air Freight</h3>
                                    <p>As a market leader in global air freight forwarding</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blue-grid green-grid clearfix">
                                <div class="image-holder">
                                    <div class="chid-pernt">
                                        <div class="child">
                                            <i class="flaticon-delivery"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-box">
                                    <h3>Cargo Transport</h3>
                                    <p>As a market leader in global air freight forwarding</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blue-grid red-grid clearfix">
                                <div class="image-holder">
                                    <div class="chid-pernt">
                                        <div class="child">
                                            <i class="flaticon-airplane-around-earth"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-box">
                                    <h3>Worldwide Transport</h3>
                                    <p>As a market leader in global air freight forwarding</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blue-grid orenge-grid clearfix">
                                <div class="image-holder">
                                    <div class="chid-pernt">
                                        <div class="child">
                                             <i class="flaticon-transport"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-box">
                                    <h3>Logistics Services</h3>
                                    <p>As a market leader in global air freight forwarding</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blue-grid yellow-grid clearfix">
                                <div class="image-holder">
                                    <div class="chid-pernt">
                                        <div class="child">
                                             <i class="flaticon-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-box">
                                    <h3>24/7 Special Security</h3>
                                    <p>As a market leader in global air freight forwarding</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blue-grid jamni-grid clearfix">
                                <div class="image-holder">
                                    <div class="chid-pernt">
                                        <div class="child">
                                           <i class="flaticon-warehouse-with-boxes"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-box">
                                    <h3>Warehouse & Storage</h3>
                                    <p>As a market leader in global air freight forwarding</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding our-blog home2-our-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="haddings">
                            <div class="hadding-inner">
                                <h2>OUR <strong>blog</strong></h2>
                                <span><img src="front/images/hedding-ven2-image.png" alt="" /></span>
                            </div>
                            <p>We have wide network of offices in all major locations to help you.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="inner-blog">
                            <div class="image-holder">
                                <a href="#"><img src="front/images/home2-blog-image1.jpg" alt="" /></a>
                            </div>
                            <div class="text-box">
                                <h3><a href="#">INTERNATIONAL FREIGHT</a></h3>
                                <span>12 june 2016, by <strong><a href="#">john</a></strong></span>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </p>
                                <a href="#"> Read More <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="inner-blog">
                            <div class="image-holder">
                                <a href="#"><img src="front/images/home2-blog-image2.jpg" alt="" /></a>
                            </div>
                            <div class="text-box">
                                <h3><a href="#">INTERNATIONAL FREIGHT</a></h3>
                                <span>12 june 2016, by <strong><a href="#">john</a></strong></span>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </p>
                                <a href="#"> Read More <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="inner-blog">
                            <div class="image-holder">
                                <a href="#"><img src="front/images/home2-blog-image3.jpg" alt="" /></a>
                            </div>
                            <div class="text-box">
                                <h3><a href="#">INTERNATIONAL FREIGHT</a></h3>
                                <span>12 june 2016, by <strong><a href="#">john</a></strong></span>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </p>
                                <a href="#"> Read More <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="col-action home2-col-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="text-box">
                            <h2>don't know where to start here</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="start-now">
                            <a class="btn" href="#">start now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </main>
    </div>
</template>
<script src="vue-google-maps.js"></script>
<script>
// import Axios from 'axios'
// Axios.defaults.baseURL = 'http://192.168.0.101:8000'
import bid from './Bid'
import navbar from "../layers/navbar1";
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
            right:null,
             items: [
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg',
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg',
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg',
          },
        ],
		}
	},
    components:{
		navbar,
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


    created(){
		this.loading = false
		if(User.customer() || User.company() || User.employee() || !User.loggedIn()){

			this.flag = false
		}
		this.$emit(`update:layout`,navbar)
    }
}
</script>
<style scoped>
.v-window__prev, .v-window__next {
    background-color:
    rgba(250, 250, 250, .10);
    -webkit-border-radius: 63px 63px 63px 63px/ 108px 108px 72px 72px;
    border-radius: 50% 50% 50% 50%/60% 60% 40% 40%;
    width: 71px;
    height: 81px;
    opacity: 1;
    padding: 23px;
    margin: 0;
    font-size: 24px;
    transform: rotate(90deg);
    transition: all 0.5s ease-in-out;
}
.no-border{
	border: none !important;
	background: none !important;
	padding: 0 !important;
	padding-right: 5px !important;
	margin-top: -5px !important;
}
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
.v-window__next{
    right: 0%;
}

</style>
