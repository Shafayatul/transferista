<template>
    <component :is="layout">
        <router-view :layout.sync="layout"></router-view>
    </component>
</template>

<script>
import profile from '../components/view/Profile'
    export default {
        data(){
            return{
                layout: 'div'
            }
        },
        components:{
            'profile': profile
        },
        created() {
                        
        }
    }
</script>