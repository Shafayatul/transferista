<template>
<div>
    <header id="header">
        <div id="main-menu"><!-- Navbar -->
            <nav class="navbar navbar-expand-md  navbar-light">
                <div class="container">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left -->
                        <ul class="navbar-nav mr-auto">
                        
                        </ul>
                        
                        
                        <!-- Right -->
                        <ul class="navbar-nav nav-flex-icons"> 
                            <li class="nav-item dropdown dropper">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell">Notifications</i>
                                </a>
                                <ul class="dropdown-menu Notifications">
                                    <li class="head text-light bg-dark">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <a href="" class="text-light mr-1">Notifications (3)</a>
                                                <a href="" class="float-right text-light">Mark all as read</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification-box">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3 col-3 text-center">
                                            <img src="img/avatar-1.png" class="w-50 rounded-circle">
                                        </div>    
                                        <div class="col-lg-8 col-sm-8 col-8">
                                            <strong class="text-info">David John</strong>
                                            <div>
                                                Lorem ipsum dolor sit amet, consectetur
                                            </div>
                                            <small class="text-warning">27.11.2015, 15:00</small>
                                        </div>    
                                    </div>
                                    </li>
                                    <li class="notification-box bg-gray">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                <img src="img/avatar-1.png" class="w-50 rounded-circle">
                                            </div>    
                                            <div class="col-lg-8 col-sm-8 col-8">
                                                <strong class="text-info">David John</strong>
                                                <div>
                                                    Lorem ipsum dolor sit amet, consectetur
                                                </div>
                                                <small class="text-warning">27.11.2015, 15:00</small>
                                            </div>    
                                        </div>
                                    </li>
                                    <li class="notification-box">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-3 text-center">
                                            <img src="img/avatar-1.png" class="w-50 rounded-circle">
                                            </div>    
                                            <div class="col-lg-8 col-sm-8 col-8">
                                                <strong class="text-info">David John</strong>
                                                <div>
                                                    Lorem ipsum dolor sit amet, consectetur
                                                </div>
                                                <small class="text-warning">27.11.2015, 15:00</small>
                                            </div>    
                                        </div>
                                    </li>
                                    <li class="drop-footer bg-dark text-center">
                                        <a href="" class="text-light">View All</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown  nav-item">
                                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="true">
                                <img alt="image" src="img/avatar-1.png" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
                                <div class="dropdown-menu dropdown-menu-right ">
                                    <div class="dropdown-title">
                                        Logged in 5 min ago
                                    </div>
                                    <a href="features-profile.html" class="dropdown-item has-icon">
                                        <i class="far fa-user"></i> Profile
                                    </a>
                                    <a href="features-activities.html" class="dropdown-item has-icon">
                                        <i class="fas fa-bolt"></i> Activities
                                    </a>
                                    <a href="features-settings.html" class="dropdown-item has-icon">
                                        <i class="fas fa-cog"></i> Settings
                                    </a>
                                    <div class="dropdown-divider">

                                    </div>
                                    <a href="#" class="dropdown-item has-icon text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar -->
    </header>
        
    <slot></slot>
    
<!-- ========= Footer Section Start =========== -->
    <footer id="footer" class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center footer-logo">
                <img src="img/TransferistaC22b-A00aT03a-Z.png"><br>
                    <span class="f-bar"></span>
                </div>
            </div>
            <div class="row f-links">
                <div class="col-lg-3 col-6">
                    <h3>Quick Info</h3>
                    <ul>
                        <li>
                            <a href="tel:+8812345678">+88 012 345 678</a>
                        </li>
                        <li>
                            <a href="mailto:support@rixio.com">support@rixio.com</a>
                        </li>
                        <li>
                            <a href="mailto:info@rixio.com">info@rixio.com</a>
                        </li>
                        <li>
                            <p>
                                Khan Jahan Ali Road, Khulna, Bangladesh.
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6">
                    <h3>About Us</h3>
                    <ul>
                        <li>
                            <a href="#">Careers</a>
                        </li>
                        <li>
                            <a href="#">Press & Newes</a>
                        </li>
                        <li>
                            <a href="#">Partnerships</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Terms of Service</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6">
                    <h3 class="f-40">Supports</h3>
                    <ul>
                        <li>
                            <a href="#">Contact Support</a>
                        </li>
                        <li>
                            <a href="#">Help & Education</a>
                        </li>
                        <li>
                            <a href="#">Trust & Safety</a>
                        </li>
                        <li>
                            <a href="#">Selling on Transferista</a>
                        </li>
                        <li>
                            <a href="#">Buying on Transferista</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6">
                    <h3 class="f-40">Social Activity</h3>
                    <ul>
                        <li>
                            <a href="#">Facebook</a>
                        </li>
                        <li>
                            <a href="#">Twitter</a>
                        </li>
                        <li>
                            <a href="#">Linkedin</a>
                        </li>
                        <li>
                            <a href="#">Youtube</a>
                        </li>
                        <li>
                            <a href="#">Google Plus</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="color-info">2018 | All Right Reserved By Transferista</p>
                </div>
            </div>
        </div>
    </div>


</div>
</template>
<script>

</script>