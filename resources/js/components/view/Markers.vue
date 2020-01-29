<template>
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="container emp-profile">
              <gmap-map ref="mymap" :center="startLocation" :zoom="14" style="width: 100%; height: 300px">
                <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false">
                {{infoContent}}
                </gmap-info-window>
                <gmap-marker v-for="(item, key) in coordinates" :key="key" :position="getPosition(item)" :clickable="true" @click="toggleInfo(item, key)" />
              </gmap-map>
            </div>
        </div>
    </main>
</template>

<script>
export default {
  data() {
      return{
    startLocation: {
      lat: 10.3157,
      lng: 123.8854
    },
    coordinates: {
      0: {
        full_name: 'Erich  Kunze',
        lat: '10.31',
        lng: '123.89'
      },
      1: {
        full_name: 'Delmer Olson',
        lat: '10.32',
        lng: '123.89'
      }
    },
    infoPosition: null,
    infoContent: null,
    infoOpened: false,
    infoCurrentKey: null,
    infoOptions: {
      pixelOffset: {
        width: 0,
        height: -35
      }

      }
  }
  },
  created(){
    Echo.private('positions')
    .listen('Positions',(e)=>{
      if(this.user_id == e.transferista_id){
        this.coordinates.push({
          name: e.user_name,
          lat: e.lat,
          lng: e.lng
        })
      }
    })
  },
  methods:{
    getPosition(marker){
      return {
        lat: parseFloat(marker.lat),
        lng: parseFloat(marker.lng)
      };
    },
    toggleInfo(marker, key) {
      this.infoPosition = this.getPosition(marker)
      this.infoContent = marker.full_name
      if (this.infoCurrentKey == key) {
        this.infoOpened = !this.infoOpened
      } else {
        this.infoOpened = true
        this.infoCurrentKey = key
      }
    }
  }
}
</script>