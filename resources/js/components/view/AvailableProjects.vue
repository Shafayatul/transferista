<template>
    <div class="body-class catagoris">
        <section id="catagoribody">
            <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="input-group" id="adv-search">
							<input type="text" class="form-control" placeholder="Search for snippets" />
							<div class="input-group-btn">
								<div class="btn-group" role="group">
									
									<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
	
                <div class="row">
                    <div class="col-lg-4 order-last order-lg-first">
                        <div class="mr_aside">
                            <h3>Filters</h3>
							<div class="filter-by">
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
							<div class="filter-by">
								<p>Duration :</p>
								<form action="#">
									<select class="mr_select">
										<option value="1">Best Selling</option>
										<option value="2">New</option>
										<option value="3">Popular</option>
										<option value="4">Tranding</option>
									</select>
								</form>
							</div>
							<div class="input-group">
								<span class="input-group-addon">From</span>
								<input id="date" type="text" class="form-control" name="date" placeholder="2018-01-01">
								<span class="input-group-addon">To</span>
								<input id="date" type="text" class="form-control" name="date" placeholder="2019-01-01">
								
			
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</div>
							</div>
                    	</div>
                    </div>
					<div class="col-lg-8 order-first order-lg-last">
						<div class="row filter">
							<div class="range">
								<p>Price Range</p>
								<form action="#">
									<!-- <input v-model="query" v-text="selectedItem ? selectedItem[filterBy] : ''" type="text" class="mr-price">
									<div class="options">
										<ul>
											<li 
											:key="match[index]" 
											v-for="(match,index) in matches"
											:class="{'seleted': (seleted == index)}"
											v-text="match[filterBy]"
											@click="itemClicked(index)"
											></li>
										</ul>
									</div> -->
									<button type="submit" class="mr-price_btn"><i class="fa fa-angle-right"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="row mamunurrashid_gig_wraper">							
							<div class="col-md-10">
								<div class="mr_card" v-for="(data,index) in projects" :key="index">
									<div class="mr_card_body">
										<div class="offset-1">
											<div class="p-box row ">											
												<a class="p col-md-9" href="jobDetails.html">
													<h5 class="fonts-title">{{data.project_title}}<br><small>{{ timeLeft(data.created_at) }} days left</small></h5>
													<span class="body-color">
														{{data.project_description}}
													</span>
												</a>
												<ul class="col-md-3 text-center">
													<li class="mb-2"><small>10 bids</small></li>
													<li class="mb-2"><button class="btn btn-success "><a class="font-color" href="jobDetails.html">Bid Now</a></button></li>
												</ul>

											</div>
											<div class=" d-flex ">											
												<p class="sr col-md-4">
													<!-- <span class="stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</span><br> -->
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
import Axios from 'axios'
Axios.defaults.baseURL = 'http://192.168.0.101:8000'
import DashboardLayout from "../layers/DashboardLayout";
export default {
	data(){
		return{
			seleted: 0,
			query: null,
			filterBy: null,
			selectItem: null,
			projects:[]
		}
	},
    components:{
        DashboardLayout
	},
	methods:{
		timeLeft(date){
			let oneDay = 1000*60*60*24; 
			let today = Date.now();
			let date1 = date.getTime();


			let date2 = date1 + (7*1000*60*60*24);

			let left = Math.round((date2 - today.getTime()/oneDay));
			
			return left;

		}
		// itemClicked(){
		// 	this.seleted = index;
		// 	this.selectItem();
		// },
		// selectItem(){
		// 	this.selectItem = this.matches[this.seleted];
		// 	this.visible = null;
		// }
	},
	computed:{
		// matches(){
		// 	if(this.query == ''){
		// 		return [];
		// 	}
		// 	return this.items.filter((item)=>item[this.filterBy].toLowerCase.includes(this.query.toLowerCase()))
		// }
	},
    created(){
		// console.log('working')
		this.$emit(`update:layout`,DashboardLayout)
		Axios.get('/api/project-list')
		.then(res => this.projects = res.data.projects)
		.catch(error=>console.log(error))
    }
}
</script>
<style scoped>
.filter-by{
	text-align: center;
	padding: 27px 0pc;
	font-size: 22px;
}
.filter-by p{
	float:  left;
	margin-left: 50px;
}
.filter-by form{
    border: aliceblue;
}
.filter-by form select{
	
    color: #1a8282;
	border: white;
}

.SectionJobFilter-duration {
    margin-top: 16px;
}


.options{
	max-height: 100px;
	overflow-y: scroll;
	margin-top: 5px; 
}
.options ul{
	list-style-type: none;
	text-align: left;
	padding-left: 0px;

}
.options ul li{
	border-bottom: 1px solid lightgray;
	padding: 10px;
	cursor: pointer;
	background: lightgrey;

}
.options ul li .selected{

	background: green;
	color: white;
	font-weight: 600;

}
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 6px 20px;
}
.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

@media screen and (min-width: 768px) {
    #adv-search {   
		width: 800px;
    	margin: 30px auto;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 500px;
    }
}

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