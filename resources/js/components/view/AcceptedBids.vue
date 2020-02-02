<template>  
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid">
            <div class="container emp-profile mt-5">
            <div class="row">
                
             <div class="col-md-6">
                 <div v-show="success" class="alert alert-warning alert-dismissible fade show" role="alert">
                 Driver Assigned successfully
                <button @click="success =!success" type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="accordion" id="accordionExample">
                        <div class="card" v-for="(data,index) in projects" :key="index">
                            <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#demo' + index" :aria-expanded="{true: index === 0}" aria-controls="collapseOne">
                                {{data.project_title}}
                                </button>
                            </h2>
                            </div>
                            <div :id="['demo'+index]" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <AssignForm :drivers="drivers" :cars="cars" :project_id="data.id"></AssignForm>
                                <!-- <form action="">
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Driver</label>
                                        <div class="col-sm-9">	
                                           
                                        <select  class="form-control custom-select" id="exampleFormControlSelect1">
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
                                    <div class="form-group row">
                                        <label class="col-sm-3 label-title">Vehicle</label>
                                        <div class="col-sm-9">	
                                           					 
                                        <select  class="form-control custom-select" id="exampleFormControlSelect1">
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
                                </form> -->
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2
                                </button>
                            </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                                </button>
                            </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div>
                        </div>
                </div>    
             <div class="col-md-6">
                    
                <gmap-map ref="mymap" :center="startLocation" :zoom="14" style="width: 100%; height: 100vh;">
                    <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false">
                    {{infoContent}}
                    </gmap-info-window>
                    <gmap-marker v-for="(item, key) in coordinates" :key="key" :position="getPosition(item)" :clickable="true" @click="toggleInfo(item, key)" />
                </gmap-map>
                <div v-show="noBids" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>No bids has been accepted yet</strong> 
                </div>
                </div>

                 <!-- <div id="accordion">
                    <div class="mr_card" v-for="(data,index) in projects" :key="index" >
                      <h5 class="fonts-title" ><a  data-toggle="collapse" :data-target="`#collapseThree`" aria-expanded="false" aria-controls="collapseThree" href="#collapseThree">saif</a></small></h5>
                        <div  class="mr_card_body  collapsed" id="collapseThree">
                            <div class="offset-1 " >
                                <div class="p-box row ">											
                                    <div  class="p-box col-md-9">                                      
                                        <span class="body-color">
                                            <p>
                                            {{data.project_description}}
                                            </p>
                                        </span>
                                    </div>
                                    <ul class="col-md-3 text-center">
                                        <li class="mb-2"><small>10 bids</small></li>
                                        <li class="mb-2"><button v-show="flag" class="btn btn-success " @click="modal(index)"><a class="font-color" >Bid Now</a></button></li>
                                    </ul>
                                </div>
                                <div class=" d-flex ">											
                                    <p class="sr col-md-4">
                                        <span class="stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span><br>
                                        <span class="review">
                                            23 Review
                                        </span>
                                    </p>
                                    <p class="col-md-4"><i class="fas fa-google-map"></i>Location</p>
                                    <p class="col-md-4">Review</p>
                                </div>
                            </div>
                        </div>
                        <div :id="index" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                        <div  class="modal fade" :id="data.id"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <SetDriver  :bid="bid" :data="data"></SetDriver>
                        </div>
                    </div>
                </div>  
                 -->
            </div>
            </div>
            </div>
    </main>
</template>
<script>
import AssignForm from './AssignForm'
export default {
    data(){
        return{
            noBids:false,
            success:false,
            flag:true,
            projects:{},
            cars:{},
            drivers:{}, 
            form:{

            },
            errors:{},

            startLocation: {
            lat: 10.3157,
            lng: 123.8854
            },
            coordinates: {
                0: {
                    full_name: 'Erich  Kunze',
                    lat: '10.31',
                    lng: '123.89'
                },
                1: {
                    full_name: 'Delmer Olson',
                    lat: '10.32',
                    lng: '123.89'
                }
            },
            infoPosition: null,
            infoContent: null,
            infoOpened: false,
            infoCurrentKey: null,
            infoOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            }
        }
    },
    components:{
        AssignForm
    },
    methods:{
        singleProject(d){
			const id = d
			this.$router.push({name: 'singleProject',params:{
				id: id
				} 
			})
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
        }
        ,
		modal(index){
            $(`#${ this.projects[index].id}`).modal('show');
        },
        
    },
    created(){
		axios.get('/api/projects')
		.then(res =>{ 
            this.projects = res.data.data
            if(this.projects.length === 0){
                this.noProject = true
            }
                axios.get('/api/cars')
                .then(res=>{
                    this.cars = res.data.cars
                })
                .catch(error=>errors=error.response.data.errors) 
                axios.get('/api/drivers')
                .then(res=>{
                    this.drivers = res.data.data
                })
                .catch(error=>errors=error.response.data.errors)
			})
        .catch(error=>{
            console.log(error)
        })


		// if(User.customer() || User.company() ){
		// 	this.flag = false
		// }
    },
    mounted(){
        EventBus.$on('driver-assiged',()=>{
            this.success = true
        })
    }
}
</script>
<style scoped>
.navbar-brand {
   display: none !important;
}
</style>