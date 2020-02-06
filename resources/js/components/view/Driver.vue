<template>
    
    <main class=" mx-lg-5 catagoris" >
       <section  id="catagoribody">
            <div class="container mamunurrashid_gig_wraper">
                <div class=" mr_card" v-for="(data,index) in projects" :key="index">
                    <div class="mr_card_body">
                            <div class="p-box  ">											
                                <a href="" @click=singleProject(data.id) class="p ">
                                    <h5 class="fonts-title">{{data.project_title}}<br><small>Bidded {{ data.created_at }}</small></h5>
                                   <div class="project-body pt-2">
                                        <span class="body-color">
                                            {{data.project_description}}
                                        </span>
                                    </div>
                                </a>
                                <button v-show="data.project_status == 1" class="btn btn-success" @click =singleProject(data.id) ><a class="font-color" >Start</a></button>
                            </div>
                            <div class=" d-flex ">											
                                <p class="sr col-md-4">
                                
                                    <span class="review">
                                      Delivery date: {{data.delivery_date}}
                                    </span>
                                </p>
                                <p class="col-md-4"><i class="fas fa-google-map"></i>From: {{data.origin_address}}</p>
                                <p class="col-md-4">To: {{data.destination_address}}</p>
                            </div>
                            <div class=" d-flex ">											
                                <p class="sr col-md-4">
                                    <span class="review">
                                       Transport: {{cars[index].brand}}
                                    </span>
                                </p>
                                <p class="col-md-4"><i class="fas fa-google-map"></i>Number Plate: {{cars[index].plate}}</p>
                                <p class="col-md-4">Capacity: {{cars[index].cargo_capacity}}</p>
                            </div>
                      
                    </div>
                </div>
                    <gmap-map
                    ref="map"
                    :center="position"
                    :zoom="12"
                    style="width:100%;  height: 400px;"
                    >
                    </gmap-map>
            </div>
        
       </section>
    </main>

</template>
<script>
export default {
    data(){
        return{
            projects:{},
            cars:{},
            flag:true,
            btnShowByStatus: 0,
            form:{
                project_id:null,
                lat:null,
                lng:null
            },
            destination:{
                lat:23.8103,
                lng:90.4125
            },
            center1:{
                project_id:null,
                lat:0.0,
                lng:0.0
            },
            center2:{
                lat:0.0,
                lng:0.0
            },
            position:{
                lat:23.23,
                lng:90.23
            },
            // destination:{
            //     lat:this.projects[this.i].destination_lat,
            //     lng:this.projects[this.i].destination_lng,
            // },
            directionsDisplay: null,
            }
        }
    ,
    created : function(){
        axios.get('/api/driver-projects')
        .then(res=>{
             this.projects = res.data.projects
            this.cars = res.data.cars})
            .catch(error=>console.log(error))
        //this.sendPosition()     
    },
    beforeDestroy () {

       clearInterval(this.intervalid1)
    },
    methods: {
        finish(i){
            axios.get(`/api/project/delivered/${this.projects[i].id}`)
            .then(res=>{
                axios.get('/api/driver-projects')
                .then(res=>{
                    console.log(res.data.projects)
                    this.projects = res.data.projects
                    this.cars = res.data.cars
                })
                .catch(error=>console.log(error))}
            )
        },
        singleProject(d){
			console.log(d)
			const id = d
			this.$router.push({name: 'driver',params:{
				id: id
				} 
			})
		},
        sendPosition(i,id){    
            this.flag = false
            axios.get(`/api/project/transfer/${id}`)
            .then(res => {
                EventBus.$emit('onTheWay',this.projects[i].id)
            })
            this.intervalid1 = setInterval(()=>{
                console.log ('success');

                /* Get direction */
                this.directionsDisplay = new google.maps.DirectionsRenderer;
                
                var directionsService = new google.maps.DirectionsService;
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position)=> {
                        console.log(position);
                        //this. = id;
                        this.center1.project_id = this.projects[i].id
                        this.center1.lat = position.coords.latitude; 
                        this.center1.lng = position.coords.longitude;
                         axios.post('/api/position',this.center1)
                        // document.getElementById("result").innerHTML = positionInfo;
                    });
                }
                // this.center1.lat= this.position.lat
                // this.center1.lng =this.position.lng 
                
                this.center2.lat= parseFloat(this.projects[i].destination_lat)
                this.center2.lng =parseFloat(this.projects[i].destination_lng)
                
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
                    this.form.project_id = id;
                    this.form.lat = position.coords.latitude; 
                    this.form.lng = position.coords.longitude;
                    axios.post('/api/position',this.form)
                    // document.getElementById("result").innerHTML = positionInfo;
                }.bind(this));
                 
                // 
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
    
         },
        getDirection(){
            // if(this.flag>1){
            //     this.directionsDisplay.setDirections(null)
            // }

        }

        
        // },
        // start(){
        //     axios.get(`/api/project/transfer/${projects.id}`)
        //     .then(res=>{
        //         this.flag = !this.flag
        //     })
        // }
    }
    // ,created(){
    //     axios.get('/api/driver-projects')
    //     .then(res=>{
    //         this.projects = res.data.projects
    //         this.cars = res.data.cars
    //         console.log(this.projects.projects)

    //     })
        //  this.location()
    // },
    ,
    mounted(){
       
    }
}
</script>