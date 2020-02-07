
<template>
    <main class=" mx-lg-5 catagoris" >  
       <section  id="catagoribody">
            <div class="container mamunurrashid_gig_wraper">
                <div v-show="noProject" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>You haven't submitted any project</strong> 
                </div>

                <div class="mr_card" v-if="count == 0">
                    <div class="mr_card_body">
                        <div class="p-box  ">	
                            <div class="list list-row block"  >
                                <h2>There is no active project now.</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mr_card" v-for="(data,index)  in  projects" :key="index">
                    <div class="mr_card_body">
                        <div class="p-box  ">	
                            <div class="list list-row block"  >
                                <div class="list-item" data-id="19">
                                    
                                    <div class="flex"> <a href="#" class="item-author text-color" data-abc="true"></a>
                                   
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.name}}</div>
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.email}}</div>
                                   
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.user_info.address}}</div>
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.user_info.zip}}</div>
                                   
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.user_info.country}}</div>
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.user_info.phone}}</div>
                                   
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.user_info.vat}}</div>
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.user_info.iban}}</div>
                                        <div class="item-except text-muted text-sm h-1x">{{data.transferista.user_info.bic}}</div>
                                        <button @click="modal(index)" v-if="data.project_status == 3">Give Review</button>
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
            showed:{}
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