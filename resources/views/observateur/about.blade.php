<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>One Click - About</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.jpg') }}" type="image/x-icon">

    <!-- Styles (correction vers /home/css) -->
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
                    <h3>About us</h3>
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
            @foreach([
                ['title' => 'Fast Delivery', 'path' => 'M20 32h24v4H20z'],
                ['title' => 'Free Shipping', 'path' => 'M16 28h32v8H16z'],
                ['title' => 'Best Quality', 'path' => 'M22 22h20v20H22z'],
            ] as $item)
            <div class="col-md-4">
                <div class="box">
                    <div class="img-box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
                            <circle cx="32" cy="32" r="30" fill="#f4f4f4" />
                            <path d="{{ $item['path'] }}" fill="#ccc" />
                        </svg>
                    </div>
                    <div class="detail-box">
                        <h5>{{ $item['title'] }}</h5>
                        <p>variations of passages of Lorem Ipsum available</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- arrival section -->
<section class="arrival_section">
    <div class="container">
        <div class="box">
            <div class="arrival_bg_box">
                <img src="{{ asset('images/arrival-bg.png') }}" alt="">
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto">
                    <div class="heading_container remove_line_bt">
                        <h2>Découvrez nos Nouveaux Produits !</h2>
                    </div>
                    <p class="my-3">
                        Ne manquez pas l'occasion de découvrir nos toutes dernières nouveautés ! Nous avons sélectionné une gamme de produits innovants et de haute qualité.
                    </p>
                    <a href="{{ url('/products') }}" class="btn btn-dark">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.footer')

<!-- Scripts (correction vers /home/js) -->
<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/popper.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>

</body>
</html>
