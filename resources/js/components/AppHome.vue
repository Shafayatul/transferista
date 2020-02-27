<template>
    <component :is="layout" >
        <v-container>
        <router-view :layout.sync="layout"></router-view>
        </v-container>
    </component>
</template>
<script>

// import show from './view/Show'
import AvailableProjects from './view/AvailableProjects'
export default {
    data(){
        return{
            layout: 'div',
            color: '#3AB982',
            height: '35px',
            width: '4px',
            margin: '2px',
            radius: '2px',
            loading: null
        }
    },
    components:{
        AvailableProjects
    },
    beforeCreate(){
        this.loading=true
    },
    created() {
    },
    mounted() {

    }
}
</script>
<style scoped >
    /* @import '/src/';
    @import '/src/assets/css/catagori.css';
    @import '/src/assets/css/responsive.css'; */
</style>
