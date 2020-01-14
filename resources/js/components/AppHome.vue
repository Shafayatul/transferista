<template>
    <component :is="layout" >
        <router-view :layout.sync="layout"></router-view>
    </component>
</template>

<script>
import AvailableProjects from '../components/view/AvailableProjects'
    export default {
        data(){
            return{
                layout: 'div'
            }
        },
        components:{
            AvailableProjects 
        },
        created() {
                        
        }
    }
</script>