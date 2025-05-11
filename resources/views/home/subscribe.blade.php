<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Subscribe - One Click</title>
   <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body>

<section class="subscribe_section py-5">
   <div class="container">
      <div class="box">
         <div class="row">
            <div class="col-md-6 offset-md-3">
               <div class="subscribe_form bg-light p-4 rounded shadow">
                  <div class="heading_container heading_center mb-3">
                     <h3>Subscribe To Get Discount Offers</h3>
                  </div>

                  {{--  Message de succès --}}
                  @if(session('success'))
                     <div id="subscribe-alert" class="alert alert-success text-center">
                        {{ session('success') }}
                     </div>

                     <script>
                        setTimeout(() => {
                           const alertBox = document.getElementById('subscribe-alert');
                           if(alertBox) {
                              alertBox.style.transition = 'opacity 0.5s ease';
                              alertBox.style.opacity = 0;
                              setTimeout(() => alertBox.remove(), 500);
                           }
                        }, 5000);
                     </script>
                  @endif

                  <p class="text-center">Recevez nos promotions par email !</p>

                  <form action="{{ route('subscribe') }}" method="POST" class="d-flex">
                     @csrf
                     <input type="email" name="email" placeholder="Enter your email" class="form-control me-2" required>
                     <button type="submit" class="btn btn-danger px-4">Subscribe</button>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
