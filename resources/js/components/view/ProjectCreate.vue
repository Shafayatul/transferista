<template>
    <div id="mainblog" class="job-postdetails">
        <div class="container">
            <div class="row">	
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div v-if="success" class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                <button @click="success = !success" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <!-- Search form -->
                            <gmap-autocomplete
                                @place_changed="setPlace1">
                            </gmap-autocomplete>
                            <button  @click="addMarker1" class="btn btn-info btn-search" aria-label="Search">
                                <i class="fas fa-search btn-info" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-md-6">
                            
                            <gmap-autocomplete
                                @place_changed="setPlace2">
                            </gmap-autocomplete>
                            <button @click="addMarker2" class="btn btn-info btn-search" aria-label="Search">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                        <button class="search" @click="getDirection">confirm</button>
                    </div> 
                    <form @submit.prevent="create">
                        <fieldset>
                            <div class="section postdetails">
                                <h4>Post Your Job</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Date of Delivery</label>
                                        <div class="col-sm-9">
                                            <input v-model="form.delivery_date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div> 
                                <div class="form-group row">
                                        <label class="col-sm-3 label-title">Time for Delivery</label>
                                        <div class="col-sm-9">						
                                        <select v-model="form.time_for_delivery" class="form-control custom-select" id="exampleFormControlSelect1">
                                            <option value="6-8 Hr" >6 - 8</option>
                                            <option value="8-10 Hr">8 - 10</option>
                                            <option value="10-12 Hr" >10 - 12</option>
                                            <option value="12-14 Hr">12 - 14</option>
                                            <option value="14-16 Hr">14 - 16</option>
                                            <option value="16-18 Hr">16 - 18</option>
                                            <option value="18-20 Hr">18 - 20</option>
                                            <option value="20-22 Hr">20 - 22</option>
                                            <option value="22-24 Hr">22 - 24</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Product Size</label>
                                        <div class="col-sm-9">						
                                    <select v-model="form.project_size" class="form-control custom-select" id="exampleFormControlSelect1">
                                            <option value="s" >S: 100cm</option>
                                            <option value="m">M: 150cm</option>
                                            <option value="l">L: 180cm</option>
                                            <option value="xl">XL: 200cm</option>
                                            <option value="xxl">XXL: 250cm</option>
                                            <option value="xxxl">XXXL: 300cm</option>
                                    </select>
                                    </div>
                                    </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Title for your job<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input v-model="form.project_title" type="text" class="form-control" placeholder="ex, Human Resource Manager">
                                    </div>
                                </div>					
                                <div class="row form-group item-description">
                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea v-model="form.project_description" class="form-control" id="textarea" placeholder="Write few lines about your jobs" rows="8"></textarea>		
                                    </div>
                                </div>
                                <div class="row characters">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <p>5000 characters left</p>
                                    </div>
                                </div>
                            </div><!-- section -->
                            <div class="checkbox section agreement">
                                <label for="send">
                                    <input type="checkbox" name="send" id="send">
                                    You agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Jobs to find a genuine buyer.
                                </label>
                                <button type="submit" class="btn btn-primary">Post Your Job</button>
                            </div><!-- section -->
                        </fieldset>
                    </form><!-- form -->
                </div>                 
                <div class="col-lg-4">
                    <!--Card-->
                    <gmap-map
                    ref="map"
                    :center="center"
                    :zoom="12"
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
                    <!--/.Card-->
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Main blog Area End ========= -->
</template>
<script src="vue-google-maps.js"></script>
<script>
import DashboardLayout from '../layers/DashboardLayout'
 
