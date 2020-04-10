<template>
    <div class="session-wrapper fade-in-up">
      <div id="login" class="view jarallax page-wrapper" data-jarallax='{"speed": 0.2}'>
        <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class="intro-info-content text-center">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s">About Us</h1>
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
                      <section class="text-center my-5 wow fadeIn" data-wow-delay="0.3s">

                      <!-- Section heading -->
                      <h2 class="h1-responsive font-weight-bold text-center my-5">Meet Our Team</h2>
                      <hr/>
                      <!-- Section description -->
                <div class="team team-about section-gap">
   
                      <div class="section-title-wrapper mb-5">
                          <div class="row">
                            <div class="col-sm-12 col-md-6 mx-auto text-center">
                                <!--h2 class="mb-3"> Meet Our Team </h2-->
                                <p class="lead">Our creative specialists work on an international level at branding, design and development.</p>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div  class="col-sm-12 col-md-6 m-sm-b" v-for="content of team.data.slice(0,2)" :key="content.id">
                            <div class="card border-0 text-center">
                                <div class="overlay-wrap mb-4">
                            <div class="circle-1 circle-style"></div>
                            <div class="circle-2 circle-style"></div>
                            <div class="circle-3 circle-style"></div>
                                  <img class="img-fluid rounded-circle shadow-md" :src="content.image_path" alt="Card image cap" width="238" height="238" />
                                </div>
                                <div class="card-body p-0">
                                  <h4 class="card-title mb-2">{{content.name}}</h4>
                                  <span class="text-primary d-block font-italic mb-3">{{content.type}}</span>
                                  <p class="card-text mb-4">{{content.content}}</p>
                                  <SocialIconsV2/>
                                </div>
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
import SocialIconsV2 from '../sections/SocialIconsV2'
import team from '../data/team.json';
import navbar from '../layers/navbar1'
export default {

   data(){
      return{
        team
      }
    },
    computed:{
    },
    components:{
        navbar,
        SocialIconsV2
    },

    created(){
        this.$emit(`update:layout`,navbar)
    }
}
</script>
<style scoped>

.page-wrapper{
  background-image: url('/../static/img/send-message.jpg');
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
/* .btn--radius {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
} */
.btn .btn--radius-2 {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.btn .btn--red {
  background: #ff4b5a;
}
.btn .btn--red:hover {
  background: #eb3746;
}
</style>