<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>One Click - Testimonial</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.jpg') }}" type="image/x-icon">

    <!-- Styles -->
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
                <div class="full text-center">
                    <h3>Testimonial</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->

<!-- client section -->
<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Customer's Testimonial</h2>aaaa
        </div>
        <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                @foreach($clients_fideles as $index => $client)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                            <div class="img-box">
                                <div class="img_box-inner">
                                    @if($client->profile_photo_path)
                                        <img src="{{ asset('storage/' . $client->profile_photo_path) }}" alt="{{ $client->name }}">
                                    @else
                                        <img src="{{ asset('images/default-user.png') }}" alt="Photo par défaut">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="detail-box text-center">
                            <h5>{{ $client->name }}</h5>
                            <h6>Client fidèle</h6>
                            <p>A effectué {{ $client->orders_count }} commande{{ $client->orders_count > 1 ? 's' : '' }} sur notre site.</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="carousel_btn_box">
                <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                </a>
                <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end client section -->

@include('home.footer')

<!-- Scripts -->
<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/popper.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>

</body>
</html>
