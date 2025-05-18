<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Commandes</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body>

@include('user.user_navbar')

<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full text-center">
                    <h3>Mes Commandes</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    @if($orders->isEmpty())
        <p class="text-muted text-center">Vous n’avez passé aucune commande pour le moment.</p>
    @else
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>N</th>
                    <th>Produits</th>
                    <th>Total</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $i => $order)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td class="text-start">
                        <ul class="mb-0">
                            @php $total = 0; @endphp
                            @foreach(json_decode($order->products) as $p)
                                @php $total += $p->total; @endphp
                                <li>{{ $p->product_name }} (x{{ $p->quantity }}) - {{ $p->total }} DH</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $total }} DH</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'validée' ? 'success' : ($order->status == 'annulée' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</section>

@include('home.footer')

<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
