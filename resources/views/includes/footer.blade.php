        <footer>
            <div class="logisco-footer-wrapper ">
                <div class="logisco-footer-container logisco-container clearfix">
                    <div class="logisco-footer-column logisco-item-pdlr logisco-column-15">
                        <div id=text-1 class="widget widget_text logisco-widget">
                            <div class=textwidget>
                                <p><img class="alignnone size-full wp-image-5803" src=../frontend/images/logo.png alt width=80 height="80">
                                    <br/> <span class=gdlr-core-space-shortcode style="margin-top: -27px ;"></span>
                                    <br/> CORPCAB Ltd is a revolutionary new car management service – both for customers and partners intent on elevating their level of car-fleet management.</p>
                                <div class="gdlr-core-social-network-item gdlr-core-item-pdb  gdlr-core-none-align" style="padding-bottom: 0px ;"><a href=#url target=_blank class=gdlr-core-social-network-icon title=facebook style="font-size: 16px ;color: #fff ;"><i class="fa fa-facebook" ></i></a><a href=# target=_blank class=gdlr-core-social-network-icon title=twitter style="font-size: 16px ;color: #fff ;"><i class="fa fa-twitter" ></i></a><a href=# target=_blank class=gdlr-core-social-network-icon title=vimeo style="font-size: 16px ;color: #fff ;"><i class="fa fa-instagram" ></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="logisco-footer-column logisco-item-pdlr logisco-column-15">
                        <div id=text-5 class="widget widget_text logisco-widget">
                            <h3 class="logisco-widget-title">Contact Info</h3><span class=clear></span>
                            <div class=textwidget>
                                <p>Box 60163--00100
                                    <br/> Nairobi
                                    <br/> Royal Square 7th Floor Ngong Rd</p>
                                <p><span style="color: #fff;">0701 294 042 / 0700 599 138 / 0796 730 862 </span>
                                    <br/> <span style="color: #e53d34;">info@corpcabs.co.ke</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="logisco-footer-column logisco-item-pdlr logisco-column-30">
                        <div id=gdlr-core-custom-menu-widget-2 class="widget widget_gdlr-core-custom-menu-widget logisco-widget">
                            <h3 class="logisco-widget-title">Useful Links</h3><span class=clear></span>
                            <div class=menu-useful-links-container>
                                <ul id=menu-useful-links class="gdlr-core-custom-menu-widget gdlr-core-menu-style-half">
                                    <li class="menu-item"><a href="{{ url('/about') }}">About Corpcab</a></li>
                                    <li class="menu-item"><a href="{{ url('/') }}">Terms of  Service</a></li>
                                    <li class="menu-item"><a href="{{ url('/') }}">Privacy Policy</a></li>
                                    <li class="menu-item"><a href="{{ url('/') }}">Support FAQ</a></li>
                                    <li class="menu-item"><a href="{{ url('/') }}">Driver FAQ</a></li>
                                    <li class="menu-item"><a href="{{ url('/') }}">Contacts</a></li>
                                    <li class="menu-item"><a href="{{ url('/register') }}">Register to Drive</a></li>
                                    <li class="menu-item"><a href="{{ url('/car-register') }}">Register Vehicle</a></li>
                                    <li class="menu-item"><a href="{{ url('/contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=logisco-copyright-wrapper>
                <div class="logisco-copyright-container logisco-container clearfix">
                    <div class="logisco-copyright-left logisco-item-pdlr">Copyright <?php echo date("Y"); ?> Corpcab Ltd, All Right Reserved</div>
                    <div class="logisco-copyright-right logisco-item-pdlr">
                        <a href="{{ url('/') }} "" style=margin-left:21px;>Home</a>
                        <a href="{{ url('/about') }} "" style=margin-left:21px;>About</a>
                        <a href="{{ url('/contact') }} "" style=margin-left:21px;>contact</a>
                        <a href="{{ url('/login') }} "" style=margin-left:21px;>Login</a>
                        <a href="{{ url('/register') }} "" style=margin-left:21px;>Driver Signup</a>
                        <a href="{{ url('/car-register') }} "" style=margin-left:21px;>Car Registration</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
            $(document).ready(function(){
            $(`.carousel`).on(`mouseenter`,function() {
            $(this).carousel('cycle');
            }).on(`mouseleave`, function() {
            $(this).carousel('pause');
            });
            });
    </script>

    <script>
        $("document").ready(function(){
            setTimeout(function(){
            $("div.alert").remove();
            }, 3000 );
        });
    </script>

<script src='../frontend/js/jquery/jquery.js'></script>
<script src='../frontend/js/jquery/jquery-migrate.min.js'></script>
<script src='../frontend/plugins/goodlayers-core/plugins/combine/script.js'></script>
<script>
    var gdlr_core_pbf = {
        "admin": "",
        "video": {
            "width": "640",
            "height": "360"
        },
        "ajax_url": ""
};
</script>
    <script src='../frontend/plugins/goodlayers-core/include/js/page-builder.js'></script>
    <script src='../frontend/js/jquery/jquery.blockUI.min.js'></script>
    <script src='../frontend/js/jquery/ui/effect.min.js'></script>
    <script src='../frontend/js/jquery.mmenu.js'></script>
    <script src='../frontend/js/jquery.superfish.js'></script>
    <script src='../frontend/js/plugins.js'></script>
    <script type="text/javascript" src="../frontend/plugins/quform/js/plugins.js"></script>
    <script type="text/javascript" src="../frontend/plugins/quform/js/scripts.js"></script>
    </body>
</html>
