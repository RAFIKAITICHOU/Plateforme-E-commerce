<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>One Click - Blog</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.jpg') }}" type="image/x-icon">

    <!-- CSS depuis /public/home -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>

<body class="sub_page">

    <div class="hero_area">
        @include('home.header')
    </div>

    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Blog List</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- why section -->
    <section class="why_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Why Shop With Us</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                <circle cx="32" cy="32" r="30" fill="#f4f4f4" />
                                <rect x="20" y="30" width="24" height="4" fill="#ccc" />
                            </svg>
                        </div>
                        <div class="detail-box">
                            <h5>Fast Delivery</h5>
                            <p>Variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                <circle cx="32" cy="32" r="30" fill="#f4f4f4" />
                                <polygon points="20,40 32,20 44,40" fill="#ccc" />
                            </svg>
                        </div>
                        <div class="detail-box">
                            <h5>Free Shipping</h5>
                            <p>Variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                                <circle cx="32" cy="32" r="30" fill="#f4f4f4" />
                                <path d="M22 22h20v20H22z" fill="#ccc" />
                            </svg>
                        </div>
                        <div class="detail-box">
                            <h5>Best Quality</h5>
                            <p>Variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('home.footer')

    <!-- Scripts depuis /public/home -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

</html>