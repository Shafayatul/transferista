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
    data(){
        return{
            center: { lat: 45.508, lng: -73.587 },
            center1:{
                lat: null,
                lng: null
            },
            center2: {
                lat: 23.8103,
                lng: 90.4125
            },
            marker: null,
            places: [],
            origin: null,
            destination: null,
            directionsDisplay : null
        }
    },
    computed:{
        // markerSet(){
        // Echo.channel('location')
        // .listen('SendPosition', (e) => {
        //     this.center1.lng  = e.location.lng
        //     this.center.lat = e.location.lat
        // });
        // }
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
        // this.$emit(`update:layout`,DashboardLayout)
        // Echo.channel('location')
        // .listen('SendPosition', (e) => {
        //     this.center1  = e.location
        // });
    },
    mounted(){
        Echo.channel('location')
        .listen('SendPosition', (e) => {
            this.updatePath(e)
        });
        // this.$refs.map.$mapPromise.then((map) => {
        //     map.panTo(this.center)
        // })
    }
}
</script>