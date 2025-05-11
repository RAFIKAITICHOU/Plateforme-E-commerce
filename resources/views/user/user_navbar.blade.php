<!-- Header -->
<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container">
         <a class="navbar-brand" href="{{ url('/') }}">
            <img width="250" src="{{ asset('images/One click2.jpeg') }}" alt="One Click Logo" />
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
               @auth
               <!-- Lien vers Panier -->
               <li class="nav-item">
                  <a class="nav-link {{ request()->is('user/cart') ? 'text-danger fw-bold' : '' }}" href="{{ route('user.cart') }}">Panier</a>
               </li>

               <!-- Lien vers État de commande -->
               <li class="nav-item">
                  <a class="nav-link {{ request()->is('user/orders') ? 'text-danger fw-bold' : '' }}" href="{{ route('user.orders') }}">État de commande</a>
               </li>

               <!-- Lien vers Produits -->
               <li class="nav-item">
                  <a class="nav-link {{ request()->is('user/products') ? 'text-danger fw-bold' : '' }}" href="{{ route('user.products') }}">Produits</a>
               </li>

               <!-- Dropdown utilisateur -->
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserDropdown">
                     <a class="dropdown-item {{ request()->is('user/profile') ? 'text-danger fw-bold' : '' }}" href="{{ route('user.profile') }}">Mon Profil</a>
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Déconnexion</button>
                     </form>
                  </div>
               </li>
               @else
               <!-- Connexion / inscription -->
               <li class="nav-item">
                  <a class="btn btn-primary ms-2" href="{{ route('login') }}">Login</a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-success ms-2" href="{{ route('register') }}">Register</a>
               </li>
               @endauth
            </ul>
         </div>
      </nav>
   </div>
</header>
