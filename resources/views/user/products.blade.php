<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>Produits - One Click</title>
   <link rel="shortcut icon" href="{{ asset('home/images/icon.jpg') }}" type="image/x-icon">

   <!-- CSS global -->
   <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">

   <!-- ✅ STYLES personnalisés pour cette page -->
   <style>
      .option1 {
         background-color: #f7444e;
         color: #fff;
         padding: 8px 25px;
         border-radius: 25px;
         text-align: center;
         text-transform: capitalize;
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
    @include('user.user_navbar')
</div>

<section class="inner_page_head py-4">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h3>Nos produits</h3>
         </div>
      </div>
   </div>
</section>

<div class="container mt-3">
   @if(session('message'))
      <div id="cart-alert" class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('message') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   @endif
</div>


<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>Produits <span>disponibles</span></h2>
      </div>

      <div class="row">
         @foreach($products as $product)
         <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
               <form action="{{ route('add.cart.post', ['id' => $product->id]) }}" method="POST">
                  @csrf
                  <div class="option_container">
                     <div class="options d-flex flex-column align-items-center gap-2">
                        <!-- ✅ Sélecteur quantité visible au survol -->
                        <div class="input-group input-group-sm justify-content-center" style="max-width: 120px;">
                           <button type="button" class="btn btn-outline-light"
                                   onclick="this.parentNode.querySelector('input').stepDown()">−</button>
                           <input type="number" name="quantity" min="1" value="1"
                                  class="form-control text-center bg-white border-0" />
                           <button type="button" class="btn btn-outline-light"
                                   onclick="this.parentNode.querySelector('input').stepUp()">+</button>
                        </div>

                        <!-- Boutons classiques -->
                        <button type="submit" class="option1">add to cart</button>
                        <a href="{{ route('user.products.details', ['id' => $product->id]) }}" class="option2">Détails</a>
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
   </div>
</section>

@include('home.footer')

<!-- JS -->
<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>

<script>
   setTimeout(function() {
      let alert = document.getElementById('cart-alert');
      if (alert) {
         alert.classList.remove('show');
         alert.classList.add('fade');
         alert.style.display = 'none';
      }
   }, 3000);
</script>


</body>
</html>
