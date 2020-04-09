<template>
    <div class="session-wrapper fade-in-up">
      <div id="login" class="view jarallax page-wrapper" data-jarallax='{"speed": 0.2}'>
        <div class="mask rgba-stylish-light">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class="intro-info-content text-center">
                            <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s">How It Works</h1>
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
                     <div class="card text-white border-rad shadow border-0 worksTxt z-index">
                        <h1>How it Works</h1>
                        <p>Tranferista is your first choice for your transfer. We will bring your goods pretty fast to your desired destination.</p>
                      <div class="row">
                      <div class="col-sm-12 col-md-6">  
                        <ul class="pt-3 list-unstyled m-md-b step-count">
                            <li><div class="list-content"><div>
                                <div class="num-value mr-3 font-weight-med">1 </div>
                                </div> <div>
                                <h4>Type in the Place of Origin and Destination</h4> 
                                <p>Select the size of your parcel	Transferista is fast and secure. You will immediately get the price for your transfer</p>
                                </div></div>
                            </li>
                            <li><div class="list-content"><div>
                                <div class="num-value mr-3 font-weight-med">2</div>
                                </div> <div>
                                  <h4>Book your Transferista</h4> 
                                  <p>Transferista is perfect for short distance transfer. Like Uber. But for transportation.</p>
                                  </div></div>
                            </li>
                            <li><div class="list-content"><div>
                                <div class="num-value mr-3 font-weight-med">3</div>
                                </div> <div>
                                  <h4>Receive the parcel at your destination</h4> 
                                  <p>Be prepared. Stay online. Follow your transferista</p>
                                </div></div>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-12 col-md-6">
                          <div class="sub-heading border-rad text-center">
                            <video width="100%" controls :src="video"></video>
                          </div>
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
import navbar from '../layers/navbar1'
export default {
    data(){
      return {
          video: "https://player.vimeo.com/39970581/"
      } 
    },
    computed:{
    },
    components:{
        navbar
    },
    methods:{
        login(){
            // User.login(this.form)
            axios.post('/api/password/create',this.form)
            .then(res=>{
                this.flag = true,
                console.log(res)
            })
            .catch(error=>console.log(this.errors= error.response.data))
        }
        
    },
    created(){
        this.$emit(`update:layout`,navbar)
    }
}
</script>
<style scoped>

.page-wrapper{
  background-image: url('/../static/img/how-it-works-bg.jpg');
 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
  height: 100%;
  overflow: hidden;
  
}
.sub-heading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 100%;
    color: #fff;
    text-align: center;
}
.sign-up-page {
    margin: 30px 0 40px;
}
.worksTxt {
    border-radius: .25rem;;
    padding: 30px;
}
.bg-image{ 
  background-image: url('/../static/img/login.png');
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  -moz-background-size: cover;
  -webkit-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  margin: 0px;
  padding-left: 0;
  min-height: 650px;
  
}
.customBtn {
  border-radius: 0;
}
.sign-up-using {
  margin: 0 2rem;
}


.sign-up-using.text-center {
    margin: 0 2rem;
}
.session-wrapper {
  padding-top: 0 !important;
}
.white-text {
    color: #fff;
    font-weight: 900;
}
form.session-form {
    padding: 30px;
}
.card.border-0.card-shadow {
    min-height: 650px;
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