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
                        <span style="margin-left: 260px;" v-if="errors.first_name" class="help-block" role="alert">
                            <strong>{{errors.first_name[0]}}</strong>
                        </span>
                        <div class="form-group  d-flex">
                            <label class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input v-model="form.last_name" id="addressLine1" name="addressLine1" placeholder="Last name" class="form-control" required="true"  type="text"></div>
                            </div>
                        </div>
                            <span style="margin-left: 260px;" v-if="errors.last_name" class="help-block" role="alert">
                                <strong>{{errors.last_name[0]}}</strong>
                            </span>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">Phone Number</label>
                            <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input v-model="form.phone" id="addressLine2" name="addressLine2" placeholder="Phone" class="form-control" required="true"  type="text"></div>
                            </div>
                        </div>
                            <span style="margin-left: 260px;" v-if="errors.phone" class="help-block" role="alert">
                                <strong>{{errors.phone[0]}}</strong>
                            </span>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input v-model="form.email" id="city" name="city" placeholder="Email" class="form-control" required="true" type="text"></div>
                            </div>
                        </div>
                            <span style="margin-left: 260px;" v-if="errors.email" class="help-block" role="alert">
                                <strong>{{errors.email[0]}}</strong>
                            </span>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
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
                            <div v-for="(employee,index) in employees" :key="index">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label for="checkbox">
                                            {{employee.first_name}}
                                        </label>
                                    </div>
                                    <div class="pull-right action-buttons" style="float: right;">
                                        <a  class="flag" @click="edit(index)"><i class="fa fa-edit"></i></a>
                                        <a  class="trash" @click="trash(index)"><i class="fa fa-trash-alt"></i></a>
                                    </div>
                                </li>
                                <!-- <div  class="modal fade" :id="index"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <employee  :update="update" :employee="employee"></employee>
                                </div> -->
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import employee from './Employee'
import ProfileLayout from '../layers/ProfileLayout'
export default {
    data(){
        return{
            form:{
                first_name:null,
                last_name:null,
                phone: null,
                email:null,
                id:null
            },
            cancelFlag:false,
            errors:{},
            employees:{},
            showed:{},
            first:{},
            editFlag:null,
            i: null,
            cancelFlag: false
        }
    },
    components:{
        employee
    },
    computed:{

    },
    created(){
        this.$emit('update:layout',ProfileLayout)
        axios.get('/api/employees')
        .then(res=>{
                this.employees = res.data.employees
                // this.showed = this.employees.slice()
                // for(var i=0;i<this.showed.length;i++){
                //     var obj = Object.assign({},this.showed[i])
                //     this.showed[i]=obj
                // }
                // this.showed = this.showed.reverse()
            })
    },
    methods: {
        scrollToTop(){
            window.scrollTo(0,0)
        },
        edit(index){
            this.i = index
            this.form.first_name = this.employees[index].first_name
            this.form.last_name = this.employees[index].last_name
            this.form.email = this.employees[index].email
            this.form.phone = this.employees[index].phone
            this.form.id = this.employees[index].id
            this.editFlag = true
            this.cancelFlag = true
            this.scrollToTop()

        },
        cancel(){
            this.form.first_name = null
            this.form.last_name = null
            this.form.email = null
            this.form.phone = null
            this.form.id = null
            this.editFlag = false
            this.cancelFlag = false

        },
        // update(employee) {
        //     console.log(employee.id)
        //     axios.post('/api/employee-update',employee)
        //     .then(res=>{
        //          axios.get('/api/employees')
        //             .then(res=>{
        //                 this.employees = res.data.employees
        //                 this.showed = this.employees.slice()
        //                 for(var i=0;i<this.showed.length;i++){
        //                     var obj = Object.assign({},this.showed[i])
        //                     this.showed[i]=obj
        //                 }
        //                 // this.showed = this.showed.reverse()
        //             })
        //             .catch(error=>this.errors=error.response.data.errors)
        //         }
        //     ).catch(error=>console.log(this.errors=error.response.data.errors))
        // },
        submit() {
            this.editFlag ? this.newInsert() :this.create()
            
        },
        newInsert(){
            axios.post('/api/employee-update',this.form)
            
            .then(res=>{
                this.employees.splice(this.i,1)
                this.employees.unshift(res.data.employee)
                this.form.first_name = null
                this.form.last_name = null
                this.form.email = null
                this.form.phone = null
                this.form.id = null
                this.i=null
                this.editFlag= false
                this.cancelFlag= true
                    this.errors = {}
            }).then(error=>console.log(this.errors=error.errors))
        },
        create(){
            axios.post('/api/employees',this.form)
            .then(res=>{
                    // console.log(res)
                    // this.first = Object.assign({},this.form)
                    console.log(res.data.employee)
                    this.employees.unshift(res.data.employee)
                    this.form.first_name =null;
                    this.form.last_name =null;
                    this.form.email =null;
                    this.form.phone =null;
                    this.form.id = null;
                    this.errors = {}
                }
            ).catch(error=>this.errors=error.response.data.errors)
        },
        trash(i) {
             this.editFlag=false
            // console.log(this.employees[index].id)
            axios.delete(`/api/employees/${this.employees[i].id}`)
            .then(res=>{
                this.form.first_name = null
                this.form.last_name = null 
                this.form.email = null 
                this.form.phone = null 
                this.form.id = null
                 this.editFlag= false
                this.employees.splice(i,1)
            })
            .catch(error=>this.errors = error.response.data.errors)
            console.log(i)
           
        },
        //  edit(i) {
        //      console.log(i)
        //     $(`#${i}`).modal('show');
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