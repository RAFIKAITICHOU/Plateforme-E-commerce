<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Inscription - OneClick</title>
  <link rel="shortcut icon" href="{{ asset('home/images/icon.jpg') }}" type="image/x-icon">

  <!-- CSS OneClick -->
  <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body class="sub_page" style="background-color: #f8f9fa;">

  <!-- Header OneClick -->
  <div class="hero_area">
    @include('home.header')
  </div>

  <!-- Formulaire d'inscription -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm border-0">
          <div class="card-header text-center bg-white">
            <h4 class="text-primary mb-0">Créer un compte</h4>
          </div>
          <div class="card-body">

            {{-- Erreurs de validation --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="name" class="form-label">Nom complet</label>
                  <input type="text" name="name" id="name" class="form-control"
                         value="{{ old('name') }}" required autofocus autocomplete="name">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Adresse email</label>
                  <input type="email" name="email" id="email" class="form-control"
                         value="{{ old('email') }}" required autocomplete="username">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="phone" class="form-label">Téléphone</label>
                  <input type="text" name="phone" id="phone" class="form-control"
                         value="{{ old('phone') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="address" class="form-label">Adresse</label>
                  <input type="text" name="address" id="address" class="form-control"
                         value="{{ old('address') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="password" class="form-label">Mot de passe</label>
                  <input type="password" name="password" id="password" class="form-control"
                         required autocomplete="new-password">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                  <input type="password" name="password_confirmation" id="password_confirmation"
                         class="form-control" required autocomplete="new-password">
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="{{ route('login') }}" class="text-muted">Déjà inscrit ?</a>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer OneClick -->
  @include('home.footer')

  <!-- JS OneClick -->
  <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('home/js/bootstrap.js') }}"></script>
  <script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
