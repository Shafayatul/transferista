<template>
    <div class="session-wrapper fade-in-up">
      <div id="login" class="view jarallax page-wrapper" data-jarallax='{"speed": 0.2}'>
        <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class="intro-info-content text-center">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s">Contact Us</h1>
                            <h5 class="text-uppercase white-text mb-5 mt-1 font-weight-bold wow fadeInDown" data-wow-delay="0.3s"> </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sign-up-page">
      <div class="container-full-width">
         <div class="row" style="margin-top: -100px;">
            <div class="col-sm-12 col-md-12 col-lg-9 mx-auto">
                     <!--Grid column-->

              <div class="card">
                <div class="card-body">

                  <div class="container">
                          <section class="my-5 wow fadeIn" data-wow-delay="0.3s">

                          <!-- Section heading -->
                          <h2 class="h1-responsive font-weight-bold text-center my-5">Contact Us</h2>
                          <hr/>
                          <div class="contact_info">
                          <div class="col-12 col-md-12 col-lg-6 col-xl-6 contact-location">
                            <div class="d-flex">
                              <div class="mr-4">
                                <i class="ion-ios-pin font-3x text-warning"></i>
                              </div>
                              <div class>
                                <h4 class="mb-2">Send Message</h4>
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
                                <h4 class="mb-2">Contact Address</h4>
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
                     </section>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div><!-- container closed -->
      </div>
   </div><!-- session Wrapper closed -->
</template>
<script>
console.clear()
import info from "../data/contact.json";
import navbar from '../layers/navbar1'
export default {

   data(){
      return{
        info
      }
    },
    computed:{
    },
    components:{
        navbar
    },

    created(){
        this.$emit(`update:layout`,navbar)
    }
}
</script>
<style scoped>

.page-wrapper{
  background-image: url('/../static/img/under-maintenance.png');
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
  height: 100%;
  overflow: hidden;
  
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card {
    font-weight: 400;
    border: 0;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
}

.sign-up-page {
    margin: 30px 0 40px;
}
.worksTxt {
    border-radius: 0;
    padding: 30px;
}
.contact_info {
    padding: 30px 0 100px;
    float: left;
}
.session-wrapper {
  padding-top: 0 !important;
}
.white-text {
    color: #fff;
    font-weight: 900;
}

.jarallax {
    height: 100px !important;
    min-height: 600px;
}
.rgba-stylish-light {
    background-color: rgba(62,69,81,0.5);
    height: 100%;
}
.card-5{
    max-width: 70%;
    margin: 0 auto;
}
.select2-selection__rendered {
  line-height: 50px;
  padding-left: 0;
  color: #555;
  font-size: 16px;
  font-family: inherit;
  padding-left: 22px;
  padding-right: 50px;
}
.font-weight-bold {
    font-weight: 700!important;
}
.btn {
  display: inline-block;
  line-height: 50px;
  padding: 0 50px;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  cursor: pointer;
  font-size: 15px;
  text-transform: uppercase;
  font-weight: 700;
  color: #fff;
  font-family: inherit;
} 
form#contact_us input, form#contact_us textarea {
    font-size: 14px;
    padding: 20px 15px;
    border-radius: 0px;
}
.btn-block {
    border-radius: 0;
    width: 50%;
}
#contact_info a {
    font-size: 1rem;
}

</style>