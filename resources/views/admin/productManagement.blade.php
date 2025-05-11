<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Gestion des Produits</title>
   <link rel="shortcut icon" href="{{ asset('home/images/icon.jpg') }}" type="image/x-icon">

   <!-- CSS depuis public/home -->
   <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body class="sub_page">

<!-- Header -->
@include('admin.header')

<!-- Titre -->
<section class="inner_page_head">
   <div class="container_fuild">
      <div class="row">
         <div class="col-md-12">
            <div class="full text-center">
               <h3>Gestion des Produits</h3>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Formulaire et liste -->
<section class="form_section layout_padding">
   <div class="container">
      <h4>Ajouter un Nouveau Produit</h4>

      @if(session('success'))
         <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
         </div>
      @endif

      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
         @csrf
         <fieldset>
            <input type="text" placeholder="Nom du produit" name="name" class="form-control my-2" required />
            <input type="text" placeholder="Description" name="description" class="form-control my-2" required />
            <input type="number" placeholder="Prix" name="price" class="form-control my-2" required />
            <input type="number" placeholder="Stock" name="stock" class="form-control my-2" required />
            <input type="file" name="image" class="form-control my-2" required />
            <input type="submit" class="btn btn-dark" value="Ajouter" />
         </fieldset>
      </form>

      <hr />
      <h4 class="mt-4">Liste des Produits</h4>
      <table class="table table-bordered mt-3">
         <thead>
            <tr>
               <th>ID</th>
               <th>Nom</th>
               <th>Description</th>
               <th>Prix</th>
               <th>Stock</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach($products as $product)
               <tr>
                  <td>#{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->price }} €</td>
                  <td>{{ $product->stock }}</td>
                  <td>
                     <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                     <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                     </form>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</section>

<!-- Section arrivée -->
<section class="arrival_section">
   <div class="container">
      <div class="box">
         <div class="arrival_bg_box">
            <img src="{{ asset('home/images/arrival-bg.png') }}" alt="">
         </div>
         <div class="row">
            <div class="col-md-6 ml-auto">
               <div class="heading_container remove_line_bt">
                  <h2>Découvrez nos Nouveaux Produits !</h2>
               </div>
               <p style="margin-top: 20px;margin-bottom: 30px;">
                  Ne manquez pas l'occasion de découvrir nos dernières nouveautés ! Produits de qualité, au meilleur prix.
               </p>
               <a href="{{ url('/products') }}" class="btn btn-dark">Voir les produits</a>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Footer -->
@include('admin.footer')

<!-- JS -->
@include('admin.script')

<script>
   setTimeout(() => {
      document.getElementById('success-alert')?.remove();
   }, 3000);
</script>

</body>
</html>
