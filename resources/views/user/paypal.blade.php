<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement PayPal</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">Paiement avec PayPal</h3>

    <form method="POST" action="{{ route('user.payment.process') }}" class="p-4 bg-white border rounded shadow-sm">
        @csrf

        <input type="hidden" name="payment_method" value="paypal">

        <div class="mb-3">
            <label class="form-label">Adresse PayPal</label>
            <input type="email" name="paypal_email" class="form-control" placeholder="exemple@paypal.com" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Payer avec PayPal</button>
    </form>
</div>

</body>
</html>
