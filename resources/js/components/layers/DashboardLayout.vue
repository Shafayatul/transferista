<template>
<div>
    <header id="header"><!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">
                
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
        <!-- Navbar -->
    </header>
        
    <slot></slot>
    
<!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

            <!-- Content -->
            <h5 class="text-uppercase">Footer Content</h5>
            <p>Here you can use rows and columns to organize your footer content.</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
                <li>
                <a href="#!">Link 1</a>
                </li>
                <li>
                <a href="#!">Link 2</a>
                </li>
                <li>
                <a href="#!">Link 3</a>
                </li>
                <li>
                <a href="#!">Link 4</a>
                </li>
            </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
                <li>
                <a href="#!">Link 1</a>
                </li>
                <li>
                <a href="#!">Link 2</a>
                </li>
                <li>
                <a href="#!">Link 3</a>
                </li>
                <li>
                <a href="#!">Link 4</a>
                </li>
            </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#"> company.com</a>
        </div>
        <!-- Copyright -->

    </footer>
<!-- Footer -->
</div>
</template>
<script>
export default {
    
}
</script>