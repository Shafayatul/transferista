<template>
    <component :is="layout" >
        <router-view :layout.sync="layout"></router-view>
    </component>
</template>

<script>
import googlemap from './googlemap'
    export default {
        data(){
            return{
                layout: 'div'
            }
        },
        components:{
            googlemap 
        },
        created() {
                        
        }
    }
</script>