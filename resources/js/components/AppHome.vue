<template>
    <component :is="layout" >
        <router-view :layout.sync="layout"></router-view>
    </component>
</template>

<script>
<<<<<<< HEAD
import AvailableProjects from './view/AvailableProjects'
export default {
    data(){
        return{
            layout: 'div'
=======
    export default {
        data(){
            return{
                layout: 'div'
            }
        },
        components:{
        },
        created() {
                        
>>>>>>> 9c41e962446b05c480e6f0093ea34b538b4f5f49
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