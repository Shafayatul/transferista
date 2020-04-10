<template>
	<div>
   <!--  Top menu -->
        <nav
            id="mainNav"
            class="navbar navbar-expand-md navbar-dark fixed-top bg-primary"
            >
            <div class="rtl-layout" @click="addToggleClass()"><a href="javascript:void(0);">RTL</a></div>
            <div class="container">
                <router-link class="navbar-brand" to="/home" routerLinkActive="active-link">
                    <img src="/static/img/logo-white-large.svg" class="img-fluid" width="65" height="50">
                </router-link>

                <button
                    class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul id="main" class="navbar-nav ml-auto main-menu list-unstyled">
                    <li
                        @click="menuToggleLink('menuNo'+i);"
                        class="parent nav-item"
                        v-for="(menuItem,i) in menus"
                        :id="'menuNo'+i"
                        :key="i"
                        >
                        <router-link
                            class="nav-link"
                            :to="menuItem.state"
                            v-if="menuItem.type == 'link'"
                            @click.native="removeCollapseInClass();"
                        >
                            {{ menuItem.name }}
                        </router-link>
                        <a
                            v-if="menuItem.type == 'sub'"
                            class="nav-link"
                            href="javascript:void(0)"
                        >
                            {{ menuItem.name }}&nbsp;
                            <i :class="menuItem.icon" @click.stop="menuToggle('menuNo'+i)"></i>
                        </a>
                        <ul
                            v-if="menuItem.type == 'sub' && menuItem.children"
                            class="sub-menu arrow-up list-unstyled" >
                            <li
                                class="nav-item"
                                v-for="(grandchildItem,i) of menuItem.children"
                                :key="i"
                                >
                                <router-link
                                class="nav-link"
                                :to="grandchildItem.state"
                                v-if="grandchildItem.type == 'link'"
                                @click.native="removeCollapseInClass()"
                                >
                                {{ grandchildItem.name }}
                                </router-link>
                            </li>
                        </ul>
                    </li>
                   
                    </ul>
                </div>
            </div>
        </nav>
		<slot></slot>
        <div class="footer-wrapper-2 py-5">
            <div class="container container-full-width text-center">
                <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
                    <div class="bottom-footer">
                        <ul class="list-inline mb-0"  v-if="footer2Menu">
                            <li class="list-inline-item" v-for="(menu,i) of footer2Menu" :key="i">
                            <a :href="menu.state" routerLinkActive="active-link" v-if="menu.type === 'link'" class="text-white">
                                <span>{{ menu.name }}</span>
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
                    <div class="social-without-bg">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a class="text-white" href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a class="text-white" href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="text-white" href="javascript:void(0)"><i class="fa fa-google-plus-g"></i></a></li>
                            <li class="list-inline-item"><a class="text-white" href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a class="text-white" href="javascript:void(0)"><i class="fas fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                        <div class="copright text-center col-sm-12 col-md-12 col-lg-12">
                        <span class="text-white ">&copy; 2019, All Right Reserved </span>
                    </div>
                </div>

            </div><!-- container closed -->
        </div>

    </div>

</template>
<script>
    export default {
      data() {
        return {
            limitPosition: 300,
            scrolled: false,
            lastPosition: 0, searchactive:false,
            menus: [
                {
                    state: "/home",
                    name: "Book",
                    type: "link"
                },{
                    state: "/how-it-works",
                    name: "How It Works",
                    type: "link"
                },{
                    state: "/register",
                    name: "User Registration",
                    type: "link"
                },{
                    state: "/partner-register",
                    name: "Partner Registration",
                    type: "link", 
                },{
                    state: "/login",
                    name: "Login",
                    type: "link"
                }
            ],
            footer2Menu:[
               {
                  state: "/home",
                  name: "Home",
                  type:"link"
               },
               {
                  state:"/about",
                  name:"About",
                  type:"link"
               },
               {
                  state:"/contact-us",
                  name:"Contact Us",
                  type:"link"
               },
               {
                  state:"/gdpr",
                  name:"GDPR",
                  type:"link"
               },
               {
                  state:"/impressum",
                  name:"Impressum",
                  type:"link"
               },
               {
                  state:"/services",
                  name:"Services ",
                  type:"link"
               },
               {
                  state:"/term-conditions ",
                  name:"Terms & Conditions ",
                  type:"link"
               }
            ]
        };
    },

methods: {
    getUrl(){
        let val = this.$route.path.split("/");
        console.log(val)
        if(val[1] == 'home')
        {
            this.showSubscriber = false;
        } else {
            this.showSubscriber = true;
        }
    },
    handleScroll() {
      if (this.lastPosition < window.scrollY && this.limitPosition < window.scrollY) {
        this.scrolled = false;
        // move up!
      }

      if (this.lastPosition > window.scrollY) {
        this.scrolled = false;
        // move down
      }

      this.lastPosition = window.scrollY;
      this.scrolled = window.scrollY > 250;
    },
    showSearch(){
            this.searchactive = !this.searchactive;
    },
    menuToggleLink(id){
        if (document.getElementById(id).classList.contains("open")){
            document.getElementById(id).classList.remove("open");
        } else if(!document.getElementById(id).classList.contains("open")) {
            let elements = document.querySelectorAll(".parent");
            for (var i = 0; i < elements.length; i++) {
                elements[i].classList.remove('open');
            }
            document.getElementById(id).classList.add("open");
        }
    },
    addToggleClass(){
        document.querySelector("body").classList.toggle("rtl-enable");
    },
    removeCollapseInClass(){
        document.getElementById("navbarCollapse").classList.remove('show');
    },
    onScrollEvent(){
        var headerSticky = document.getElementById('mainNav');
        window.onscroll = function() {
            if (window.pageYOffset >= 100) {
                headerSticky.classList.add("scrollHeader");
            }  else {
                headerSticky.classList.remove("scrollHeader");
            }
        }
    }

  },
  created() {
    window.addEventListener("scroll", this.handleScroll);
  },
  mounted() {
       this.onScrollEvent();
       this.getUrl();
  },
  destroyed() {
    window.removeEventListener("scroll", this.handleScroll);
  }

}
</script>
<style>
   .scrollHeader{
      background-color: #575756;
   }
</style>
