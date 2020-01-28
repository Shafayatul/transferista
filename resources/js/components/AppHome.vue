<template>
    <component :is="layout" >
        <router-view :layout.sync="layout"></router-view>
    </component>
</template>

<script>
// import show from './view/Show'
import AvailableProjects from './view/AvailableProjects'
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
<style scoped >
    /* @import '/src/';
    @import '/src/assets/css/catagori.css';
    @import '/src/assets/css/responsive.css'; */
</style>