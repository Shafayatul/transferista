
require('./bootstrap');
window.Vue = require('vue');
import * as VueGoogleMaps from 'vue2-google-maps'

// require('@/assets/css/style.css')


import User from './helpers/User'

window.User = User

Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyAGgNecpav_4MaZdtBjZVSlJhYodFX-PUo',
      libraries: 'places'
    },
});
Vue.component('google-map', VueGoogleMaps.Map);

window.Bus = new Vue();

Vue.component('app-home', require('./components/AppHome.vue').default);

import router from './router/router'


const app = new Vue({
    el: '#app',
    router
});
