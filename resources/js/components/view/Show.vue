<template>
    <div>
        {{lat}}
        {{lng}}
    </div>
</template>
<script>
export default {
    data(){
        return{
            lat:null,
            lng:null
        }
    },
    created(){
        this.location()
       
    }
    ,methods:{
        location(){
            alert();
             if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    console.log(position);
                    this.lat = position.coords.latitude; 
                    this.lng = position.coords.longitude;
                    // document.getElementById("result").innerHTML = positionInfo;
                }.bind(this));

            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
    
        }
    }
}
</script>