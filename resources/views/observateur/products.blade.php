<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>One Click - Produits</title>
   <link rel="shortcut icon" href="{{ asset('home/images/icon.jpg') }}" type="image/x-icon">

   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">

   <style>
      .input-group-sm .form-control {
         height: 30px;
         padding: 0 5px;
      }
      .option_container .input-group {
         max-width: 120px;
      }
   </style>
<style>
   .option1 {
      background-color: #f7444e;
      color: #fff;
      padding: 8px 25px;
      border-radius: 25px; /* ✅ coins arrondis */
      text-align: center;
      font-size: 14px;
      font-weight: bold;
      border: none;
      transition: 0.3s ease;
      display: inline-block;
   }

   .option1:hover {
      background-color: #e63b46;
   }

   .option2 {
      background-color: #000;
      color: #fff;
      padding: 8px 25px;
      border-radius: 25px;
      text-align: center;
      font-size: 14px;
      font-weight: bold;
      display: inline-block;
   }

   .option2:hover {
      background-color: #333;
   }
</style>

</head>
<body class="sub_page">

<div class="hero_area">
   @include('home.header')
</div>

<!-- Inner Page Header -->
<section class="inner_page_head">
   <div class="container_fuild">
      <div class="row">
         <div class="col-md-12">
            <div class="full text-center">
               <h3>Produits disponibles</h3>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Product Grid Section -->
<section class="product_section layout_padding">
   <div class="container">

      <!-- ✅ Message de confirmation -->
      @if(session('message'))
         <div class="alert alert-success alert-dismissible fade show text-center" role="alert" id="cart-alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      @endif

      <div class="heading_container heading_center mb-4">
         <h2>Nos <span>produits</span></h2>
      </div>

      <div class="row">
         @foreach($products as $product)
         <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="box">
               <form action="{{ route('add.cart.post', ['id' => $product->id]) }}" method="POST">
                  @csrf
                  <div class="option_container">
                     <div class="options d-flex flex-column align-items-center gap-2">

                        <!-- ✅ Sélecteur de quantité -->
                        <div class="input-group input-group-sm justify-content-center">
                           <button type="button" class="btn btn-outline-light"
                                   onclick="this.parentNode.querySelector('input').stepDown()">−</button>
                           <input type="number" name="quantity" min="1" value="1"
                                  class="form-control text-center bg-white border-0" />
                           <button type="button" class="btn btn-outline-light"
                                   onclick="this.parentNode.querySelector('input').stepUp()">+</button>
                        </div>

                        <button type="submit" class="option1">add to cart</button>
                        <a href="{{ route('products.details', ['id' => $product->id]) }}" class="option2">Détails</a>
                     </div>
                  </div>

                  <div class="img-box">
                     <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                  </div>
                  <div class="detail-box text-center">
                     <h5>{{ $product->name }}</h5>
                     <h6>${{ number_format($product->price, 2) }}</h6>
                  </div>
               </form>
            </div>
         </div>
         @endforeach
      </div>

      <div class="btn-box text-center mt-4">
         <a href="{{ url('/products') }}" class="btn btn-outline-dark">Voir tous les produits</a>
      </div>
   </div>
</section>

@include('home.footer')

<!-- Scripts -->
<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/popper.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>

<!-- ✅ Script pour auto-fermer l'alerte -->
<script>
   setTimeout(function () {
      const alert = document.getElementById('cart-alert');
      if (alert) {
         alert.classList.remove('show');
         alert.classList.add('fade');
         alert.style.display = 'none';
      }
   }, 3000);
</script>

</body>
</html>
