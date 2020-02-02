
require('./bootstrap');
window.Vue = require('vue');
import * as VueGoogleMaps from 'vue2-google-maps'

// require('@/assets/css/style.css')

// Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
import User from './helpers/User'

window.User = User

Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyAGgNecpav_4MaZdtBjZVSlJhYodFX-PUo',
      libraries: 'places',
    },
});
Vue.component('google-map', VueGoogleMaps.Map);

window.EventBus = new Vue();

Vue.component('app-home', require('./components/AppHome.vue').default);

import router from './router/router'
// router.beforeEach((to, from, next) => {
//   document.title = to.meta.title
//   next()
// })

const app = new Vue({
    el: '#app',
    router,
    watch: {
      '$route' (to, from) {
        document.title = to.meta.title || 'Home'
      },
       deep: true,
       immediate: true
    },
});
