<template>
    <div class="row mt-5">
        <div class="col-md-6">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td colspan="1">
                        <form class="well form-horizontal" @submit.prevent="create">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Brand</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input v-model="form.brand" id="fullName" name="fullName" placeholder="First Name" class="form-control" required="true"  type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Type</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input v-model="form.type" id="addressLine1" name="addressLine1" placeholder="Last name" class="form-control" required="true"  type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Number Plate</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input v-model="form.plate" id="addressLine2" name="addressLine2" placeholder="Phone" class="form-control" required="true"  type="text"></div>
                                    </div>
                                </div>
                                <button type="submit" >Enter</button>
                            </fieldset>
                        </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Sortable Lists
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <div v-for="(car,index) in showed" :key="index">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label for="checkbox">
                                        {{car.brand}}
                                    </label>
                                    <label for="checkbox">
                                        {{car.type}}
                                    </label>
                                    <label for="checkbox">
                                        {{car.plate}}
                                    </label>
                                </div>
                                <div class="pull-right action-buttons" style="float: right;">
                                    <a  class="flag" @click="edit(index)"><i class="fa fa-edit"></i></a>
                                    <a  class="trash" @click="trash(index)"><i class="fa fa-trash-alt"></i></a>
                                </div>
                            </li>
                            <div  class="modal fade" :id="car.id"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <car  :update="update" :car="car"></car>
                            </div>
                        </div>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>
                                Total Count <span class="label label-info">25</span></h6>
                        </div>
                        <div class="col-md-6">
                            <ul class="pagination pagination-sm pull-right">
                                <li class="disabled"><a href="javascript:void(0)">«</a></li>
                                <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="http://www.jquery2dotnet.com">2</a></li>
                                <li><a href="http://www.jquery2dotnet.com">3</a></li>
                                <li><a href="http://www.jquery2dotnet.com">4</a></li>
                                <li><a href="http://www.jquery2dotnet.com">5</a></li>
                                <li><a href="javascript:void(0)">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import car from './car'
import ProfileLayout from '../layers/ProfileLayout'
export default {
    data(){
        return{
            form:{
                brand:null,
                type:null,
                plate: null
            },
            errors:{},
            cars:[],
            showed:[]
        }
    },
    components:{
        car
    },
    computed:{

    },
    created(){
        this.$emit('update:layout',ProfileLayout)
        axios.get('/api/cars')
        .then(res=>{
                this.cars = res.data.cars
                this.showed = this.cars.reverse()
            })
    },
    methods: {
        update(car) {
            axios.post(`/api/cars/${car.id}`,car)
            .then(res=>{
                 axios.get('/api/cars')
                    .then(res=>{
                        this.cars = res.data.cars
                        this.showed = this.cars.reverse()
                    })
                    .catch(error=>this.errors=error.response.data.errors)
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
        create() {
            axios.post('/api/cars',this.form)
            .then(res=>{
                    console.log(res)
                    this.showed.unshift(this.form)
                }
            ).catch(error=>console.log(error))
        },
        trash(index) {
            axios.post(`/api/cars/${cars[index].id}`,this.form)
            .then(res=>{
                     axios.get('/api/cars')
                    .then(res=>{
                        this.cars = res.data.cars
                        this.showed = this.cars.reverse()
                    })
                    .catch(error=>this.errors=error.response.data.errors)
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
         edit(index) {
            $(`#${ this.cars[index].id}`).modal('show');
        }
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
    .list-group { margin-bottom:0px; }
</style>