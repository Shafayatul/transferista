<template>
    <div class="body-class catagoris">
        <section id="catagoribody">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 order-last order-lg-first">
                        <div class="mr_aside">
                            <h3>Catagories</h3>
                            <ul>
                                <li><a class="active" href="#">Logo Design</a></li>
                                <li><a href="#">Product Design</a></li>
                                <li><a href="#">Flyer Design</a></li>
                                <li><a href="#">Banner Design</a></li>
                                <li><a href="#">T-Shirt Design</a></li>
                                <li><a href="#">Illustration</a></li>
                                <li><a href="#">2D & 3D Design</a></li>
                                <li><a href="#">App Design</a></li>
                                <li><a href="#">Web Template</a></li>
                                <li><a href="#">Presentation</a></li>
                            </ul>
                        </div>
                    </div>
					<div class="col-lg-8 order-first order-lg-last">
						<div class="row filter">
							<div class="col-md-5">
								<div class="range">
									<p>Price Range</p>
									<form action="#">
										<input type="text" class="mr-price"><span>To</span>
										<input type="text" class="mr-price">
										<button type="submit" class="mr-price_btn"><i class="fa fa-angle-right"></i>
										</button>
									</form>
								</div>
							</div>
							<div class="col-md-7">
								<div class="best-filter">
									<p>Short By :</p>
									<form action="#">
										<select class="mr_select">
											<option value="1">Best Selling</option>
											<option value="2">New</option>
											<option value="3">Popular</option>
											<option value="4">Tranding</option>
										</select>
									</form>
								</div>
							</div>
						</div>
						<div class="row mamunurrashid_gig_wraper">							
							<div class="col-md-10">
								<div class="mr_card">
									<div class="mr_card_body">
										<div class="offset-1">
											<div class="p-box row ">											
												<a class="p col-md-9" href="jobDetails.html">
													<h5 class="fonts-title">I will Do 2 Minit Logo With 48 Hours <br><small>5 day left</small></h5>
													<span class="body-color">
														See more: prime contractors writing publishing, article writing software blog, article writing publishing, blog writers need, excel macro move rows need speed process, 
													</span>
												</a>
												<ul class="col-md-3 text-center">
                                                    <li class="mb-2"><span>45$</span><br></li>
                                                    <li class="mb-2"><small>10 bids</small></li>
                                                    <li class="mb-2"><button class="btn btn-success "><a class="font-color" href="jobDetails.html">Bid Now</a></button></li>
												</ul>

											</div>
											<div class=" d-flex ">											
											<p class="sr col-md-4">
												<span class="stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span><br>
												<span class="review">
													23 Review
												</span>
											</p>
											<p class="col-md-4"><i class="fas fa-google-map"></i>Location</p>
											<p class="col-md-4">Review</p>
										</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="row paginationsarea">
							<div class="col-12 d-flex justify-content-end">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item">
											<a class="page-link" href="#" aria-label="Previous">
												<span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
												<span class="sr-only">Previous</span>
											</a>
										</li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item">
											<a class="page-link" href="#" aria-label="Next">
												<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
												<span class="sr-only">Next</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import DashboardLayout from "../layers/DashboardLayout";
export default {
    components:{
        DashboardLayout
    },
    created(){
        this.$emit(`update:layout`,DashboardLayout)
    }
}
</script>
<style scoped>
/* .catagoris #catagoribody .mamunurrashid_gig_wraper{
  margin-top: 40px;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card {
  margin-bottom: 30px;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_img img{
  -webkit-transition: all .4s;
  -moz-transition: all .4s;
  -o-transition: all .4s;
  -ms-transition: all .4s;
  transition: all .4s;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_img {
  overflow: hidden;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card:hover .mr_img img{
transform: scale(1.1) rotate(3deg);
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body {
  background: #ecf6ff;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body .price{
  margin: 0px 30px;
  position: relative;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body .price a p{
  font-size: 15px;
  font-weight: 500;
  line-height: 40px;
  color: #707070;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body .price .p-box{
  width: 100%;
  background: #fff;
  box-shadow: 0px 0px 30px solid rgba(0, 0, 0, 0.2);
  padding: 10px 15px;
  position: absolute;
  top: -30px;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body  .title{
  padding: 57px 15px 32px;
  box-shadow: 0px 0px 30px solid rgba(0, 0, 0, 0.2);
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body  .title .p{
 font-size: 17px;
 font-weight: 500;
 width: 60%;
 color: #707070;
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body  .title .sr{
 font-size: 16px;
 font-weight: 500;
 text-align: centerl
}
.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body  .title span i{
color: #e9be0b;
}

.catagoris #catagoribody .mamunurrashid_gig_wraper .mr_card .mr_card_body  .title .review{
display: block;
font-size: 16px;
} */
</style>