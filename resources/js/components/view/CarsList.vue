<template>
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="container emp-profile">       
                <form class="well form-horizontal" @submit.prevent="submit">
                    <fieldset class="col-lg-8 offset-2">
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">Brand</label>
                            <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input v-model="form.brand" id="fullName" name="fullName" placeholder="Brand" class="form-control" required="true"  type="text"></div>
                            </div>
                        </div>
                            <span style="margin-left: 260px;" v-if="errors.brand" class="help-block" role="alert">
                                <strong>{{errors.brand[0]}}</strong>
                            </span>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">Type</label>
                            <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input v-model="form.type" id="addressLine1" name="addressLine1" placeholder="Type" class="form-control" required="true"  type="text"></div>
                            </div>
                        </div>
                            
                            <span style="margin-left: 260px;" v-if="errors.type" class="help-block" role="alert">
                                <strong>{{errors.type[0]}}</strong>
                            </span>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">Number Plate</label>
                            <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input v-model="form.plate" id="addressLine2" name="addressLine2" placeholder="Number Plate" class="form-control" required="true"  type="text"></div>
                            </div>
                        </div>
                            
                            <span style="margin-left: 260px;" v-if="errors.plate" class="help-block" role="alert">
                                <strong>{{errors.plate[0]}}</strong>
                            </span>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">Capacity</label>
                            <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input v-model="form.cargo_capacity" id="addressLine2" name="addressLine2" placeholder="Capacity" class="form-control" required="true"  type="text"></div>
                            </div>
                        </div>
                            
                            <span v-if="errors.cargo_capacity" class="help-block" role="alert">
                                <strong>{{errors.cargo_capacity[0]}}</strong>
                            </span>
                            <div class="form-group d-flex">
                            <div class="col-md-3"></div>
                            <div class=" col-md-9" >     
                            <button v-show="editFlag" class="btn btn-primary" type="submit" >Update</button>
                            <button v-show="cancelFlag" @click="cancel" class="btn btn-primary" >Cancel</button>
                            
                            <button v-if="!editFlag" class="btn btn-primary" type="submit" >Create</button>
                            
                            </div>
                            </div>
                    </fieldset>
                </form>
                          
                <div class="panel panel-primary">
                    
                    <div class="panel-body">
                        <ul class="list-group">
                            <div v-for="(car,index) in cars" :key="index">
                                <li class="list-group-item row">
                                    <div class="col-md-10 count-label">
                                        <label>
                                            {{car.brand}}
                                        </label>
                                        <label>
                                            {{car.type}}
                                        </label>
                                        <label >
                                            {{car.plate}}
                                        </label>
                                        <label >
                                            {{car.cargo_capacity}}
                                        </label>
                                    </div>
                                    <div class="pull-right action-buttons col-md-2" >
                                        <a  class="flag" @click="edit(index)"><i class="fa fa-edit"></i></a>
                                        <a  class="trash" @click="trash(index)"><i class="fa fa-trash-alt"></i></a>
                                    </div>
                                </li>
                                
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import ProfileLayout from '../layers/ProfileLayout'
export default {
    data(){
        return{
            form:{
                brand:null,
                type:null,
                plate: null,
                cargo_capacity:null,
                id:null
            },
            editFlag:false,
            errors:{},
            cars:{},
            i:null,
            cancelFlag: false
        }
    },
    computed:{

    },
    created(){
        this.$emit('update:layout',ProfileLayout)
        axios.get('/api/cars')
        .then(res=>{
                console.log(res.data.cars)
                this.cars = res.data.cars
                // this.showed = this.cars.slice()
                // for(var i=0;i<this.showed.length;i++){
                //     var obj = Object.assign({},this.showed[i])
                //     this.showed[i] = obj
                // }
                // this.showed = this.showed.reverse()

            })
    },
    methods: {
        scrollToTop(){
            window.scrollTo(0,0)
        },
        submit() {
            this.editFlag ? this.newInsert() :this.create()
            
        }, 
        edit(index){
            this.i = index
            this.form.brand = this.cars[index].brand
            this.form.type = this.cars[index].type
            this.form.plate = this.cars[index].plate
            this.form.id = this.cars[index].id
            this.form.cargo_capacity = this.cars[index].cargo_capacity
            this.editFlag = true
            this.scrollToTop()
        },
        cancel(){
            this.form.brand = null
            this.form.type = null
            this.form.plate = null
            this.form.cargo_capacity = null
            this.form.id = null
            this.editFlag = false
            this.cancelFlag = false

        },
        // update(car) {
        //     axios.post(`/api/cars/${car.id}`,car)
        //     .then(res=>{
        //          axios.get('/api/cars')
        //             .then(res=>{
        //                 this.cars = res.data.cars
        //                 this.showed = this.cars.slice()
        //                 for(var i=0;i<this.showed.length;i++){
        //                     var obj = Object.assign({},this.showed[i])
        //                     this.showed[i] = obj
        //                 }
        //                 this.showed = this.showed.reverse()
        //             })
        //             .catch(error=>this.errors=error.response.data.errors)
        //         }
        //     ).catch(error=>this.errors=error.response.data.errors)
        // },
        create() {
            axios.post('/api/cars',this.form)
            .then(res=>{
                    // console.log(res)
                    // this.first = Object.assign({},this.form)
                    // console.log(this.first)
                    this.cars.unshift(res.data.car)
                    this.form.brand =null;
                    this.form.type =null;
                    this.form.plate =null;
                    this.form.cargo_capacity =null;
                    this.errors = {}
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
        newInsert(){
            
            axios.post(`/api/cars/${this.form.id}`,this.form)
            .then(res=>{
                console.log(res.data.car)
                this.cars.splice(this.i,1)
                this.cars.unshift(res.data.car)
                this.form.brand = null
                this.form.type = null
                this.form.plate = null
                this.form.cargo_capacity = null
                this.editFlag= false
                this.i=null
                this.errors = {}
            }).then(error=>console.log(this.errors=error.response.data.errors))
        },
        trash(index) {
            axios.delete(`/api/cars/${this.cars[index].id}`)
            .then(res=>{
                    this.cars.splice(index,1)
                    this.form.brand=null
                    this.form.plate=null
                    this.form.type=null
                    this.form.cargo_capacity=null
                    this.editFlag=false
                }
            ).catch(error=>this.errors=error.response.data.errors)
        }
        //  edit(index) {
        //     $(`#${ this.cars[index].id}`).modal('show');
        // }
    }
}
</script>
<style scoped>
    .trash { color:rgb(209, 91, 71); margin: 20px; }
    .flag { color:rgb(248, 148, 6); }
    .pull-right .action-buttons{float: right;}
    .panel-body { padding:0px; }
    .panel-footer .pagination { margin: 0; }
    .panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
    .panel-body .radio, .checkbox { display:inline-block;margin:0px; }
    .panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
    .list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
    .list-group[data-v-1a65dcec] {
    margin-bottom: 2%;
     }
    .label{
         max-width: 100%;

    }
    .count-label label{
       margin-left:4%;
    }
    .panel-primary{
        margin-bottom:60px;
        margin-top:60px;
    }
</style>