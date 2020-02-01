<template>
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="container emp-profile">               
                            <form class="well form-horizontal" @submit.prevent="submit">
                                <fieldset>
                                    <div class="form-group d-flex">
                                        <label class="col-md-3 control-label">First Name</label>
                                        <div class="col-md-9 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input v-model="form.first_name" id="fullName" name="fullName" placeholder="First Name" class="form-control" required="true"  type="text"></div>
                                        </div>
                                    </div>
                                        <span v-if="errors.first_name" class="help-block" role="alert">
                                            <strong>{{errors.first_name[0]}}</strong>
                                        </span>
                                    <div class="form-group d-flex">
                                        <label class="col-md-3 control-label">Last Name</label>
                                        <div class="col-md-9 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <input v-model="form.last_name" id="addressLine1" name="addressLine1" placeholder="Last name" class="form-control" required="true"  type="text"></div>
                                        </div>
                                    </div>
                                        <span v-if="errors.last_name" class="help-block" role="alert">
                                            <strong>{{errors.last_name[0]}}</strong>
                                        </span>
                                    <div class="form-group d-flex">
                                        <label class="col-md-3 control-label">Email</label>
                                        <div class="col-md-9 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <input v-model="form.email" id="addressLine2" name="addressLine2" placeholder="Phone" class="form-control" required="true"  type="text"></div>
                                        </div>
                                        
                                    </div>
                                        <span v-if="errors.email" class="help-block" role="alert">
                                            <strong>{{errors.email[0]}}</strong>
                                        </span>
                                    <div class="form-group d-flex">
                                        <label class="col-md-3 control-label">Phone Number</label>
                                        <div class="col-md-9 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <input v-model="form.phone" id="addressLine2" name="addressLine2" placeholder="Phone" class="form-control" required="true"  type="text"></div>
                                        </div>
                                    </div>
                                        <span v-if="errors.phone" class="help-block" role="alert">
                                            <strong>{{errors.phone[0]}}</strong>
                                        </span>
                                     <div class="form-group d-flex">
                                        <label class="col-md-3 control-label">
                                        </label>
                                        <div class="col-md-9">   
                                        <button v-show="editFlag" class="btn btn-primary" type="submit" >Update</button>
                                        
                                        <button v-if="!editFlag" class="btn btn-primary" type="submit" >Create</button>
                                        
                                     </div>
                                     </div>
                                </fieldset>
                            </form>
                           
                <div class="panel panel-primary m-2">
                    
                    <div class="panel-body m-2">
                        <ul class="list-group">
                            <div v-for="(driver,index) in drivers" :key="index">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label for="checkbox">
                                            {{driver.first_name}}
                                        </label>
                                        <label for="checkbox">
                                            {{driver.last_name}}
                                        </label>
                                        <label for="checkbox">
                                            {{driver.email}}
                                        </label>
                                        <label for="checkbox">
                                            {{driver.phone}}
                                        </label>
                                    </div>
                                    <div class="pull-right action-buttons" style="float: right;">
                                        <a  class="flag" @click="edit(index)"><i class="fa fa-edit"></i></a>
                                        <a  class="trash" @click="trash(index)"><i class="fa fa-trash-alt"></i></a>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <div class="panel-footer m-2">
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
    </main>
</template>
<script>
import driver from './Driver'
import ProfileLayout from '../layers/ProfileLayout'
export default {
    data(){
        return{
            form:{
                first_name:null,
                last_name:null,
                email: null,
                phone: null,
                id: null
            },
            errors:{},
            drivers:{},
            editFlag: false,
            i:null
        }
    },
    components:{
        driver
    },
    computed:{

    },
    created(){
        this.$emit('update:layout',ProfileLayout)
        axios.get('/api/drivers')
        .then(res=>{
            this.drivers = res.data.data
            this.showed = this.drivers.reverse()
        })
    },
    methods: {
        submit() {
            this.editFlag ? this.newInsert() :this.create()
            
        },
        edit(index){
            this.i = index
            this.form.first_name = this.drivers[index].first_name
            this.form.last_name = this.drivers[index].last_name
            this.form.email = this.drivers[index].email
            this.form.phone = this.drivers[index].phone
            this.form.id = this.drivers[index].id
            this.editFlag = true
        },
        // update(driver) {
        //     axios.post('/api/driver-update',driver)
        //     .then(res=>{
        //          axios.get('/api/drivers')
        //             .then(res=>{
        //                 this.drivers = res.data.drivers
        //                 this.showed = this.drivers.slice()
        //                 for(var i=0;i<this.showed.length;i++){
        //                     var obj = Object.assign({},this.showed[i])
        //                     this.showed[i]=obj
        //                 }
        //                 this.showed = this.showed.reverse()
        //             })
        //             .catch(error=>this.errors=error.response.data.errors)
        //         }
        //     ).catch(error=>this.errors=error.response.data.errors)
        // },
        submit() {
            this.editFlag ? this.newInsert() :this.create()
            
        },
        create() {
            axios.post('/api/drivers',this.form)
            .then(res=>{
                    // console.log(res)    
                    // console.log(res.data.data)
                    this.drivers.unshift(res.data.data)
                    this.form.first_name =null;
                    this.form.last_name =null;
                    this.form.email =null;
                    this.form.phone =null;
                    this.errors = {}
                
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
        newInsert(){
            
            axios.post(`/api/drivers/${this.form.id}`,this.form)   
            .then(res=>{
                this.drivers.splice(this.i,1)
                this.drivers.unshift(res.data.data)
                this.form.first_name = null
                this.form.last_name = null
                this.form.email = null
                this.form.phone = null
                this.form.id = null
                this.editFlag= false
                this.i = null
                this.errors = {}

            }).then(error=>console.log(this.errors=error.response.data.errors))
        },
        trash(index) {
            // console.log(this.drivers[index].id)
            axios.delete(`/api/drivers/${this.drivers[index].id}`)
            .then(res=>{
                this.form.first_name = null
                this.form.last_name = null 
                this.form.email = null 
                this.form.phone = null 
                this.form.id = null
                this.drivers.splice(index,1)

            }
            ).catch(error=>this.errors=error.response.data.errors)
        }
        //  edit(index) {
        //     $(`#${ this.drivers[index].id}`).modal('show');
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
    .list-group { margin-bottom:0px; }
</style>