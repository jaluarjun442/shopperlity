<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <meta name="keywords" content="" />
    <meta name="description" content="">

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('web_assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('web_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('web_assets/css/home_1.css') }}" rel="stylesheet">

    <link href="{{ asset('web_assets/css/custom.css') }}" rel="stylesheet">
    <style>
        <?php echo store_data()['header_script']; ?>
    </style>
    @yield('custom_header')
</head>

<body>

    <div id="page">

        <header class="version_1">
            <div class="layer"></div><!-- Mobile menu overlay mask -->
            <div class="main_header Sticky">
                <div class="container">
                    <div class="row small-gutters">
                        <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                            <div id="logo">
                                <a href="{{ route('home') }}"><img src="img/logo.svg" alt="" width="100" height="35"></a>
                            </div>
                        </div>
                        <nav class="col-xl-6 col-lg-7">
                            <a class="open_close" href="javascript:void(0);">
                                <div class="hamburger hamburger--spin">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                            </a>
                            <!-- Mobile menu button -->
                            <div class="main-menu">
                                <div id="header_menu">
                                    <a href="{{ route('home') }}"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
                                    <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                                </div>
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}">Categories</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}">Products</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <!--/main-menu -->
                        </nav>
                        <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                            <ul class="top_tools">
                                <li>
                                    <div class="dropdown dropdown-cart">
                                        <a href="cart.html" class="cart_bt"><strong>2</strong></a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li>
                                                    <a href="product-detail-1.html">
                                                        <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                                    </a>
                                                    <a href="#0" class="action"><i class="ti-trash"></i></a>
                                                </li>
                                                <li>
                                                    <a href="product-detail-1.html">
                                                        <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                                    </a>
                                                    <a href="0.html" class="action"><i class="ti-trash"></i></a>
                                                </li>
                                            </ul>
                                            <div class="total_drop">
                                                <div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
                                                <a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /dropdown-cart-->
                                </li>
                                <li>
                                    <a href="#0" class="wishlist"><span>Wishlist</span></a>
                                </li>
                                <li>
                                    <div class="dropdown dropdown-access">
                                        <a href="{{ route('home') }}" class="access_link"><span>Account</span></a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('home') }}" class="btn_1">Sign In or Sign Up</a>
                                            <ul>
                                                <li>
                                                    <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('home') }}"><i class="ti-package"></i>My Orders</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('home') }}"><i class="ti-user"></i>My Profile</a>
                                                </li>
                                                <li>
                                                    <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /dropdown-access-->
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="search_panel"><span>Search</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /main_header -->
        </header>
        <!-- /header -->

        <div class="top_panel">
            <div class="container header_panel">
                <a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
                <small>What are you looking for?</small>
            </div>
            <!-- /header_panel -->

            <div class="container">
                <div class="search-input">
                    <input type="text" placeholder="Search products...">
                    <button type="submit"><i class="ti-search"></i></button>
                </div>
            </div>
            <!-- /related -->
        </div>
        <!-- /search_panel -->
        @yield('content')

        <footer class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_1">Quick Links</h3>
                        <div class="collapse dont-collapse-sm links" id="collapse_1">
                            <ul>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="help.html">Faq</a></li>
                                <li><a href="help.html">Help</a></li>
                                <li><a href="{{ route('home') }}">My account</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_2">Categories</h3>
                        <div class="collapse dont-collapse-sm links" id="collapse_2">
                            <ul>
                                <li><a href="listing-grid-1-full.html">Clothes</a></li>
                                <li><a href="listing-grid-2-full.html">Electronics</a></li>
                                <li><a href="listing-grid-1-full.html">Furniture</a></li>
                                <li><a href="listing-grid-3.html">Glasses</a></li>
                                <li><a href="listing-grid-1-full.html">Shoes</a></li>
                                <li><a href="listing-grid-1-full.html">Watches</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_3">Contacts</h3>
                        <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                            <ul>
                                <li><i class="ti-home"></i>97845 Baker st. 567<br>Los Angeles - US</li>
                                <li><i class="ti-headphone-alt"></i>+94 423-23-221</li>
                                <li><i class="ti-email"></i><a href="#0">info@allaia.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_4">Keep in touch</h3>
                        <div class="collapse dont-collapse-sm" id="collapse_4">
                            <div id="newsletter">
                                <div class="form-group">
                                    <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                    <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                            <div class="follow_us">
                                <h5>Follow Us</h5>
                                <ul>
                                    <li><a href="#0"><i class="bi bi-facebook"></i></a></li>
                                    <li><a href="#0"><i class="bi bi-twitter-x"></i></a></li>
                                    <li><a href="#0"><i class="bi bi-instagram"></i></a></li>
                                    <li><a href="#0"><i class="bi bi-tiktok"></i></a></li>
                                    <li><a href="#0"><i class="bi bi-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <!-- <hr> -->
            </div>
        </footer>
        <!--/footer-->
    </div>
    <!-- page -->

    <div id="toTop"></div><!-- Back to top button -->

    <script src="{{ asset('web_assets/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('web_assets/js/main.js') }}"></script>


    @yield('custom_footer')
    <script>
        <?php echo store_data()['footer_script']; ?>
    </script>
    <!-- <br /> -->
</body>


</html>