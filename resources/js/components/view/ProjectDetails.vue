<template>
	<div id="body-wrap">
        <section id="mybreadcrumb">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title_area">
                            
                        </div>
                    </div>
                </div>
                <div class="row breadcrumb_menu">
                    <div class="col-12">
                        
                    </div>
                </div>
            </div>
        </section>
            <!-- =========== mybreadcrumb  Area end =========== -->

            <!-- ========== catagoris body content area start ========== -->
        <section id="jobdetails" >
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="gig_details">
                            <div class="gig_title d-flex justify-content-between">
                                <div v-show="notTransferista" class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Please log in first</strong> 
                                </div>
                                <a class="p" href="#">
                                    <h3>
                                        {{project_title}}
                                    </h3>
                                </a>
                                <p class="sr">Open - 6 days left 
                                    
                                </p>
                            </div>
                            <span class="hr"></span>
                            <div class="gig_description">
                                <h5>Discription</h5>
                                <p>
                                    {{project_description}}
                                </p>
                                
                            </div>
                        </div>
                        <div class="orderand_share">
                            <a class="order_btn" href="#">Bid Now</a>

                            <div class="socal_link">
                                <p>Share:</p>
                                <a href="#"> <i class="fa fa-facebook"></i> </a>
                                <a href="#"> <i class="fa fa-twitter"></i> </a>
                                <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                <a href="#"> <i class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                        <div v-show="noBids" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>No bids has been submitted for this project</strong> 
                        </div>
                        <div class="clint_review" v-if="show">
                            
                            <div class="review_box" v-for="(bid,index) in bids" :key="bid.id">
                                <div class="media" >
                                    <img class="mr-3" src="img/jobdetails/r1.png" alt="">
                                    <div class="media-body">
                                        <div class="header d-flex justify-content-between">
                                            <h4 class="mt-0">{{bid.bid_transferista_name}}</h4>
                                            <p>{{bid.bid_amount}}$</p>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <button v-show="flag" @click="confirm(index)" class="btn btn-success">Accept</button>
                                            <button v-show="chatShow" @click="chat(index)" class="btn btn-success">Chatt</button>
                                            <button class="btn btn-danger">Cancel</button>
                                            
                                        </div>
                                        <p class="p">bid.created_at</p>
                                    </div>
                                </div>
                                <div  class="modal fade" :id="bid.bid_id"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <confirm  :accepted="accepted" :bid="bid"></confirm>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <!--Card-->
                        <gmap-map
                        ref="map"
                        :zoom="12"
                        :center="center"
                        style="width:100%;  height: 400px;"
                        >
                            <!-- <gmap-marker
                                :key="index"
                                v-for="(m, index) in markers"
                                :position="m.position"
                                @click="center=m.position"
                            ></gmap-marker> -->
                        </gmap-map>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script src="vue-google-maps.js"></script>
<script>
import confirm from './Confirm'
import DashboardLayout from '../layers/DashboardLayout'
export default {
    data(){
        return{
            notTransferista:false,
            id:null,
            project:null,
            bids: null,            
            destination: null,
            directionsDisplay : null,
            show: false,
            noBids: false,
            flag: true,
            center: { lat: 45.508, lng: -73.587 },
            project_title: null,
            project_description: null,
            chatShow: false
        }
    },
    components:{
        confirm , DashboardLayout
    },
    computed:{
        // timeLeft(date){
		// 	let oneDay = 1000*60*60*24; 
		// 	let today = Date.now();
		// 	let date1 = date.getTime;

		// 	let date2 = date1 + (7*1000*60*60*24);

		// 	let left = Math.round((date2 - today.getTime/oneDay));
			
		// 	return left;

		// }
        
    },
    methods:{
        chat(index){
            this.$router.push({
					name: 'chat',
					params:{
                        p_id: p_id,
                        u_name: project.user,
                        t_id: bid.bid_transferista_id,
                        t_name: bid.bid_transferista_name
                    }
				})
        },
         getDirection(){
            if(this.directionsDisplay== null){
                this.directionsDisplay = new google.maps.DirectionsRenderer;
            }
            var directionsService = new google.maps.DirectionsService;
            var start = {
                lat: parseFloat(this.project.origin_lat),
                lng: parseFloat(this.project.origin_lng)
            };
            var destination =  {
                lat: parseFloat(this.project.destination_lat),
                lng: parseFloat(this.project.destination_lng)
            };
            this.directionsDisplay.setMap(this.$refs.map.$mapObject);
            
            // google maps API's direction service
            function calculateAndDisplayRoute(directionsService,directionsDisplay,  start, destination) {
                directionsService.route({
                        origin: start,
                        destination: destination,
                        travelMode: 'DRIVING'
                    }, function(response, status) {
                    if (status === 'OK') {
                        this.form.distance = response.routes[0].legs[0].distance.value
                        directionsDisplay.setDirections(response);
                        
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            }
            calculateAndDisplayRoute(directionsService,this.directionsDisplay,start,destination)
        },
        confirm(index){
            $(`#${ this.bids[index].id}`).modal('show');
        },
        accepted(p_id,bid){
            axios.post(`project/accept/${p_id}/${bid.bid_transferista_id}`)
            .then(res=>{
                this.flag = false;
                
            })
            .catch(error => this.notTransferista = true)
        }
    },
    created(){
        this.id = this.$route.params.id
        this.$emit(`update:layout`,DashboardLayout)
        axios.get(`/api/project-detail/${this.id}`)
        .then(res =>{
            this.project = res.data.project
            this.bids = res.data.bids_data_array 
            if(!this.bids){
                this.noBids = true
            } 
            this.project_title = this.project.project_title;
            this.project_description = this.project.project_description;
            this.getDirection()
        })
        .catch(error=>console.log(error))

       
        if(User.customer()|| User.company() ||User.admin()){
            if(User.name() == this.project.user)
                this.show = true;
                this.chatShow = true;
        }
        if(User.transferista()){
            this.show = true
            this.flag = false
        }
        
    }

}
</script>