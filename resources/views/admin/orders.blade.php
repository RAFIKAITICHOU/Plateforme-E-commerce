<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - OneClick</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body class="sub_page">

<div class="hero_area">
    <!-- Header admin -->
    @include('admin.header')

    <!-- Titre -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="full">
                        <h3>Order Management</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Table de commandes -->
    <div class="container my-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm rounded">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Utilisateur</th>
                        <th>Produits</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td class="text-start">
                            <ul class="mb-0 ps-3">
                                @foreach(json_decode($order->products) as $product)
                                    <li>{{ $product->product_name }} (x{{ $product->quantity }}) - ${{ $product->total }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <span class="badge bg-{{ $order->status == 'validée' ? 'success' : ($order->status == 'annulée' ? 'danger' : 'warning') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                    <option value="en attente" {{ $order->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                                    <option value="validée" {{ $order->status == 'validée' ? 'selected' : '' }}>Validée</option>
                                    <option value="annulée" {{ $order->status == 'annulée' ? 'selected' : '' }}>Annulée</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-muted">Aucune commande pour le moment.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    @include('admin.footer')
</div>

<!-- Scripts -->
@include('admin.script')

</body>
</html>
