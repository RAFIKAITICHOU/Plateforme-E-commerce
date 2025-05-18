<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Panier - OneClick</title>
   <link rel="shortcut icon" href="{{ asset('home/images/icon.jpg') }}" type="image/x-icon">

   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body>

 @include('user.user_navbar')



   <!-- Titre -->
   <section class="inner_page_head">
      <div class="container_fuild">
         <div class="row">
            <div class="col-md-12">
               <div class="full text-center">
                  <h3>Shopping Cart</h3>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Panier avec base de données -->
   <section class="container py-5">
      <div class="row">
         @forelse($cartItems as $item)
         <div class="col-md-4 mb-4">
            <div class="card h-100 text-center p-3 shadow-sm">
               <img src="{{ asset('images/' . $item->product->image) }}" 
                    alt="{{ $item->product->name }}" 
                    class="card-img-top mx-auto" 
                    style="height: 180px; object-fit: contain;">
               <div class="card-body">
                  <h5 class="card-title">{{ $item->product->name }}</h5>
                  <p class="card-text">Prix: ${{ $item->product->price }}</p>
                  <p>Quantité: {{ $item->quantity }}</p>
                  <p>Total: ${{ $item->product->price * $item->quantity }}</p>
                  <a href="{{ route('remove.cart', $item->product->id) }}" 
                     onclick="return confirm('Êtes-vous sûr de vouloir retirer ce produit ?')" 
                     class="btn btn-danger btn-sm">Remove</a>
               </div>
            </div>
         </div>
         @empty
         <div class="col-12 text-center">
            <p class="text-muted">Votre panier est vide.</p>
         </div>
         @endforelse
      </div>

      @if($cartItems->count())
   <div class="text-end mt-4">
      <h4 class="text-success">Total général : {{ $total }}DH</h4>

   <form method="GET" action="{{ route('user.payment') }}">
    <button type="submit" class="btn btn-success">Passer la commande</button>
</form>



   </div>
@endif

   </section>

   <!-- Footer -->
   @include('home.footer')

   <!-- JS -->
   <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
   <script src="{{ asset('home/js/bootstrap.js') }}"></script>
   <script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
