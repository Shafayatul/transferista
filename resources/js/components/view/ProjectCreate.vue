<template>
    <div id="mainblog" class="job-postdetails">
        <div class="container">
            <div class="row">	
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
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
                    <form action="#">
                        <fieldset>
                            <div class="section postdetails">
                                <h4>Post Your Job</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Date of Delivery</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div> 
                                <div class="form-group row">
                                        <label class="col-sm-3 label-title">Time for Delivery</label>
                                        <div class="col-sm-9">						
                                        <select class="form-control custom-select" id="exampleFormControlSelect1">
                                            <option>6 - 8</option>
                                            <option>8 - 10</option>
                                            <option>10 - 12</option>
                                            <option>12 - 14</option>
                                            <option>14 - 16</option>
                                            <option>16 - 18</option>
                                            <option>18 - 20</option>
                                            <option>20 - 22</option>
                                            <option>22 - 24</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Product Size</label>
                                        <div class="col-sm-9">						
                                    <select class="form-control custom-select" id="exampleFormControlSelect1">
                                            <option>S: 100cm</option>
                                            <option>M: 150cm</option>
                                            <option>L: 180cm</option>
                                            <option>XL: 200cm</option>
                                            <option>XXL: 250cm</option>
                                            <option>XXXL: 300cm</option>
                                    </select>
                                    </div>
                                    </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Title for your job<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="ex, Human Resource Manager">
                                    </div>
                                </div>					
                                <div class="row form-group item-description">
                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="textarea" placeholder="Write few lines about your jobs" rows="8"></textarea>		
                                    </div>
                                </div>
                                <div class="row characters">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <p>5000 characters left</p>
                                    </div>
                                </div>	
                                <div class="row form-group add-title location">
                                    <label class="col-sm-3 label-title">Location<span class="required">*</span></label>
                                    <div class="col-sm-9 d-flex">
                                        <div class="dropdown category-dropdown mr-3">
                                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Country</span> <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">Argentina</a></li>
                                                <li><a href="#">Australia</a></li>
                                                <li><a href="#">Belgium</a></li>
                                                <li><a href="#">Brazil</a></li>
                                                <li><a href="#">Cambodia</a></li>
                                            </ul>								
                                        </div>
                                        <div class="dropdown category-dropdown ">
                                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">State</span> <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">State 1</a></li>
                                                <li><a href="#">State 2</a></li>
                                                <li><a href="#">State 3</a></li>
                                            </ul>								
                                        </div>
                                    </div>
                                </div>								
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Email ID</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" placeholder="ex, jhondoe@mail.com">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Mobile Number<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mobileNumber" class="form-control" placeholder="ex, +912457895">
                                    </div>
                                </div>
                                <div class="row form-group address">
                                    <label class="col-sm-3 label-title">Address<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" placeholder="ex, alekdera House, coprotec, usa">
                                    </div>
                                </div>
                                <div class="row form-group select-price">
                                    <label class="col-sm-3 label-title">Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <label>$USD</label>
                                        <input type="text" class="form-control" placeholder="Min">
                                        <span>-</span>
                                        <input type="text" class="form-control" placeholder="Max">
                                        <input type="radio" name="price" value="negotiable" id="negotiable">
                                        <label for="negotiable">Negotiable </label>
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
            directionsDisplay : null
        }
    },
    computed: {
       
    },
    methods: {
    
        setPlace1(place) {
        this.origin = place;
        
        },
        setPlace2(place) {
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