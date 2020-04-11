<template>

    <div >
    <div class="site-banner">
        <div class="banner-wrapper ">
            <div class="banner-inner">
                <!-- <div class="banner-content container text-center container-full-width"> -->
                    <!-- <div class="container"> -->
                        
                        <div class="request-quote">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 sliderNav">
                                    </div>
                                    <div class="col-md-5 col-sm-12 booking_block">
                                        <div class="quote-form">
                                            <h1>Book a Service now</h1>
                                            <form>
                                                
                                                        <div class="form-group">
                                                            <!-- <input type="text" placeholder="Location" /> -->
                                                            <div class="form-control " style="height:3rem;">
                                                                <gmap-autocomplete  class="no-border"  :placeholder="placeholderValue"
                                                                    @place_changed="setPlace1">
                                                                </gmap-autocomplete>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <!-- <input type="text" placeholder="To Destination" /> -->
                                                            <div class="form-control " style="height:3rem;">
                                                                <gmap-autocomplete  class="no-border" placeholder="To"
                                                                    @place_changed="setPlace2">
                                                                </gmap-autocomplete>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <!-- <input type="text" placeholder="Person / Cargo" /> -->
                                                        <select v-model="size" class="form-control custom-select" id="exampleFormControlSelect">
                                                            <option :value="null" disabled>Item Size: l/b/h</option>
                                                            <option value="5">S: 100cm</option>
                                                            <option value="7.5">M: 150cm</option>
                                                            <option value="10">L: 180cm</option>
                                                            <option value="15">XL: 200cm</option>
                                                            <option value="20">XXL: 250cm</option>
                                                            <option value="25">XXXL: 300cm</option>
                                                        </select>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <!-- <input type="text" placeholder="E-mail or number" /> -->
                                                            <div class="form-control" style="height:3rem;">
                                                                <h3>${{estimated_price}}</h3>

                                                            </div>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <!-- <input class="btn" type="submit" value="get a quote" /> -->
                                                            
                                                                <button  @click="create" class="btn orderNow">Order now</button>
                                                                <button  @click="create" class="btn bookAdv">Book in advance</button>
                                                            
                                                        </div>
                                                    
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-7 map_loc">
                                        <GmapMap
                                            :center="{lat:10, lng:10}"
                                            :zoom="7"
                                            map-type-id="terrain"
                                            style="width: 100%; height: 100vh;"
                                        >
                                            <GmapMarker
                                            :key="index"
                                            v-for="(m, index) in markers"
                                            :position="m.position"
                                            :clickable="true"
                                            :draggable="false"
                                            @click="center=m.position"
                                            />
                                        </GmapMap>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- </div> -->
            </div>
        </div>
    </div>  
    <div class="mb7"></div>
</div>
</template>
<script src="vue-google-maps.js"></script>
<script>
// import Axios from 'axios'
// Axios.defaults.baseURL = 'http://192.168.0.101:8000'
import Subscriber from "../sections/Subscriber";
import Banner from "../banner/Banner";
import TestimonialSlider from "../sections/TestimonialSlider.vue";
import ServiceSection from "../sections/ServiceSection";
import videoContent from "../data/home.json";
import bid from './Bid'
import MobileFeature from "../sections/MobileFeature.vue";
import navbar from "../layers/navbar1";
export default {
	data(){
		return{
            videoContent,
            placeholderValue: 'From',
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
			markers:[],
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
		bid,
        Subscriber,
        Banner,
        ServiceSection,
        TestimonialSlider,
       MobileFeature
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
.quote-form {
    background-color: #fff;
    padding: 30px;
}
.map_loc .vue-map-container {
    position: relative;
    overflow: hidden;
    max-height: 575px;
}
.mb7 {
    margin-bottom: 7rem;
}
.map_loc {
    height: 100% !important;
}
.quote-form button {
    border-radius: 0;
    background-color: #000 !important;
    text-transform: capitalize;
}
.quote-form input {
    width: 100%;
    line-height: 32px;
    border: 0;
}
.quote-form .form-control {
    border-radius: 0;
}
.col-md-7.map_loc {
    display: none;
}
.focus-visible{
    border:0 !important;
    border-color:none !important;
}
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
button.btn.bookAdv {
    float: right;
    background-color: #eee!important;
    color: #000;
}
button.btn.bookAdv:hover { 

    background-color: #ddd !important;
    color: #000 !important;
    opacity: .8;
}
button.btn.orderNow:hover {
    opacity: .8;
}
.quote-form h1 {
    font-weight: 900;
    padding-bottom: 20px;
}
.site-banner{
    background-image: url('/../static/img/transferista_3.jpg');
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
  height: 100%;
  min-height:850px;
  overflow: hidden;
}

.no-border{
	padding: 0 !important;
	padding-right: 5px !important;
	margin-top: -5px !important;
}
::-webkit-input-placeholder {
   color: #637282;
}
:-moz-placeholder { /* Firefox 18- */
   color: #637282;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #637282;  
}

:-ms-input-placeholder {  
   color: #637282;  
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
.quote-form input:focus {
    outline: none;
}

</style>
