<template>
  <div class="contact-section py-6">
    <div class="container">
      <div class="section-title-wrapper">
        <div class="row">
          <div class="col-sm-12 col-md-6 mx-auto text-center">
            <h2>Contact Us</h2>
            <p
              class="lead"
            >Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
          </div>
        </div>
      </div>
    </div>
    <div class="g-map-custom">
      <template>
        <div>
          <gmap-map
            :center="center"
            :zoom="9"
            style="width: '300px'; height: 520px"
            class="gmap_canvas"
          >
            <gmap-marker
              :position="markers.position"
              :clickable="true"
              :draggable="false"
              @click="center=markers.position"
            ></gmap-marker>
          </gmap-map>
        </div>
      </template>
    </div>
    <div class="container">
      <div class="row row-parent">
        <div class="col-sm-12 col-md-10 col-lg-9 contact-block mx-auto">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 contact-location">
              <div class="d-flex">
                <div class="mr-4">
                  <i class="ion-ios-pin font-3x text-warning"></i>
                </div>
                <div class>
                  <h4 class="mb-2">Contact Us</h4>
                  <form id="contact_us">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-lg"
                        id="inputEmail4"
                        placeholder="Your Name"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control form-control-lg"
                        id="inputEmail4"
                        placeholder="Email"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name id class="form-control form-control-lg" placeholder="Message"></textarea>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn text-white btn-success btn-block">Send</button>
              </form>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 contact-contact">
              <div class="d-flex">
                <div class="mr-4">
                  <i class="ion-ios-chatboxes font-3x text-warning"></i>
                </div>
                <div class id="contact_info">
                  <h4 class="mb-2">Contact Info</h4>
                  <span class="truncated-parent mb-2" v-for="email of info.data.email" :key="email.value">
                    <span class="truncated" v-if="email.status == 1">
                      <a class="d-block mb-1 text-dark" href="#">{{email.value}}</a>
                    </span>
                  </span>
                  <span class="mb-2">
                    Mag. Bianca Lehrner<br> Himmelpfortgasse 20<br> 1010 Wien <br> Austria
                  </span>
                  <span class="mb-2" v-for="phone of info.data.phone" :key="phone.value">
                    <span v-if="phone.status == 1">
                      <a href="phone.value" class="d-block mb-1 text-dark">{{phone.value}}</a>
                    </span>
                  </span>
                  <span>Wirtschaftskammer Wien</span>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import info from "../data/contact.json";
// import Map from 'Components/GoogleMap/Map';
// import { mapSettings } from "Constants/mapSettings";

export default {
  // name: "google-maps",
  data() {
    return {
      info,
      center: { lat: 30.7, lng: 76.7 },
      markers: {
        position: { lat: 30.7, lng: 76.7 }
      }
    };
  }
};
</script>
<style scoped>
form#contact_us input, form#contact_us textarea {
    font-size: 14px;
}
#contact_info a {
    font-size: 1rem;
}
</style>