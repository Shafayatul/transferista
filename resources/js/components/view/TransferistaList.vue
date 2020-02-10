
<template>
    <main class=" mx-lg-5 catagoris" >  
       <section  id="catagoribody">
            <div class="container mamunurrashid_gig_wraper">
                <div v-show="showed" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>No accepted Transferista to show</strong> 
                </div>

                <div class="mr_card" v-for="(data,index)  in  projects" :key="index">
                    <div class="mr_card_body">
                        <div class="p-box  ">	
                            <div class="list list-row block"  >
                                <div class="list-item" data-id="19">
                                    
                                    <div class="row w-100">
                                         <a href="#" class="item-author text-color" data-abc="true"></a>
                                    
                                            <!-- <div class = "row address-row">
                                                <div class="col-md-6">

                                                    <p><b>From:</b></p>
                                                    <p>{{project.origin_address}}</p>

                                                    <p>City: {{data.transferista.name}}</p>

                                                    <p>State Zip: {{data.transferista.email}}</p>

                                                    <p>Country: {{data.transferista.user_info.address}}</p>


                                                </div>
                                                <div class="col-md-6">
                                                <p><b>Destination:</b></p>
                                                <p>{{project.destination_address}}</p>
                                                
                                                <p> City: {{data.transferista.user_info.zip}}</p>
                                                
                                                    <p>State Zip: {{data.transferista.user_info.country}}</p>
                                                
                                                    <p>Country: {{data.transferista.user_info.country}</p>
                                                </div>
                                        
                                            </div> -->
                                   <div class="col-md-6">
                                        <p class="">Name: {{data.transferista.name}}</p>
                                        <p class="">Email: {{data.transferista.email}}</p>
                                        <p class="">Address: {{data.transferista.user_info.address}}</p>
                                        <p class="">Zip: {{data.transferista.user_info.zip}}</p>
                                   </div>
                                   
                                   
                                       
                                   <div class="col-md-6">
                                        <p class="">Country: {{data.transferista.user_info.country}}</p>
                                        <p class="">Phone: {{data.transferista.user_info.phone}}</p>
                                       <p class="">Vat: {{data.transferista.user_info.vat}}%</p>
                                        <p class="">IBAN: {{data.transferista.user_info.iban}}</p>
                                        <p class="">BIC: {{data.transferista.user_info.bic}}</p>
                                   </div>
                                        
                                        <!-- <button @click="modal(index)" v-if="data.project_status == 3">Give Review</button> -->
                                    </div>
                                     <div  class="modal fade" :id="data.id"  tabindex="-1" role="dialog" aria-labelledby="oneModalLabel" aria-hidden="true">
                                        <MyRating>  :id="data.id"></MyRating>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </section>
    </main>
    
</template>
<script>
export default {
    data(){
        return{
            count:null,
            projects:{},
            showed:true
        }
    },
    methods:{
        modal(index){
            $(`#${this.projects[index].id}`).modal('show');
        }
    },
    created(){
        axios.get('/api/transferista-details-by-project-status')
        .then(res=>{
            console.log(res.data.projects)
            this.projects = res.data.projects
            this.showed = false
            if(this.projects.length == 0){
                this.showed = true
            }
            // this.projects=res.data.projects
            // this.count = this.projects.length
            // this.projects = this.projects.slice()
            // console.log(this.projects.length)
            
            // for(var i=0 ; i<this.projects.length ;i++){
            //     console.log(i)
            //     var obj = Object.assign({},this.projects[i].transferista)
            //     this.project[i]=obj;
            //     console.log(showed[i])
            // }
        })
    }
}
</script>
<style scoped>
.avatar {
    position: relative;
    line-height: 1;
    border-radius: 500px;
    white-space: nowrap;
    font-weight: 700;
    border-radius: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    border-radius: 500px;
    box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15)
}

.avatar img {
    border-radius: inherit;
    width: 100%
}

.gd-primary {
    color: #fff;
    border: none;
    background: #448bff linear-gradient(45deg, #448bff, #44e9ff)
}

.gd-success {
    color: #fff;
    border: none;
    background: #31c971 linear-gradient(45deg, #31c971, #3dc931)
}

.gd-info {
    color: #fff;
    border: none;
    background: #14bae4 linear-gradient(45deg, #14bae4, #14e4a6)
}

.gd-warning {
    color: #fff;
    border: none;
    background: #f4c414 linear-gradient(45deg, #f4c414, #f45414)
}

@media (min-width:992px) {
    .page-container {
        max-width: 1140px;
        margin: 0 auto
    }

    .page-sidenav {
        display: block !important
    }
}

.list {
    padding-left: 0;
    padding-right: 0
}

.list-item {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word
}

.list-row .list-item {
    -ms-flex-direction: row;
    flex-direction: row;
    -ms-flex-align: center;
    align-items: center;
    padding: .75rem .625rem
}

.list-row .list-item>* {
    padding-left: .625rem;
    padding-right: .625rem
}

.no-wrap {
    white-space: nowrap
}

.text-color {
    color: #5e676f
}

.text-gd {
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
}

.text-sm {
    font-size: .825rem
}

.h-1x {
    height: 1.25rem;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical
}

.w-48 {
    width: 48px !important;
    height: 48px !important
}

a:link {
    text-decoration: none
}
</style>