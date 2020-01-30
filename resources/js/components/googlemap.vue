<template>
    <div>
        <gmap-map
        ref="map"
        :center="center2"
        :zoom="12"
        style="width:100%;  height: 400px;"
        >
            <gmap-marker v-if="this.center1" :position="this.center1">
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
</template>
<script>

import DashboardLayout from './layers/DashboardLayout'
export default {
    props:['project_id'],
    data(){
        return{
            center: { lat: 45.508, lng: -73.587 },
            center1:{
                lat: null,
                lng: null
            },
            center2: {
                lat: null,
                lng: null
            },
            marker: null,
            places: [],
            origin: {},
            destination: {},
            directionsDisplay : null
        }
    },
    computed:{ 
        location(){
             if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    console.log(position);
                    this.form.lat = position.coords.latitude; 
                    this.form.lng = position.coords.longitude;
                    // document.getElementById("result").innerHTML = positionInfo;
                }.bind(this));
                axios.get('api/user-details')
                .then(res=>{
                    this.user_id = res.data.user.id
                })
                .catch(eror=>console.log(error))
                axios.get(`api/drivers/${this.user_id}`)
                .then(res=>this.form.transferista_id = res.data.driver.transferista_id)
                .catch(error=>console.log(error))
                 
                axios.post('/api/position',this.form)
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
    
        }
    },
    methods:{
        updatePath(e){
            this.center1.lat  = parseFloat( e.location.lat)
            this.center1.lng  = parseFloat( e.location.lng)
            this.center = this.center1
            this.getDirection()
        },
        getDirection(){
            // if(this.flag>1){
            //     this.directionsDisplay.setDirections(null)
            // }
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
        
        }

    },
    created(){
        axios.post(`/api/projects/${this.project_id}`)
        .then(res=>{
                this.center2.lat = res.data.destination_lat
                this.center2.lng = res.data.destination_lng
        })
    },
    mounted(){
        Echo.private('location')
        .listen('SendPosition', (e) => {
            if(this.project_id == e.project_id ){
                this.updatePath(e)
                
            }
        });
        // this.$refs.map.$mapPromise.then((map) => {
        //     map.panTo(this.center)
        // })
    }
}
</script>