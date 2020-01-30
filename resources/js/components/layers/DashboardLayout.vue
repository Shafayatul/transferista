<template>
<div>
    <header id="header">
        <div id="main-menu">
            <navbar></navbar>
        </div>
        <!-- Navbar -->
    </header>
        
    <slot></slot>
    
<!-- ========= Footer Section Start =========== -->
    <footer id="footer" class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center footer-logo">
                <img :src="'img/TransferistaC22b-A00aT03a-Z.png'"><br>
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
                            <a href="mailto:support@rixio.com">support@mail.com</a>
                        </li>
                        <li>
                            <a href="mailto:info@rixio.com">info@mail.com</a>
                        </li>
                        <li>
                            <p>
                                dhaka bangladesh , Bangladesh.
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
import navbar from './Navbar'
export default{
    name : "DashboardLayout",
    components:{
        navbar
    }
}
</script>