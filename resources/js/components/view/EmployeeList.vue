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
                                    <label class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input v-model="form.first_name" id="fullName" name="fullName" placeholder="Full Name" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input v-model="form.last_name" id="addressLine1" name="addressLine1" placeholder="Address Line 1" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Phone Number</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input v-model="form.phone" id="addressLine2" name="addressLine2" placeholder="Address Line 2" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input v-model="form.email" id="city" name="city" placeholder="City" class="form-control" required="true" value="" type="text"></div>
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
                        <div v-for="(employee,index) in employees" :key="index">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox" />
                                    <label for="checkbox">
                                        {{employee.name}}
                                    </label>
                                </div>
                                <div class="pull-right action-buttons" style="float: right;">
                                    <a href="http://www.jquery2dotnet.com" class="flag" @click="edit"><i class="fa fa-edit"></i></a>
                                    <a href="http://www.jquery2dotnet.com" class="trash" @click="trash(employee.id)"><i class="fa fa-trash-alt"></i></a>
                                </div>
                            </li>
                            <div  class="modal fade" :id="employee.id"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <employee :employee="employee" :editEmployee = "update"></employee>
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
import ProfileLayout from '../layers/ProfileLayout'
export default {
    data(){
        return{
            form:{
                first_name:null,
                last_name:null,
                phone: null,
                email:null
            },
            employees:[]
        }
    },
    methods:{
        create(){
            axios.post('/api/employees',this.form)
            .then(res=>{
                    this.employees.unshift(this.form)
                    console.log(this.employees)
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
        update(employee){
            axios.post('/api/employee-update',employee)
            .then(res=>{
                 axios.get('/api/employees')
                    .then(res=>{
                        this.employees = res.data.employees
                    })
                    .catch(error=>this.errors=error.response.data.errors)
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
        trash(index){
            axios.post(`/api/employees/${employees[index].id}`,this.form)
            .then(res=>{
                     axios.get('/api/employees')
                    .then(res=>{
                        this.employees = res.data.employees
                    })
                    .catch(error=>this.errors=error.response.data.errors)
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
         edit(index){
            $(`#${ this.employees[index].id}`).modal('show');
        },
    },
    created(){
        this.$emit('update:layout',ProfileLayout)
        axios.get('/api/employees')
        .then(res=>this.employees = res.data.employees)
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