export default {
    data(){
        return{
            center: { lat: 45.508, lng: -73.587 },
            center1: null,
            center2: null,
            markers: [],
            places: [],
            origin: null,
            destination: null,
            directionsDisplay : null,

            form:{
                origin_address: null,
                origin_zip:null,
                origin_town:null,
                origin_country:null,
                origin_lng:null,
                origin_lat:null,
                destination_address:null,
                destination_zip:null,
                destination_town:null,
                destination_country:null,
                destination_lng:null,
                destination_lat:null,
                project_title:null,
                project_description:null,
                project_size:null,
                distance:null
            },
            success:false
        }
    },
    computed: {
       
    },
    methods: {
        create(){
            axios.post('/api/projects',this.form)
            .then(res=>{
                this.success = true
            })
            .catch(error=> errors=error.response.data.errors)
        },
    
        setPlace1(place) {
            // let arr = place.split(',');
            // console.log(arr);
            // this.form.origin_town =  arr[1];
            // this.form.origin_country = arr[2];
            console.log(place)
            var arr1 = place.formatted_address;
            var arr2 = place.name
            arr1 = arr2.concat(arr1)
            this.form.origin_address = arr1; 
            var arr = arr1.split(',');
            this.form.origin_town = arr[arr.length - 2]
            this.form.origin_country =  arr[arr.length - 1]
            console.log(this.form.origin_address)
            this.origin = place;
        
        },
        setPlace2(place) {
            var arr1 = place.formatted_address;
            var arr2 = place.name
            arr1 = arr2.concat(arr1)
            this.form.destination_address = arr1; 
            var arr = arr1.split(',');
            this.form.destination_town = arr[arr.length - 2]
            this.form.destination_country =  arr[arr.length - 1]
            console.log(this.form.origin_address)
            this.destination = place;
        
        },
        addMarker1() { 
        if( this.markers[0]) {
                this.center = null;
            }

        if (this.origin) {
            const marker = {
            lat: this.origin.geometry.location.lat(),
            lng: this.origin.geometry.location.lng()
            };
            this.center1 = marker;
            this.markers[0]= this.center1;
            this.places[0] = this.origin;
            this.center = this.center1;
            this.origin = null;
        }
        },
        addMarker2() {
        if( this.markers[1]) {
                this.center = null;
            }
        if (this.destination) {
            const marker = {
            lat: this.destination.geometry.location.lat(),
            lng: this.destination.geometry.location.lng()
            };
            this.center2 = marker;
            this.markers[1]= this.center2;
            this.places[1] = this.destination;
            this.center = this.center2;
            this.destination = null;
        }
        },
        getDirection(){
            if(this.flag>1){
                this.directionsDisplay.setDirections(null)
            }
            if(this.directionsDisplay== null){
                this.directionsDisplay = new google.maps.DirectionsRenderer;
            }
            var directionsService = new google.maps.DirectionsService;
            var start = this.center1;
            var destination = this.center2;
            this.directionsDisplay.setMap(this.$refs.map.$mapObject);
            

            //google maps API's direction service
            function calculateAndDisplayRoute(directionsService,directionsDisplay,  start, destination) {
                    directionsService.route({
                        origin: start,
                        destination: destination,
                        travelMode: 'DRIVING'
                    }, function(response, status) {
                    if (status === 'OK') {
                        // this.form.distance = response.routes[0].legs[0].distance.value
                        directionsDisplay.setDirections(response);
                        
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
        }

        calculateAndDisplayRoute(directionsService,this.directionsDisplay, start, destination);
        
        },
        // geolocate: function() {
        //   navigator.geolocation.getCurrentPosition(position => {
        //     this.center = {
        //       lat: position.coords.latitude,
        //       lng: position.coords.longitude
        //     };
        //   });
        // }
    },
	beforeCreate(){
		// if(!User.customer() || !User.company()){
		// 	window.location = '/login'
		// }
	},
    created(){
        this.$emit(`update:layout`,DashboardLayout)
    }
}


</script>

<style scoped>
 .search{
     width: 82px;
    background: #29aabf;
    border-color: 29aabf;
    height: 35px;
    border-radius: 13px;
    box-shadow: black;
    margin: auto;
 }
</style>