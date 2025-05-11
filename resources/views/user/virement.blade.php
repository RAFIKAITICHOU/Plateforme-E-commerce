<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Virement bancaire</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">Instructions pour le virement bancaire</h3>

    <div class="p-4 bg-white border rounded shadow-sm mb-4">
        <p>Veuillez effectuer un virement aux coordonnées suivantes :</p>
        <ul>
            <li><strong>Banque :</strong> Banque Marocaine</li>
            <li><strong>IBAN :</strong> MA64 1234 5678 9012 3456 7890</li>
            <li><strong>BIC :</strong> BCMAMAMC</li>
            <li><strong>Nom du bénéficiaire :</strong> One Click</li>
        </ul>
        <p>Après le virement, cliquez ci-dessous pour confirmer la commande.</p>
    </div>

    <form method="POST" action="{{ route('user.payment.process') }}">
        @csrf
        <input type="hidden" name="payment_method" value="virement">
        <button type="submit" class="btn btn-dark w-100">J'ai effectué le virement</button>
    </form>
</div>

</body>
</html>
