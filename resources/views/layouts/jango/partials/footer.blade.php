<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-5 -->
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
    <div class="c-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="c-container c-first">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">
                                <span class="c-theme-font">Meni</span>
                            </h3>
                            <div class="c-line-left hide"></div>
                            <p class="c-text"> </p>
                        </div>
                        @if(count($menusFooter) > 0)
                        <ul class="c-links">
                            @foreach($menusFooter as $value)
                            <li>
                                <a href="{{ $value->getSlug() }}">{{ $value->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Poslednje novosti</h3>
                            <div class="c-line-left hide"></div>
                        </div>
                        <div class="c-blog">
                            <div class="c-post">
                                <div class="c-post-img">
                                    <img src="/uploads/products/categories/mebl-kategorija-test-s.jpg" alt="" class="img-responsive" />
                                </div>
                                <div class="c-post-content">
                                    <h4 class="c-post-title">
                                        <a href="/proizvodi/2/mebl">Novi dizajn mebla</a>
                                    </h4>
                                    <p class="c-text">Najnoviji dizajni italijanskih mebla</p>
                                </div>
                            </div>
                            <div class="c-post c-last">
                                <div class="c-post-img">
                                    <img src="/uploads/products/categories/dusek-kategorija-test-s.jpg" alt="" class="img-responsive" />
                                </div>
                                <div class="c-post-content">
                                    <h4 class="c-post-title">
                                        <a href="/proizvodi/2/duseci">Duseci svih dimenzija</a>
                                    </h4>
                                    <p class="c-text">Izdvajamo veliki izbor duseka</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-md c-btn-border-1x c-theme-btn c-btn-uppercase c-btn-square c-btn-bold c-read-more hide">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Najprodavniji duseci</h3>
                            <div class="c-line-left hide"></div>
                        </div>
                        @if(count($imagesFooters)>0)
                         
                         <ul class="c-works">                          
                            @foreach($imagesFooters as $imageFooter)  
                            <!--kada je prva slila ide c-first,druga nista,poslednja c-last,i idu 3 ul-->
                            <li class=" c-first ">
                                <a href="/proizvod/{{$imageFooter->id}}">
                                    <img src="{{$imageFooter->image}}" alt="" class="img-responsive" style="height: 64px;width: 64px" />
                                </a>
                            </li>
                            @endforeach
                           
                        </ul>
                        
                       @endif
                        <a href="#" class="btn btn-md c-btn-border-1x c-theme-btn c-btn-uppercase c-btn-square c-btn-bold c-read-more hide">View More</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container c-last">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Kontakt</h3>
                            <div class="c-line-left hide"></div>
                            <p>Za sve informacije možete nas kontaktirati putem telefona, emaila ili putem drustvenih mreza</p>
                        </div>
                        <ul class="c-socials">
                            <li>
                                <a href="#">
                                    <i class="icon-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-social-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-social-tumblr"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="c-address">
                            <li>
                                <i class="icon-pointer c-theme-font"></i> Zage Malivuk 4. ulica broj 6 ( Krnjaca )</li>
                            <li>
                                <i class="icon-call-end c-theme-font"></i> 011/331-9328 </li>
                             <li>
                                <i class="icon-call-end c-theme-font"></i> 060/331-9377 </li>
                            <li>
                                <i class="icon-envelope c-theme-font"></i> office@mdcommerce.rs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-postfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 c-col">
                    <p class="c-copyright c-font-grey">2017 &copy; MD-Commerce
                        <span class="c-font-grey-3">All Rights Reserved.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
<!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
<div class="c-layout-go2top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END: LAYOUT/FOOTERS/GO2TOP -->
<!-- BEGIN: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/jango/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/jquery.easing.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/reveal-animate/wow.js" type="text/javascript"></script>
<script src="/jango/assets/base/js/scripts/reveal-animate/reveal-animate.js" type="text/javascript"></script>
<!-- END: CORE PLUGINS -->
<!-- BEGIN: LAYOUT PLUGINS -->
<script src="/jango/assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/revo-slider/js/extensions/revolution.extension.slideanims.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/revo-slider/js/extensions/revolution.extension.layeranimation.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/revo-slider/js/extensions/revolution.extension.navigation.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/revo-slider/js/extensions/revolution.extension.video.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/smooth-scroll/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/slider-for-bootstrap/js/bootstrap-slider.js" type="text/javascript"></script>
<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="/jango/assets/base/js/components.js" type="text/javascript"></script>
<script src="/jango/assets/base/js/components-shop.js" type="text/javascript"></script>
<script src="/jango/assets/base/js/app.js" type="text/javascript"></script>
<script>
$(document).ready(function ()
{
    App.init(); // init core    
});
</script>
<!-- END: THEME SCRIPTS -->
<!-- BEGIN: PAGE SCRIPTS -->
<script src="/jango/assets/base/js/scripts/revo-slider/slider-4.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/isotope/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/isotope/imagesloaded.pkgd.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/isotope/packery-mode.pkgd.min.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/ilightbox/js/jquery.requestAnimationFrame.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/ilightbox/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="/jango/assets/plugins/ilightbox/js/ilightbox.packed.js" type="text/javascript"></script>
<script src="/jango/assets/base/js/scripts/pages/isotope-gallery.js" type="text/javascript"></script>
<!-- END: PAGE SCRIPTS -->
<!-- END: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: PAGE SCRIPTS -->
<script src="//maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
<script src="/jango/assets/plugins/gmaps/gmaps.js" type="text/javascript"></script>
<script src="/jango/assets/base/js/scripts/pages/contact.js" type="text/javascript"></script>
<!-- END: PAGE SCRIPTS -->