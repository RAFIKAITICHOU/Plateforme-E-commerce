<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choix de paiement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body>

<!-- Header -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img width="200" src="{{ asset('images/One click2.jpeg') }}" alt="One Click Logo" />
            </a>
        </nav>
    </div>
</header>

<!-- Titre -->
<section class="inner_page_head py-3">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="text-white fw-bold">Choisissez une méthode de paiement</h3>
            </div>
        </div>
    </div>
</section>

<!-- Formulaire -->
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            <form action="{{ route('user.payment.method') }}" method="POST" class="p-4 border rounded shadow-sm bg-white">
    @csrf


                <div class="mb-4">
                    <label class="form-label fw-bold">Méthode de paiement :</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="carte_bancaire" value="carte_bancaire" required>
                        <label class="form-check-label" for="carte_bancaire">Carte bancaire</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="virement" value="virement" required>
                        <label class="form-check-label" for="virement">Paiement par virement</label>
                    </div>

                    @error('payment_method')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold">
                    Confirmer la commande
                </button>
            </form>
        </div>
    </div>
</section>


<!-- Footer -->
@include('home.footer')

<!-- JS -->
<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>

</body>
</html>
