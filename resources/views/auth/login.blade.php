<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Connexion - OneClick</title>
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

  <!-- Formulaire de Connexion -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm border-0">
          <div class="card-header text-center bg-white">
            <h4 class="text-primary mb-0">Connexion à votre compte</h4>
          </div>
          <div class="card-body">

            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('login') }}?redirect=user">

              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="form-control" required autofocus autocomplete="username">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password"
                       class="form-control" required autocomplete="current-password">
              </div>

              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-decoration-none text-muted">
                    Mot de passe oublié ?
                  </a>
                @endif
                <button type="submit" class="btn btn-primary">Connexion</button>
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
