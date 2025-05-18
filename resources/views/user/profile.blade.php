<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .profile-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-avatar {
            width: 100%;
            border-bottom: 1px solid #eee;
            padding: 2rem;
            text-align: center;
        }

        .profile-avatar img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            padding: 2rem;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">
        <a href="{{ route('user.cart') }}" class="btn btn-secondary mb-4">← Retour</a>

        @if(session('success'))
        <div id="successMessage" class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-card d-flex">
                    <!-- Avatar -->
                    

                    <!-- Infos -->
                    <div class="profile-info col-md-8 ">
                        <form method="POST" action="{{ route('user.updateProfile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control">
                            </div>


                            <hr>

                            <div class="form-group">
                                <label>Nouveau mot de passe</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Confirmation mot de passe</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        setTimeout(() => {
            const alert = document.getElementById('successMessage');
            if (alert) alert.remove();
        }, 5000);
    </script>

</body>

</html>