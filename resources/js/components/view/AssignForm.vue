<template>
     <form @submit.prevent="create">
        <div class="form-group row">
            <label class="col-sm-3 label-title">Driver</label>
            <div class="col-sm-9">	
               
            <select v-model="form.driver_id" class="form-control custom-select" id="exampleFormControlSelect1">
                    <option v-for="(data,index) in drivers" :key="index" :value="data.id" >{{data.name}}</option>
            </select>
            </div>
            <!-- <span v-if="errors.project_size" class="help-block" role="alert">
                <strong>{{errors.project_size[0]}}</strong>
            </span> -->
        </div>
        <div class="form-group row">
            <label class="col-sm-3 label-title">Vehicle</label>
            <div class="col-sm-9">	
                <!-- v-model="form.project_size"					 -->
            <select v-model="form.car_id" class="form-control custom-select" id="exampleFormControlSelect1">
                    <option v-for="(data,index) in cars" :key="index" :value="data.id" >{{data.brand}} {{data.cargo_capacity}} {{data.plate}}</option>
            </select>
            </div>
            <!-- <span v-if="errors.project_size" class="help-block" role="alert">
                <strong>{{errors.project_size[0]}}</strong>
            </span> -->
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</template>
<script>
export default {
    props:[
        'drivers','cars','project_id'
    ],
    data(){
        return{
            form:{
                project_id:this.project_id,
                driver_id:null,
                car_id:null
            }
        }
    },
    methods:{
        create(){
            axios.post('/api/assign-driver-to-project',this.form)
            .then(res=>{
                EventBus.$emit('driver-assiged')
            })
        }
    }
}
</script>