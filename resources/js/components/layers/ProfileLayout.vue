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
    
    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    

        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
        <a href="https://www.facebook.com/mdbootstrap" target="_blank">
            <i class="fab fa-facebook-f mr-3"></i>
        </a>

        <a href="https://twitter.com/MDBootstrap" target="_blank">
            <i class="fab fa-twitter mr-3"></i>
        </a>

        <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
            <i class="fab fa-youtube mr-3"></i>
        </a>

        <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
            <i class="fab fa-google-plus mr-3"></i>
        </a>

        <a href="https://dribbble.com/mdbootstrap" target="_blank">
            <i class="fab fa-dribbble mr-3"></i>
        </a>

        <a href="https://pinterest.com/mdbootstrap" target="_blank">
            <i class="fab fa-pinterest mr-3"></i>
        </a>

        <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
            <i class="fab fa-github mr-3"></i>
        </a>

        <a href="http://codepen.io/mdbootstrap/" target="_blank">
            <i class="fab fa-codepen mr-3"></i>
        </a>
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank">company.com </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
</div>
</template>
<script>

</script>