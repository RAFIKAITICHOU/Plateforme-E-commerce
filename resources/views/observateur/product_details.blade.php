<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails du produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-4">← Retour</a>

        <div class="row bg-white p-4 rounded shadow">
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
            </div>
            <div class="col-md-7">
                <h2 class="text-primary">{{ $product->name }}</h2>
                <p class="mt-3"><strong>Description :</strong><br>{{ $product->description }}</p>
                <p><strong>Prix :</strong> <span class="text-success">${{ $product->price }}</span></p>
                <p><strong>Stock disponible :</strong> {{ $product->stock }}</p>

                <a href="{{ route('add.cart', ['id' => $product->id]) }}" class="btn btn-success mt-3">Ajouter au panier</a>
            </div>
        </div>
    </div>

</body>

</html>