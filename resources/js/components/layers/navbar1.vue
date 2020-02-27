<template>
	<div>
		<header id="header">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <div class="top-contect">
                                <ul>
                                    <li> <i class="fa fa-envelope-o"></i> <a href="mailto:Support@designsvilla.com">Support@designsvilla.com</a></li>
                                    <li> <i class="fa fa-phone"></i> <a href="tel://+921234567890">+92 123 456 7890</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <div class="top-socail">
                                <ul>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mid-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="logo">
                                 <router-link to="/">
                                    <img src="front/images/logo.png" alt="" />
                                 </router-link>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="open-time">
                                <ul>
                                    <li>
                                        <strong><i class="fa fa-envelope-o"></i></strong>
                                        <div class="text-box">
                                            <p>email contact</p>
                                            <a href="mailto:Hello@company.com">Hello@company.com</a>
                                        </div>
                                    </li>
                                    <li>
                                        <strong><i class="fa fa-clock-o"></i></strong>
                                        <div class="text-box">
                                            <p>We Are Open</p>
                                            <span>9.00 AM - 6.00 Pm</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="last-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="navigation">
                                <div class="navbar navbar-default" role="navigation">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav">
                                            <li class="active">
                                                <router-link to="/">HOME</router-link>
                                            </li>
                                            <li>
                                                <router-link to="/login">
                                                    login
                                                </router-link>
                                            </li>
                                            <li><a href="about-us.html">about</a></li>
                                            <li><a href="services.html">services</a></li>
                                            <li><a href="#">track & trace</a></li>
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="#">pages</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </div><!--/.nav-collapse -->
                                    <div class="gat-quote pull-right">
                                        <a class="btn" href="#">gat a quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

		<slot></slot>

	    <footer id="footer">
	        <div class="footer-main">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-4 col-sm-4 col-xs-12">
	                        <div class="inner-footer">
	                            <h3>ABOUT US</h3>
	                            <div class="footer-logo">
	                                <a href="#"> <img src="front/images/footer-log.png" alt="" /> </a>
	                            </div>
	                            <p>Lorem ipsum dolor sit amet sectetuer esl adipiscing
	                                elit sed diam nonummy nibhi euismod tincidunt ut
	                                laoreet dolore amet magna Vero eos et accusamus
	                                et iusto odio dignissimos ducimus.</p>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4 col-xs-12">
	                        <div class="inner-footer">
	                            <h3>Recent Posts</h3>
	                            <div class="recent-post clearfix">
	                                <div class="image-holder">
	                                    <a href="#"><img src="front/images/footer-recent-image1.png" alt="" /></a>
	                                </div>
	                                <div class="text-box">
	                                    <h4><a href="#">Hello  Transportation</a></h4>
	                                    <p>Welcome to  Transportation</p>
	                                    <span><a href="#">07 Sep, 2016</a></span>
	                                </div>
	                            </div>
	                            <div class="recent-post post-border clearfix">
	                                <div class="image-holder">
	                                    <a href="#"><img src="front/images/footer-recent-image2.png" alt="" /></a>
	                                </div>
	                                <div class="text-box">
	                                    <h4><a href="#">Hello  Transportation</a></h4>
	                                    <p>Welcome to  Transportation</p>
	                                    <span><a href="#">07 Sep, 2016</a></span>
	                                </div>
	                            </div>

	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4 col-xs-12">
	                        <div class="inner-footer">
	                            <h3>Newsletter Subscribe</h3>
	                            <p>
	                                If you want receive our all weekly updates about new
	                                offers and discount, signup below If you want receive offers
	                                and discount our all weekly updates about new offers and
	                                discount signup below.
	                            </p>
	                            <form>
	                                <input type="text" placeholder="Email Address"/>
	                                <input type="submit" class="fa" value="&#xf1d9;">
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <section class="copayright">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-6 col-sm-6 col-xs-12">
	                        <div class="copyrigth-left">
	                            <ul>
	                                <li class="active"><a href="index.html">Home</a></li>
	                                <li><a href="about-us.html">About</a></li>
	                                <li><a href="services.html">Services</a></li>
	                                <li><a href="#">Track & Trace</a></li>
	                                <li><a href="blog.html">Blog</a></li>
	                                <li><a href="#">Pages</a></li>
	                                <li><a href="contact.html">Contact</a></li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="col-md-6 col-sm-6 col-xs-12">
	                        <div class="copyrigth-right">
	                            <p>All Copyrights reserved @ 2017 - Developed by <span><a href="#">XpertPress</a></span></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>
	    </footer>
	 </div>

</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
