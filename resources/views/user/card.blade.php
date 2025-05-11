<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement par carte</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">Paiement par Carte Bancaire</h3>

    <form method="POST" action="{{ route('user.payment.process') }}" class="p-4 bg-white border rounded shadow-sm">
        @csrf

        <input type="hidden" name="payment_method" value="carte_bancaire">

        <div class="mb-3">
            <label class="form-label">Numéro de carte</label>
            <input type="text" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" required>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Date d'expiration</label>
                <input type="text" name="expiry" class="form-control" placeholder="MM/AA" required>
            </div>
            <div class="col">
                <label class="form-label">CVC</label>
                <input type="text" name="cvc" class="form-control" placeholder="123" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom du titulaire</label>
            <input type="text" name="card_holder" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Payer</button>
    </form>
</div>

</body>
</html>
