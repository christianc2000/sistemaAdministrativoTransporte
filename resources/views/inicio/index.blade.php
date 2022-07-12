<!DOCTYPE html>
<html lang="en" class="wide smoothscroll wow-animation">

<head>
    <!-- Site Title -->
    <title>Home</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <!-- Stylesheets -->
    <script src="{{ asset('js/inicio.js') }}"></script>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href='{{ asset('css/css.css') }}' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--[if lt IE 10]>
  <script src="js/html5shiv.min.js"></script>
  <![endif]-->
</head>

<body>
    <!-- The Main Wrapper -->
    <div class="page">

        <!--For older internet explorer-->
        <div class="old-ie"
            style='background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;'>
            <a href="https://windows.microsoft.com/en-US/internet-explorer/..">
                <img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                    alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
            </a>
        </div>
        <!--END block for older internet explorer-->

        <!--========================================================
                            HEADER
  =========================================================-->
        <header class="page-header">
            <!-- RD Navbar -->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar" data-rd-navbar-lg="rd-navbar-static">
                    <div class="rd-navbar-inner">
                        <!-- RD Navbar Panel -->
                        <div class="rd-navbar-panel">

                            <!-- RD Navbar Toggle -->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar"><span></span></button>
                            <!-- END RD Navbar Toggle -->

                            <!-- RD Navbar Brand -->
                            <a href="index.html" class="rd-navbar-brand">
                                <span class="brand-name">
                                    GPS
                                </span>
                                <span class="brand-slogan">Vehicle Tracking System </span>
                            </a>
                            <!-- END RD Navbar Brand -->
                        </div>
                        <!-- END RD Navbar Panel -->

                        <div class="rd-navbar-nav-wrap">

                            <!-- RD Navbar Nav -->
                            <ul class="rd-navbar-nav">
                                <li class="active">
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="index-1.html">About</a>


                                </li>
                                <li>
                                    <a href="index-2.html">Services</a>
                                    <!-- RD Navbar Dropdown -->
                                    <ul class="rd-navbar-dropdown">
                                        <li>
                                            <a href="#">Vehicle Security</a>
                                        </li>
                                        <li>
                                            <a href="#">Vehicle monitoring</a>
                                        </li>
                                        <li>
                                            <a href="#">Home Security</a>
                                        </li>
                                        <li>
                                            <a href="#">Control</a>
                                            <ul class="rd-navbar-dropdown">
                                                <li>
                                                    <a href='#'>Home Security</a>
                                                </li>
                                                <li>
                                                    <a href='#'>Control</a>
                                                </li>
                                                <li>
                                                    <a href='#'>Vehicle Security</a>
                                                </li>
                                            </ul>

                                        </li>
                                        <li>
                                            <a href="#">Train monitoring</a>
                                        </li>
                                        <li>
                                            <a href="#">Personal Tracking </a>
                                        </li>
                                    </ul>
                                    <!-- END RD Navbar Dropdown -->
                                </li>
                                <li>
                                    <a href="index-3.html">Gallery</a>
                                </li>
                                <li>
                                    <a href="index-4.html">Contacts</a>
                                </li>
                            </ul>
                            <!-- END RD Navbar Nav -->
                        </div>

                        <a href="{{ route('login') }}" class="log">login</a>
                    </div>
                </nav>
            </div>
            <!-- END RD Navbar -->
            <!-- The easiest way  -->
            <section class="well  bg-primary header">
                <div class="container text-center">
                    <h1>Santa Cruz
                        <span class="heading-3">La ciudad de los anillos</span>
                    </h1>
                    <p class="inset-1">Nuestro único objetivo es ayudar a todos los usuarios o turistas que vayan a ir
                        en Bus o Micro en la ciudad, conocer que línea puede tomar, donde esperar y que rutas le
                        conviene seguir, utilízala y ayúdanos a almentarla con tu experiencia</p>
                    <div class="btn-group">
                        <a href="#" class="btn btn-md btn-secondary">Explorar</a>
                        {{-- <a href="#" class="btn btn-lg btn-default">Buy now!</a> --}}
                    </div>
                </div>
            </section>
            <!-- END The easiest way  -->
        </header>
        <!--========================================================
                            CONTENT
  =========================================================-->
        <main class="page-content">

            <!-- GPS tracking  -->
            <section class="well well-1 bg-alabster">
                <div class="container text-center text-sm-left">
                    <div class="row">
                        <div class="col-sm-6 col-md-5">
                            <h2>GPS tracking
                                <span class="heading-3"> benefits & savings</span>
                            </h2>
                            <p>Our Company is the recognized leader in the GPS fleet management industry and our GPS
                                Fleet Tracking
                                solution
                                sets the standard for excellence and performance. We are committed to providing fleet
                                operators everywhere
                                with the highest
                                quality, most cost-effective solutions.</p>
                        </div>
                        <div class="col-md-preffix-1 col-sm-6">
                            <div class="image-wrap image-wrap-right image-wrap-1">
                                <img src="{{ asset('imagen/l18.jpg') }}" width="938" height="609"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END GPS tracking  -->


            <!--  Improve your safety -->
            <section class="well  well-2 text-center">
                <div class="container">
                    <h2> Improve your safety
                        <span class="heading-3">on the road</span>
                    </h2>
                    <div class="row row-md-reverse text-md-left">
                        <div class="col-md-6">
                            <p>GPS tracking technology has come so far in the past few years. At GPS Vehicle Tracking
                                System, our
                                mandate is to keep on top of all the changing technology, so we can pass that knowledge
                                to you - our
                                valued customers. If you're
                                curious about GPS trackers, you've come to the right place. Not only do we offer fleet
                                tracking and
                                vehicle tracking
                                options, but we also have an entire line of personal GPS tracking devices available. Our
                                line of GPS
                                tracking devices is extensive, but we're happy to help you find the best option for any
                                vehicle that you
                                want to track.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="image-wrap image-wrap-left image-wrap-left-md  image-wrap-2">
                                <img src="{{ asset('imagen/page-01_img02.png') }}" width="794" height="568"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END  Improve your safety -->

            <!--  Discover advanced -->
            <section class="well well-3 bg-alabster">
                <div class="container text-center">
                    <h2> Discover advanced
                        <span class="heading-3">GPS tracking features</span>
                    </h2>
                    <div class="row text-md-left row-xs-center offset-1 flow-offset-2">
                        <div class="col-sm-6 col-md-4">
                            <span class="icon icon-xl icon-primary material-icons-map"></span>
                            <h5>GPS vehicle tracking</h5>
                            <p>We offer the best professional tool
                                for GPS vehicle tracking and fleet
                                management. A small GPS tracker
                                containing GPS receiver and GPRS. </p>
                            <a href="#" class="btn btn-sm btn-default">Learn more</a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <span class="icon icon-xl icon-primary material-icons-local_shipping "></span>
                            <h5>CANbus data reading</h5>
                            <p>Modern trucks implement an electronic data communication protocol called CANBus/J1939.
                                This protocol
                                allows
                                external equipment to be used.</p>
                            <a href="#" class="btn btn-sm btn-default">Learn more</a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <span class="icon icon-xl icon-primary material-icons-timer "></span>
                            <h5>Integrated navigation</h5>
                            <p>Would you like to integrate our system with a popular navigator? Do you need to
                                communicate with your
                                drivers in a simple, clear and economic way? </p>
                            <a href="#" class="btn btn-sm btn-default">Learn more</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END  Discover advanced -->

            <!-- Complete fleet -->
            <section class="well well-4 bg-image bg-image-1 bg-fixed">
                <div class="container text-center">
                    <h1>Complete fleet
                        <span class="heading-3">management solution</span>
                    </h1>
                    <p class="inset-1">Competition within the transport business is high and oil prices are still
                        rising. The
                        solution for
                        profitability is to know how everything works, to drive more efficiently than the competition.
                        GPS Vehicle
                        Tracking System offers
                        a comprehensive suite of solutions for professionals in the efficiency of freight transport by
                        fleet
                        monitoring and tracking </p>
                    <a href="#" class="btn btn-md btn-primary">Learn more</a>
                </div>
            </section>
            <!-- END Complete fleet -->

            <!-- Testimonials -->
            <section class="well well-5">
                <div class="container text-center">
                    <h2 class="text-secondary">Testimonials</h2>
                    <div class="row row-xs-center row-md-left text-sm-left offset-3">
                        <div class="col-sm-8 col-md-6 col-lg-5">
                            <blockquote class="quote">
                                <div class="box-sm">
                                    <div class="box__left inset-2">
                                        <img src="images/page-01_img04.jpg" width="131" height="131"
                                            alt="" class="round">
                                    </div>
                                    <div class="box__body">
                                        <p>
                                            <q>
                                                Thanks a lot for the quick
                                                response. I was really impressed,
                                                your solution is excellent!! Your
                                                competence is justified!!</q>
                                        </p>
                                        <h5>
                                            <cite>
                                                Adam Smith
                                            </cite>
                                        </h5>
                                        <div class="small text-secondary">Driver</div>
                                    </div>
                                </div>

                            </blockquote>
                        </div>
                        <div class="col-sm-8 col-md-6 col-lg-preffix-1 col-lg-6 offset-2">
                            <blockquote class="quote">
                                <div class="box-sm">
                                    <div class="box__left inset-2">
                                        <img src="images/page-01_img05.jpg" width="131" height="131"
                                            alt="" class="round">
                                    </div>
                                    <div class="box__body">
                                        <p class="inset-3">
                                            <q> I just don't know how to
                                                describe your services... They are
                                                extraordinary! I am quite happy with them! Just keep up going this way!
                                            </q>
                                        </p>
                                        <h5>
                                            <cite>
                                                Tom Cooper
                                            </cite>
                                        </h5>
                                        <div class="small text-secondary">Driver</div>
                                    </div>
                                </div>

                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Testimonials -->

            <section class="well well-6 bg-primary">
                <div class="container text-center ">
                    <h3 class="text-white"><span class="text-bold big">GPS</span> Vehicle Tracking System </h3>
                    <p class="inset-4">We represent the highest value GPS vehicle tracker and fleet tracking solution
                        in the
                        industry. Its proven functionality and
                        rapid deployment easily scales whether you’re a small business or a large enterprise
                        organization. </p>
                    <a href="#" class="btn btn-lg btn-secondary">buy now!</a>
                </div>
            </section>
        </main>
        <!--========================================================
                            FOOTER
  ==========================================================-->
        <footer class="page-footer page-footer-well bg-primary">

            <!-- END GPS Vehicle Tracking System -->
            <div class="container text-center">
                <p class="copyright">
                    GPS Vehicle Tracking System © <span id="copyright-year"></span>.
                    <a href='index-5.html'>Privacy Policy</a>
                    <!-- {%FOOTER_LINK} -->
                </p>
                <ul class="inline-list">
                    <li><a href="#" class="icon icon-xs icon-default fa-facebook"></a></li>
                    <li><a href="#" class="icon icon-xs icon-default fa-twitter"></a></li>
                    <li><a href="#" class="icon icon-xs icon-default fa-google-plus"></a></li>
                </ul>
            </div>
        </footer>
        <!-- GPS Vehicle Tracking System  -->

    </div>

    <!-- Core Scripts -->
    <script src="{{ asset('js/core.min.js') }}"></script>
    <!-- Additional Functionality Scripts -->
    <script src="{{ asset('js/script.js') }}"></script> <!-- begin olark code -->


    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-7078796-5']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0"
            width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P9FT69');
    </script><!-- End Google Tag Manager -->
</body>

</html>
