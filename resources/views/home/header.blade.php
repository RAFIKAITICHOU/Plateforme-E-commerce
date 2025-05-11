<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img width="250" src="{{ asset('images/One click2.jpeg') }}" alt="One Click Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                  <!-- Lien Home -->
<li class="nav-item">
    <a class="nav-link {{ request()->is('/') ? 'text-danger fw-bold' : '' }}" href="{{ url('/') }}">Home</a>
</li>

<!-- Lien About -->
<li class="nav-item">
    <a class="nav-link {{ request()->is('about') ? 'text-danger fw-bold' : '' }}" href="{{ route('about') }}">About</a>
</li>

<!-- Lien Testimonial -->
<li class="nav-item">
    <a class="nav-link {{ request()->is('testimonial') ? 'text-danger fw-bold' : '' }}" href="{{ route('testimonial') }}">Testimonial</a>
</li>


                    <!-- Lien Products -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products') ? 'text-danger fw-bold' : '' }}" href="{{ url('/products') }}">Products</a>
                    </li>

                    <!-- Lien Blog -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog') ? 'text-danger fw-bold' : '' }}" href="{{ url('/blog') }}">Blog</a>
                    </li>

                    <!-- Lien Contact -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'text-danger fw-bold' : '' }}" href="{{ url('/contact') }}">Contact</a>
                    </li>

                    <!-- Auth -->
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('login') ? 'text-danger fw-bold' : '' }}" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('register') ? 'text-danger fw-bold' : '' }}" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- ✅ Scripts Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
