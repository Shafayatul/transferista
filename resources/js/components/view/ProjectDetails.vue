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
                        <div v-show="bidded" class="alert alert-warning alert-dismissible fade show" role="alert">
                        Successfully Bidded
                            <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="gig_details">
                            <div class="gig_title justify-content-between">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>
                                            {{project_title}}
                                        </h3>
                                    </div>
                                    <div class="col-md-6 pull-right text-right">
                                        <h3>
                                            {{status}}
                                        </h3>
                                        
                                    </div>
                                </div>
                            </div>
                            <span class="hr"></span>
                            <div class="gig_description">

                                <h5><b>Description</b></h5>
                                <p>
                                    {{project_description}}
                                </p>
                            </div>
                            <div class = "row address-row">
                                <div class="col-md-6">

                                    <p><b>From:</b></p>
                                    <p>{{project.origin_address}}</p>

                                    <p>City: {{project.origin_town}}</p>

                                    <p>State Zip: {{project.origin_zip}}</p>

                                    <p>Country: {{project.origin_country}}</p>


                                </div>
                                <div class="col-md-6">
                                   <p><b>Destination:</b></p>
                                   <p>{{project.destination_address}}</p>
                                
                                   <p> City: {{project.destination_town}}</p>
                                
                                    <p>State Zip: {{project.destination_zip}}</p>
                                
                                     <p>   Country: {{project.destination_country}}</p>
                                </div>
                        
                            </div>
                        </div>
                        <div class="orderand_share">
                            <button :disabled="hasBidded" v-show="isShowBidButton" class="order_btn" v-if="!accept" data-toggle="modal" data-target="#one" @click=modal()>Bid Now</button>
                            <!-- <div class="socal_link">
                                <p>Share:</p>
                                <a href="#"> <i class="fa fa-facebook"></i> </a>
                                <a href="#"> <i class="fa fa-twitter"></i> </a>
                                <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                <a href="#"> <i class="fa fa-google-plus"></i> </a>
                            </div> -->
                        </div>
                        <div v-if="accept1" class="alert alert-warning alert-dismissible fade show" role="alert">
                        Transferista has been selected for this project
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <br>
                        <br>
                        <div v-show="noBids" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>No bid has been submitted for this project.</strong> 
                        </div>
                        <div v-if="accept" class=" alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{transferista}} has been selected for this project</strong> 
                        </div>
                        <div class="clint_review" v-if="show">
                            
                            <div class="review_box" v-for="(bid,index) in bids" :key="bid.id">
                                <div class="media" >
                                    <img class="mr-3" :src="'img/jobdetails/r1.png'" alt="">
                                    <div class="media-body">
                                        <div class="header d-flex justify-content-between">
                                            <h4 class="mt-0">{{bid.bid_transferista_name}}</h4>
                                            <p>{{bid.bid_amount}}$</p>
                                            <div class="stars">
                                            </div>
                                            <div v-if="isOwner">
                                                <button  @click="confirm(index)" :disabled="accept1" class="btn btn-success">Details</button>
                                                <!-- <button class="btn btn-danger">Cancel</button> -->
                                            </div>
                                        </div>
                                        <!-- <p class="p">{{bid.created_at}}</p> -->
                                    </div>
                                </div>
                                <div  class="modal fade" :id="bid.bid_id"  tabindex="-1" role="dialog" aria-labelledby="bid.bid_idLabel" aria-hidden="true">
                                    <confirm  :accepted="accepted" :bid="bid"></confirm>
                                </div>
                            </div>
                        </div>
                        <!-- <div v-show="isOwner">
                            <gmap-map
                        ref="map"
                        :zoom="12"
                        :center="center"
                        style="width:100%;  height: 400px;"
                        >
                            <gmap-marker v-show="this.center1" :position="this.center1">
                            </gmap-marker>
                            <gmap-marker v-show="this.center2" :position="this.center2">
                            </gmap-marker> -->
                            <!-- <gmap-marker
                                :key="index"
                                v-for="(m, index) in markers"
                                :position="m.position"
                                @click="center=m.position"
                            ></gmap-marker> -->
                        <!-- </gmap-map> -->
                        <!-- </div> -->
                    </div>
                    <div  class="modal fade" id="one"  tabindex="-1" role="dialog" aria-labelledby="oneModalLabel" aria-hidden="true">
                        <bid  :bid="bid" :id="id"></bid>
                    </div>
                    <div class="col-md-4">
                    <!--Card-->
                        <gmap-map
                        ref="map"
                        :zoom="12"
                        :center="center"
                        :options="{
                        zoomControl: true,
                        mapTypeControl: false,
                        scaleControl: false,
                        streetViewControl: false,
                        rotateControl: false,
                        fullscreenControl: true,
                        disableDefaultUi: false
                        }"
                        style="width:100%;  height: 400px;"
                        >
                            <gmap-marker v-show="this.center1" :position="this.center1">
                            </gmap-marker>
                            <gmap-marker v-show="this.center2" :position="this.center2">
                            </gmap-marker>
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

