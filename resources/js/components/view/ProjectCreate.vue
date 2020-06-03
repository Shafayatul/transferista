<template>
    <div id="mainblog" class="job-postdetails">
        <div class="container">
            <div class="row">	
                <div class="col-md-12 top-header">
                    <h1>Post A Job</h1>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- Search form -->
                            <div class="row">
                                <div class="col-md-2 padding-zero">
                                    <label class=" label-title">From:</label>
                                </div>
                                <div class="col-md-7 padding-zero">
                                    <gmap-autocomplete
                                        :value="from"
                                        @place_changed="setPlace1">
                                    </gmap-autocomplete>
                                </div>
                                <div class="col-md-3 padding-zero">
                                    <button  @click="addMarker1" class="btn btn-info btn-search no-border-radius-left" aria-label="Search">
                                        <i class="fa fa-search btn-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-2 padding-zero">
                                    <label class=" label-title">To:</label>
                                </div>
                                <div class="col-md-7 padding-zero">
                                    <gmap-autocomplete
                                        :value="to"
                                        @place_changed="setPlace2">
                                    </gmap-autocomplete>
                                </div>
                                <div class="col-md-3 padding-zero">
                                    <button @click="addMarker2" class="btn btn-info btn-search no-border-radius-left" aria-label="Search">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success search btn-block" @click="getDirection">confirm</button>
                        </div>
                    </div> 
                    <form @submit.prevent="create" class="main-form">
                        <fieldset>
                            <div class="section postdetails">
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Date of Delivery</label>
                                        <div class="col-sm-9">
                                            <!-- <date-picker  :config="options"></date-picker> -->
                                            <datepicker :format="customFormatter" class="form-control"  name="uniquename"  v-model="form.delivery_date" >
                                                
                                            </datepicker>
                                        </div>
                                        <span v-if="errors.delivery_date" class="help-block" role="alert">
                                            <strong>{{errors.delivery_date[0]}}</strong>
                                        </span>
                                    </div> 
                                <div class="form-group row">
                                        <label class="col-sm-3 label-title">Time for Delivery</label>
                                        <div class="col-sm-9">						
                                        <select required v-model="form.time_for_delivery" class="form-control custom-select" id="example4">
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
                                        <span v-if="errors.time_for_delivery" class="help-block" role="alert">
                                            <strong>{{errors.time_for_delivery[0]}}</strong>
                                        </span>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Product Size</label>
                                        <div class="col-sm-9">						
                                        <select required v-model="form.project_size" class="form-control custom-select" id="exampleFormControlSelect1">
                                                <option value="5" >S: 100cm</option>
                                                <option value="7.5">M: 150cm</option>
                                                <option value="10">L: 180cm</option>
                                                <option value="15">XL: 200cm</option>
                                                <option value="20">XXL: 250cm</option>
                                                <option value="25">XXXL: 300cm</option>
                                        </select>
                                        </div>
                                        <span v-if="errors.project_size" class="help-block" role="alert">
                                            <strong>{{errors.project_size[0]}}</strong>
                                        </span>
                                    </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Zip Code of Origin<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input required v-model="form.origin_zip" type="text" class="form-control" placeholder="Ex. 1234">
                                    </div>
                                        <span v-if="errors.origin_zip" class="help-block" role="alert">
                                            <strong>{{errors.origin_zip[0]}}</strong>
                                        </span>
                                </div>				
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Zip Code of Destination<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input required v-model="form.destination_zip" type="text" class="form-control" placeholder="Ex. 2343">
                                    </div>
                                        <span v-if="errors.destination_zip" class="help-block" role="alert">
                                            <strong>{{errors.destination_zip[0]}}</strong>
                                        </span>
                                </div>					
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Title for your job<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input required v-model="form.project_title" type="text" class="form-control" placeholder="ex, Human Resource Manager">
                                    </div>
                                        <span v-if="errors.project_title" class="help-block" role="alert">
                                            <strong>{{errors.project_title[0]}}</strong>
                                        </span>
                                </div>
                                <div class="row form-group item-description">
                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea required v-model="form.project_description" class="form-control" id="textarea" placeholder="Write few lines about your jobs" rows="8"></textarea>		
                                    </div>
                                    <span v-if="errors.project_description" class="help-block" role="alert">
                                        <strong>{{errors.project_description[0]}}</strong>
                                    </span>
                                </div>
                            </div><!-- section -->
                            <div class="checkbox section agreement">
                                <label for="send">
                                    <input required v-model="check" type="checkbox" name="send" id="send">
                                    You agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Jobs to find a genuine buyer.
                                </label>
                                <button :disabled="!check" type="submit" class="btn btn-primary">Post Your Job</button>
                            </div><!-- section -->
                        </fieldset>
                        <input type="hidden" v-model="form.distance">
                    </form><!-- form -->
                </div>                 
                <div class="col-lg-4">
                    <!--Card-->
                    <gmap-map
                    ref="gmap"
                    :center="center"
                    :zoom="3"
                    motionTracking=true
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
import Datepicker from 'vuejs-datepicker';
import moment from 'moment'
export default {
    
    data(){
        return{
            state : {
               date: new Date(16 , 9, 2016)
            },
            center: { 
                lat: 50.3785,
                lng: 14.9706
            },
            check:false,
            center1: {
                lat:0,
                lng:0
            },
            center2: {
                lat:0,
                lng:0
            },
            markers: [],
            places: [],
            origin: null,
            destination: null,
            directionsDisplay : null,
            form:{
                origin_address: null,
                delivery_date: new Date(),
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
                distance:null,
                from: null,
                to: null
            },
            errors:{},
            success:false
        }
    },
    components: {
        Datepicker
    }
    ,
    methods: {
        customFormatter(date) {
            return moment(date).format('DD/MM/YYYY');
            },
        create(){
            axios.post('/api/projects',this.form)
            .then(res=>{
                    this.success = true
                    this.$router.push({name: 'singleProject',params:{
                    id: res.data.id
                    } 
                })
            })
            .catch(error=> console.log(error))
            // this.setAll(this.form,null)
        }, 
        setAll(obj, val) {
        
            Object.keys(obj).forEach(function(index) {
                obj[index] = val
            });
        },
    
        setPlace1(place) {
            // let arr = place.split(',');
            // console.log(arr);
            // this.form.origin_town =  arr[1];
            // this.form.origin_country = arr[2];
            console.log(place)
            var arr1 = place.formatted_address;
            var arr2 = place.name
            arr1 = arr2+' '+arr1
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
            arr1 = arr2 + ' ' + arr1
            this.form.destination_address = arr1; 
            var arr = arr1.split(',');
            this.form.destination_town = arr[arr.length - 2]
            this.form.destination_country =  arr[arr.length - 1]
            console.log(this.form.destination_address)
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
                this.form.origin_lng=this.center1.lng;
                this.form.origin_lat=this.center1.lat;
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
            this.form.destination_lng=this.center2.lng;
            this.form.destination_lat=this.center2.lat;
            this.destination = null;
        }
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
            console.log(dist)
            return dist;
        }
        ,
        
        getDirection(){

            this.form.distance = this.getDistance();


            // if(this.flag>1){
            //     this.directionsDisplay.setDirections(null)
            // }
            if(this.directionsDisplay ===  null){
                this.directionsDisplay = new google.maps.DirectionsRenderer;
            }
            var directionsService = new google.maps.DirectionsService();
            var start = this.center1;
            var destination = this.center2;
            // console.log('---------------------------')
            // console.log(this.$refs.gmap)
            // console.log('---------------------------')
            // console.log(typeof(this.$refs.gmap))
            // let a = this.$refs
            // console.log(a.gmap.finalLng)
            // console.log(this.$refs.gmap.$attrs.motionTracking)
            // console.log('--------------------------')
            // console.log(this.$el)

            // if(this.$refs.map !== undefined){
            //     this.directionsDisplay.setMap(this.$refs.map.$mapObject)
            // }
            // if(this.$refs.gmap == undefined){
             this.directionsDisplay.setMap(this.$refs.gmap.$mapObject)

             console.log(this.directionsDisplay)
            // }
            // let directionsDisplay = this.directionsDisplay
            // Vue.set(directionsDisplay)
            // //google maps API's direction service
            // function calculateAndDisplayRoute(directionsService,directionsDisplay,  start, destination) {
            directionsService.route({
                    origin: start,
                    destination: destination,
                    travelMode: 'DRIVING'
                }, (response, status)=>{
                    if (status === 'OK') {
                        console.log('----------------')
                        // console.log(directionsDisplay)
                        // this.form.distance = response.routes[0].legs[0].distance.value
                        console.log(response)
                        this.directionsDisplay.setDirections(response);
                    
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
        
            // }
            // calculateAndDisplayRoute(directionsService,this.directionsDisplay, start, destination);
        
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
        //  console.log('created0000000000')
        this.$emit(`update:layout`,DashboardLayout)
        if(this.$route.params.size > 0){
            this.center1.lat = this.$route.params.center1.lat
            this.center1.lng = this.$route.params.center1.lng
            this.center2.lat = this.$route.params.center2.lat
            this.center2.lng = this.$route.params.center2.lng
            this.form.project_size = this.$route.params.size
            this.from = this.$route.params.place1.formatted_address
            this.to = this.$route.params.place2.formatted_address
            this.setPlace1(this.$route.params.place1)
            this.setPlace2(this.$route.params.place2)

            // this.getDirection()
            
        }
    
    },
    mounted(){
        
        if(this.$route.params.size > 0){
            // this.center1 = this.$route.params.center1
            // this.center2 = this.$route.params.center2
            // this.form.project_size = this.$route.params.size
            console.log('created')
            this.getDirection()
        }
    }
}


</script>

<style scoped>
 .search{
     /* width: 82px; */
    background: #29aabf;
    /* border-color: 29aabf; */
    /* height: 35px; */
    /* border-radius: 13px; */
    /* box-shadow: black; */
    /* margin: auto; */
 }
 .padding-zero{
     padding: 0;
 }
 .no-border-radius-right{
     border-radius: 5px 0 0 5px;
 }
 
 .no-border-radius-left{
     border-radius: 0 5px 5px 0;
 }
 .top-header{
    margin: 0 0 40px 0;
 }
 .main-form{
     margin-top: 35px;
 }
</style>