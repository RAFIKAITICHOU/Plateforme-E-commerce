<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/adminDashboard') }}">
                <img width="250" src="{{ asset('images/One click2.jpeg') }}" alt="One Click" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link {{ request()->is('adminDashboard') ? 'active text-danger fw-bold' : '' }}" href="{{ route('admin.dashboard') }}">
    DASHBOARD
</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('orders') ? 'active text-danger fw-bold' : '' }}" href="{{ url('/orders') }}">ORDERS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('payments') ? 'active text-danger fw-bold' : '' }}" href="{{ url('/payments') }}">PAYMENTS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('productManagement') ? 'active text-danger fw-bold' : '' }}" href="{{ url('/productManagement') }}">GESTION PRODUITS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/contacts') ? 'active text-danger fw-bold' : '' }}" href="{{ route('admin.contacts') }}">MESSAGES</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/subscribers') ? 'active text-danger fw-bold' : '' }}" href="{{ route('admin.subscribers') }}">ABONNÉS</a>
    </li>

                    <li>
                      <x-app-layout>
    
                      </x-app-layout>

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
 