<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messages de contact</title>

    <!-- Liens CSS Admin -->
     @include('admin.css')
</head>

<body>
    {{-- Header Admin --}}
    @include('admin.header')
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full text-center">
                    <h3>Messages</h3>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="container py-5">
        <h2 class="text-danger mb-4">Messages reçus via Contact</h2>

        @if($contacts->isEmpty())
            <div class="alert alert-info text-center">Aucun message reçu pour le moment.</div>
        @else
            <div class="card p-3 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->nom }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->sujet }}</td>
                                    <td class="text-start" style="max-width: 300px">{{ Str::limit($contact->message, 120) }}</td>
                                    <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    {{-- Footer Admin --}}
    @include('admin.footer')

    {{-- Scripts --}}
    @include('admin.script')
</body>
</html>
