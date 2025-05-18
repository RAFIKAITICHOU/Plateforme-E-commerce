<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>One Click - Contact</title>
   <link rel="shortcut icon" href="{{ asset('images/icon.jpg') }}" type="image/x-icon">

   <!-- CSS depuis public/home -->
   <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>

<body class="sub_page">

   <!-- Header -->
   @include('home.header')

   <!-- Section Titre -->
   <section class="inner_page_head">
      <div class="container_fuild">
         <div class="row">
            <div class="col-md-12">
               <div class="full">
                  <h3>Contactez-nous</h3>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="why_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <div class="full">
                  <form method="POST" action="{{ route('contact.store') }}">
                     @csrf
                     <fieldset>

                        <input type="text" placeholder="Nom complet" name="nom" required />
                        @error('nom')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="email" placeholder="Adresse e-mail" name="email" required />
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="text" placeholder="Sujet" name="sujet" />
                        @error('sujet')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <textarea placeholder="Votre message" name="message" required></textarea>
                        @error('message')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="submit" value="Envoyer" />

                     </fieldset>
                  </form>

                  @if(session('success'))
                  <div id="successMessage" class="alert alert-success mt-3" role="alert">
                     {{ session('success') }}
                  </div>
                  @endif


               </div>
            </div>
         </div>
      </div>
   </section>



   <!-- Section arrivée -->
   <section class="arrival_section">
      <div class="container">
         <div class="box">
            <div class="arrival_bg_box">
               <img src="{{ asset('images/arrival-bg.png') }}" alt="">
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
   @include('home.footer')

   <!-- JS -->
   <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
   <script src="{{ asset('home/js/popper.min.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="{{ asset('home/js/custom.js') }}"></script>
   <script>
      setTimeout(function() {
         var alert = document.getElementById('successMessage');
         if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
         }
      }, 3000); // 3 secondes
   </script>

</body>

</html>