<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des abonnés</title>

    <!-- Liens CSS admin -->
     @include('admin.css')
</head>

<body>

    {{-- Header admin --}}
    @include('admin.header')

<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full text-center">
                    <h3>ABONNES</h3>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Emails abonnés à la newsletter</h2>
            <a href="{{ route('admin.subscribers.export') }}" class="btn btn-outline-success">Exporter en CSV</a>
        </div>

        @if($subscribers->isEmpty())
            <div class="alert alert-info text-center">Aucun abonné enregistré.</div>
        @else
            <div class="card p-3 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Date d’abonnement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $subscriber->id }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    {{-- Footer admin --}}
    @include('admin.footer')

    {{-- Scripts admin --}}
    @include('admin.script')

</body>
</html>
