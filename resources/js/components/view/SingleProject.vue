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
                            <div class="gig_title d-flex justify-content-between">
                                <!-- <div v-show="notTransferista" class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Please log in first</strong> 
                                </div> -->
                                <a class="p" href="#">
                                    <h3>
                                        {{project_title}}
                                    </h3>
                                </a>
                                <!-- <p class="sr">Open - 6 days left 
                                    
                                </p> -->
                            </div>
                            <span class="hr"></span>
                            <div class="gig_description">
                                <h5>Description</h5>
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
                            <br>
                            <button @click=sendPosition :disabled="started" v-if="project.project_status == 1" class="btn btn-success" ><a class="font-color" >Start</a></button>
                        
                            <button v-show="completed || project.project_status==2" @click=finish class="btn btn-danger" ><a class="font-color" >End</a></button>
                        
                            <button @click="modal" v-show="project.project_status==3"  class="btn btn-danger" ><a class="font-color" >Reviw</a></button>
                        
                        </div>
                    </div>
                    <div class="col-md-4">
                    <!--Card-->
                        <label>
                            Start at:
                            <gmap-autocomplete @place_changed="updateCenter($event)" />
                        </label>

                        <gmap-map
                        ref="map"
                        :zoom="12"
                        :center="center"
                        style="width:100%;  height: 400px;"
                        >
                            <!-- <gmap-polyline v-if="path.length > 0" :path="path" :editable="true" @path_changed="updateEdited($event)"
                                @rightclick="handleClickForDelete"
                                ref="polyline">
                            </gmap-polyline> -->
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
         <div  class="modal fade" id="modal"  tabindex="-1" role="dialog" aria-labelledby="oneModalLabel" aria-hidden="true">
            <MyRating :project =project  :id="id"></MyRating>
        </div>
    </div>

    
</template>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<script src="vue-google-maps.js"></script>
<script>
import _ from 'lodash'
import MyRating from './rating/MyReview'
import DashboardLayout from '../layers/DashboardLayout'
export default {
     data(){
        return{
            accept1:null,
            accept:null,
            transferista:null,
            notTransferista:false,
            id:null,
            project:{},
            bids: {},    
            completed:false,
            bidded:false,        
            isOwner: false,
            destination: {},
            data:{},
            directionsDisplay : null,
            show: true,
            noBids: false,
            flag: false,
            review:false,
            form:{
                project_id:null,
                lat:null,
                lng:null
            },
            center1:{
                project_id:null,
                lat:0.0,
                lng:0.0
            },
            center2: { lat: 0.0, lng: 0.0 },
            project_title: null,
            project_description: null,
            url: null,
            hasBidded:false,
            started:false,
            marker:null, 
            
            center: {lat:23.8103, lng: 90.4125},
            edited: null,
            path: [
                {lat: 23.8103, lng: 90.4125},
                {lat: 22.3569, lng:  91.7832},
            ],
            mvcPath: null,
            errorMessage: null

        }
     },
    //  watch: {
    //         polylinePath: _.throttle(function (path) {
    //         if (path) {
    //             this.path = path
    //             this.polylineGeojson = JSON.stringify({
    //             type: 'Polyline',
    //             coordinates: this.path.map(({lat, lng}) => [lng, lat])
    //             }, null, 2)
    //         }
    //     }, 1000)
    // },
     components:{
       DashboardLayout, MyRating
    },
    methods:{
        
		modal(){
            $('#modal').modal('show');
        },
        updatePath(e){
            this.center1.lat  =  e.lat
            this.center1.lng  =  e.lng
            this.center = this.center1
            if(this.directionsDisplay === null){
                this.directionsDisplay = new google.maps.DirectionsRenderer;
            }
            // var directionsService = new google.maps.DirectionsService;

            
            // this.center1.lat= parseFloat(this.project.origin_lat)
            // this.center1.lng = parseFloat(this.project.origin_lng)
            this.center2.lat= parseFloat(this.project.destination_lat);
            this.center2.lng= parseFloat(this.project.destination_lng);
            
            var start = this.center1;
             
            var destination = this.center2;


            this.marker = new google.maps.Marker({

            })
            
            // if(this.$refs['map'] != undefined){
            //     this.directionsDisplay.setMap(this.$refs['map'].$mapObject)
            // }
            // console.log(this.project)
            // google maps API's direction service
                              
            // directionsService.route({
            //         origin: start,
            //         destination: destination,
            //         travelMode: 'DRIVING'
            //     }, (response, status)=> {
            //     if (status === 'OK') {
            //         // this.form.distance = response.routes[0].legs[0].distance.value
            //         this.directionsDisplay.setDirections(response);
            //     } else {
            //         console.log(status)

            //         window.alert('Directions request failed due to ' + status);
            //     }
            // });


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
        finish(){
            axios.get(`/api/project/delivered/${this.id}`)
            .then(res=>{
                    this.completed = false
                    this.project.project_status = 3
                    this.review = true
            })
            .catch(error=>console.log(error))}
        
        },
        sendPosition(){    
            this.started = true
            this.flag = false
            axios.get(`/api/project/transfer/${this.project.id}`)
            .then(res => {
                this.completed = true
                // EventBus.$emit('onTheWay',this.project.id)
            })
            this.intervalid1 = setInterval(()=>{
                // console.log ('success');

                /* Get direction */
                this.directionsDisplay = new google.maps.DirectionsRenderer;
                
                var directionsService = new google.maps.DirectionsService;
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position)=> {
                        console.log(position);
                        //this. = id;
                        this.center1.project_id = this.project.id
                        this.center1.lat = position.coords.latitude; 
                        this.center1.lng = position.coords.longitude;
                         axios.post('/api/position',this.center1)
                        // document.getElementById("result").innerHTML = positionInfo;
                    });
                }
                // this.center1.lat= this.position.lat
                // this.center1.lng =this.position.lng 
                
                this.center2.lat= parseFloat(this.project.destination_lat)
                this.center2.lng =parseFloat(this.project.destination_lng)
                
                var start = this.center1;
                
                var destination = this.center2;
                this.directionsDisplay.setMap(this.$refs.map.$mapObject)
                console.log(this.project)
                // google maps API's direction service
                                
                directionsService.route({
                        origin: start,
                        destination: destination,
                        travelMode: 'DRIVING'
                    }, (response, status)=> {
                    if (status === 'OK') {
                        // this.form.distance = response.routes[0].legs[0].distance.value
                        console.log(response)
                        this.directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });


            }, 10000);
            
        },
        test(){
            console.log('test')
        },
        location(id,i){
             this.i = i
             if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    console.log(position);
                    this.form.project_id = this.id;
                    this.form.lat = position.coords.latitude; 
                    this.form.lng = position.coords.longitude;
                    axios.post('/api/position',this.form)
                    // document.getElementById("result").innerHTML = positionInfo;
                }.bind(this));
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
    
    },
    created(){
        this.$emit(`update:layout`,DashboardLayout)
        this.id = this.$route.params.id;
        if(User.loggedIn()){
            this.url = `/api/project-detail/${this.id}`
        }else{
            this.url = `/api/visitor-project-detail/${this.id}`
        }
        axios.get(this.url)
        .then(res =>{
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
        
    },
    mounted(){
        
        EventBus.$on('reviewed',()=>{
            console.log('------')
            this.project.project_status = 4
        })

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