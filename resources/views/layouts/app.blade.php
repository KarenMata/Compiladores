<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Aprende Max') }}</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Around - Multipurpose Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, consulting, coworking space, services, creative agency, dashboard, e-commerce, mobile app showcase, multipurpose, product landing, shop, software, ui kit, web studio, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href=" {{ asset('css/app.css') }} " />
</head>
<!-- Body-->

<body>
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Page loading spinner-->
    <div class="cs-page-loading active">
        <div class="cs-page-loading-inner">
            <div class="cs-page-spinner"></div><span>Loading...</span>
        </div>
    </div>
    <main class="cs-page-wrapper">

        <!-- Sign In Modal-->
        <div class="modal fade" id="modal-signin" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="cs-view show" id="modal-signin-view">
                        <div class="modal-header border-0 bg-dark px-4">
                            <h4 class="modal-title text-light">Sign in</h4>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-4">
                            <p class="font-size-ms text-muted">Sign in to your account using email and password provided during registration.</p>
                            <form class="needs-validation" novalidate>
                                <div class="input-group-overlay form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fe-mail"></i></span></div>
                                    <input class="form-control prepended-form-control" type="email" placeholder="Email" required>
                                </div>
                                <div class="input-group-overlay cs-password-toggle form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="fe-lock"></i></span></div>
                                    <input class="form-control prepended-form-control" type="password" placeholder="Password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show password</span>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="keep-signed">
                                        <label class="custom-control-label" for="keep-signed">Keep me signed in</label>
                                    </div><a class="nav-link-style font-size-ms" href="password-recovery.html">Forgot password?</a>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                <p class="font-size-sm pt-3 mb-0">Don't have an account? <a href='#' class='font-weight-medium' data-view='#modal-signup-view'>Sign up</a></p>
                            </form>
                        </div>
                    </div>
                    <div class="cs-view" id="modal-signup-view">
                        <div class="modal-header border-0 bg-dark px-4">
                            <h4 class="modal-title text-light">Sign up</h4>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-4">
                            <p class="font-size-ms text-muted">Registration takes less than a minute but gives you full control over your orders.</p>
                            <form class="needs-validation" novalidate>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Full name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Email" required>
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control" type="password" placeholder="Password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show password</span>
                                    </label>
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control" type="password" placeholder="Confirm password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i class="fe-eye cs-password-toggle-indicator"></i><span class="sr-only">Show password</span>
                                    </label>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                                <p class="font-size-sm pt-3 mb-0">Already have an account? <a href='#' class='font-weight-medium' data-view='#modal-signin-view'>Sign in</a></p>
                            </form>
                        </div>
                    </div>
                    <div class="modal-body text-center px-4 pt-2 pb-4">
                        <hr>
                        <p class="font-size-sm font-weight-medium text-heading pt-4">Or sign in with</p><a class="social-btn sb-facebook sb-lg mx-1 mb-2" href="#"><i class="fe-facebook"></i></a><a class="social-btn sb-twitter sb-lg mx-1 mb-2" href="#"><i class="fe-twitter"></i></a><a class="social-btn sb-instagram sb-lg mx-1 mb-2" href="#"><i class="fe-instagram"></i></a><a class="social-btn sb-google sb-lg mx-1 mb-2" href="#"><i class="fe-google"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shopping cart off-canvas-->
        <div class="cs-offcanvas cs-offcanvas-collapse-always cs-offcanvas-right" id="shoppingCart">
            <div class="cs-offcanvas-cap navbar-box-shadow px-4 mb-2">
                <h5 class="mt-1 mb-0">Your cart</h5>
                <button class="close lead" type="button" data-toggle="offcanvas" data-offcanvas-id="shoppingCart"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="cs-offcanvas-body p-4" data-simplebar>
                <div class="media align-items-center mb-3"><a class="d-block" href="shop-single.html"><img class="rounded" width="60" src="img/demo/shop-homepage/thumbnails/05.jpg" alt="Product" /></a>
                    <div class="media-body pl-2 ml-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h4 class="nav-heading font-size-md mb-1"><a class="font-weight-medium" href="shop-single.html">Smart Watch Series 5</a></h4>
                                <div class="d-flex align-items-center font-size-sm"><span class="mr-2">$364.99</span><span class="mr-2">x</span>
                                    <input class="form-control form-control-sm px-2" type="number" style="max-width: 3.5rem;" value="1">
                                </div>
                            </div>
                            <div class="pl-3 border-left"><a class="d-block text-danger text-decoration-none font-size-xl" href="#" data-toggle="tooltip" title="Remove"><i class="fe-x-circle"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="media align-items-center mb-3"><a class="d-block" href="shop-single.html"><img class="rounded" width="60" src="img/demo/shop-homepage/thumbnails/02.jpg" alt="Product" /></a>
                    <div class="media-body pl-2 ml-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h4 class="nav-heading font-size-md mb-1"><a class="font-weight-medium" href="shop-single.html">Running Sneakers, Collection</a></h4>
                                <div class="d-flex align-items-center font-size-sm"><span class="mr-2">$145.00</span><span class="mr-2">x</span>
                                    <input class="form-control form-control-sm px-2" type="number" style="max-width: 3.5rem;" value="1">
                                </div>
                            </div>
                            <div class="pl-3 border-left"><a class="d-block text-danger text-decoration-none font-size-xl" href="#" data-toggle="tooltip" title="Remove"><i class="fe-x-circle"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="media align-items-center mb-3"><a class="d-block" href="shop-single.html"><img class="rounded" width="60" src="img/demo/shop-homepage/thumbnails/06.jpg" alt="Product" /></a>
                    <div class="media-body pl-2 ml-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h4 class="nav-heading font-size-md mb-1"><a class="font-weight-medium" href="shop-single.html">Wireless Bluetooth Headset</a></h4>
                                <div class="d-flex align-items-center font-size-sm"><span class="mr-2">$258.00</span><span class="mr-2">x</span>
                                    <input class="form-control form-control-sm px-2" type="number" style="max-width: 3.5rem;" value="1">
                                </div>
                            </div>
                            <div class="pl-3 border-left"><a class="d-block text-danger text-decoration-none font-size-xl" href="#" data-toggle="tooltip" title="Remove"><i class="fe-x-circle"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs-offcanvas-cap d-block border-top px-4 mb-2">
                <div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0">$776.99</span>
                </div><a class="btn btn-primary btn-sm btn-block" href="checkout.html"><i class="fe-credit-card font-size-base mr-2"></i>Checkout</a>
            </div>
        </div>
        <!-- Navigation -->
        @include('layouts.navigation')

        <div>
            @yield('content')
        </div>

        @include('layouts.footer')

        <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i class="btn-scroll-top-icon fe-arrow-up"> </i></a>
        <!-- Vendor scrits: js libraries and plugins-->
        <script src="{{ asset('js/app.js') }}"></script>
        <!--script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script-->
        <!-- Main theme script-->
        <script src="js/theme.min.js"></script>
</body>

</html>