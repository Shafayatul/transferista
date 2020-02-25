
require('./bootstrap');
window.Vue = require('vue');
import * as VueGoogleMaps from 'vue2-google-maps'
// import CubeSpin from 'node-sass/vue-loading-spinner/components'
// require('@/assets/css/style.css')

// Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
import User from './helpers/User'

window.User = User

Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyAGgNecpav_4MaZdtBjZVSlJhYodFX-PUo',
      libraries: 'places',
    }
});

axios.interceptors.response.use(null , (error)=>{
  if(error.response.status == 401){
    
    User.logout()
  
  }
})


// jQuery.extend(true, jQuery.fn.datetimepicker.defaults, {
//   icons: {
//     time: 'far fa-clock',
//     date: 'far fa-calendar',
//     up: 'fas fa-arrow-up',
//     down: 'fas fa-arrow-down',
//     previous: 'fas fa-chevron-left',
//     next: 'fas fa-chevron-right',
//     today: 'fas fa-calendar-check',
//     clear: 'far fa-trash-alt',
//     close: 'far fa-times-circle'
//   }
// });

Vue.component('google-map', VueGoogleMaps.Map);
import StarRating from 'vue-star-rating'

Vue.component('star-rating', StarRating);

window.EventBus = new Vue();

Vue.component('app-home', require('./components/AppHome.vue').default);
Vue.component('nav-bar', require('./components/layers/navbar1.vue').default);

Vue.component('grid-loader', require('vue-spinner/src/GridLoader.vue').default);


import router from './router/router'
// router.beforeEach((to, from, next) => {
//   document.title = to.meta.title
//   next()
// })
Vue.config.debug = true // turn on debugging mode

const app = new Vue({
    el: '#app',
    Data(){
      return {
        color: '#3AB982',
        height: '35px',
        width: '4px',
        margin: '2px',
        radius: '2px',
        loading: true
      }
    },
    computed:{
      // loading(){ return true;} 
    },
    router,
    watch: {
      '$route' (to, from) {
        document.title = to.meta.title || 'Home'
      },
       deep: true,
       immediate: true
    },
});


