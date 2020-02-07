<template>
<div>
    <header id="header">
        <div id="main-menu"><!-- Navbar -->
            <nav-bar></nav-bar>
        </div>
        <!-- Navbar -->
    </header>
        
    <slot></slot>
    
     <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
    <div class="footer-copyright py-3 pull-right text-right">
      © 2020 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank">company.com </a>
    </div>
  </footer>
</div>
</template>
<script>
import navbar from './Navbar'
export default{
    components:{
        'nav-bar':navbar
    }
}
</script>
<style scoped>
  .footer-copyright{
    color: white;
    padding-right: 5%;
  }
  
  .footer-copyright a{
    color: white;
  }

</style>