<script>
import bid from './Bid'
import confirm from './Confirm'
import DashboardLayout from '../layers/DashboardLayout'
export default {
    data(){
        return{
            status: null,
            isShowBidButton: false,
            accept1:null,
            accept:null,
            transferista:null,
            notTransferista:false,
            id:null,
            project:{},
            bids: {},    
            bidded:false,        
            isOwner: false,
            destination: {},
            data:{},
            directionsDisplay : null,
            show: true,
            noBids: false,
            flag: false,
            center: { lat: 45.508, lng: -73.587 },
            center1: { lat: 0.0, lng: 0.0 },
            center2: { lat: 0.0, lng: 0.0 },
            project_title: null,
            project_description: null,
            url: null,
            hasBidded:false
        }
    },
    components:{
        confirm , DashboardLayout, bid
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
		modal(){
            if(!User.transferista()){
				this.$router.push('../register')
			}
            $('#modal').modal('show');
        },
        updatePath(e){
            this.center1.lat  =  e.lat
            this.center1.lng  =  e.lng
            this.center = this.center1
            if(this.directionsDisplay === null){
                this.directionsDisplay = new google.maps.DirectionsRenderer;
            }
            var directionsService = new google.maps.DirectionsService;

            
            // this.center1.lat= parseFloat(this.project.origin_lat)
            // this.center1.lng = parseFloat(this.project.origin_lng)
            this.center2.lat= parseFloat(this.project.destination_lat);
            this.center2.lng= parseFloat(this.project.destination_lng);
            
            var start = this.center1;
             
            var destination = this.center2;

            if(this.$refs['map'] != undefined){
                this.directionsDisplay.setMap(this.$refs['map'].$mapObject)
            }
            // console.log(this.project)
            // google maps API's direction service
                    directionsService.route({
                            origin: start,
                            destination: destination,
                            travelMode: 'DRIVING'
                        }, (response, status)=> {
                        if (status === 'OK') {
                            // this.form.distance = response.routes[0].legs[0].distance.value
                            this.directionsDisplay.setDirections(response);
                        } else {
                            console.log(status)

                            window.alert('Directions request failed due to ' + status);
                        }
                    });

        },
		bid(bidData){
			axios.post('/api/bids',bidData)
                .then(res=>{
                    this.bidded = false
                    this.bids.unshift(res.data.bid)
                    this.noBids= false
                }
			)
		},
        getPosition(marker){

            return {
                lat: parseFloat(marker.lat),
                lng: parseFloat(marker.lng)
            };
            },
            toggleInfo(marker, key) {
            this.infoPosition = this.getPosition(marker)
            this.infoContent = marker.full_name
            if (this.infoCurrentKey == key) {
                this.infoOpened = !this.infoOpened
            } else {
                this.infoOpened = true
                this.infoCurrentKey = key
            }
        },
        getDirection(){
             
            this.directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService();
            
            this.center1.lat= parseFloat(this.project.origin_lat)
            this.center1.lng = parseFloat(this.project.origin_lng)
            
            this.center2.lat= parseFloat(this.project.destination_lat)
            this.center2.lng =parseFloat(this.project.destination_lng)
            
            var start = this.center1;
             
            var destination = this.center2;
            if(this.$refs['map'] != undefined){
                this.directionsDisplay.setMap(this.$refs.map.$mapObject)
            }
            // google maps API's direction service
                              
            directionsService.route({
                    origin: start,
                    destination: destination,
                    travelMode: 'DRIVING'
                }, (response, status)=> {
                if (status === 'OK') {
                    // this.form.distance = response.routes[0].legs[0].distance.value
                    this.directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });


        },
        confirm(index){
            $(`#${ this.bids[index].bid_id}`).modal('show');
        },
        accepted(p_id,bid){
            axios.get(`/api/project/accept/${p_id}/${bid.bid_transferista_id}`)
            .then(res=>{
                this.accept1 = true
                // this.transferista = res.data.transferista
                // $(`#${ this.bids[index].id}`).modal('show');
                // this.flag = false;
                
            })
            .catch(error => this.notTransferista = true)
        }
    },
    created(){
        if(User.transferista()){
            this.isShowBidButton = true
        }
        this.id = this.$route.params.id;
        if(User.loggedIn()){
            this.url = `/api/project-detail/${this.id}`
        }else{
            this.url = `/api/visitor-project-detail/${this.id}`
        }
        axios.get(this.url)
        .then(res =>{
            console.log(res)
            this.status = res.data.status
            this.project = res.data.project
            this.bids = res.data.bids_data_array
            this.hasBidded = res.data.has_bidded
            if(this.project.transferista_name === null){
                this.isOwner = res.data.is_owner
            }else{
                this.transferista = this.project.transferista_name
                this.accept = true
                this.bidded = false
            }

            if(this.bids.length == 0){
                this.noBids = true
            } 

            this.project_title = this.project.project_title;
            this.project_description = this.project.project_description;
            
            this.getDirection()
        })
        .catch(error=>console.log(error))

        //  console.log(this.$userId)
        // $http.get('api/user')
        // .then(res=>{
        //     console.log(res.body)
        // })
       
        // if(User.customer()|| User.company() ||User.admin()){
        //     if(User.name() == this.project.name)
        //         this.show = true;
        // }
        // if(User.transferista()){
        //     this.show = true
        //     this.flag = false
        // }
        // if(User.company()){
        //     if(this.$userId === this.project.project_owner_id)
        //     {
        //         this.flag = true
        //     }
        // }
        
        this.$emit(`update:layout`,DashboardLayout)
        
    },
    mounted(){
            
         Echo.private('positions')
             .listen('Positions', (e) => {
            if(this.id == e.project_id){
                    this.updatePath(e);
                }
            }
            
        )
       
    }
}
</script>

<style scoped>
.address-row{
    margin-top: 10px;
    padding-top: 10px;
}
</style>