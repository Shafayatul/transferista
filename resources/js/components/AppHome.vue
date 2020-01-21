<template>
    <component :is="layout" >
        <router-view :layout.sync="layout"></router-view>
    </component>
</template>

<script>
    export default {
        data(){
            return{
                layout: 'div'
            }
        },
        components:{
        },
        created() {
                        
        }
    }
</script>