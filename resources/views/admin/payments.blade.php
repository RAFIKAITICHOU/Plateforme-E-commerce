<!DOCTYPE html>
<html lang="fr">
<head>
    @include('admin.css')
    <title>Paiements</title>
</head>
<body class="sub_page">
    <div class="hero_area">
        {{-- Header Section --}}
        @include('admin.header')
    </div>

    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full text-center">
                        <h3>Payments</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="form_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="full">
                        <h1 class="mb-4">Liste des paiements</h1>

                        @if($payments->isEmpty())
                            <div class="alert alert-info text-center">Aucun paiement enregistré.</div>
                        @else
                            <table class="table table-bordered table-striped shadow-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Montant</th>
                                        <th>Mode de paiement</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->user->name ?? 'Utilisateur inconnu' }}</td>
                                            <td>{{ $payment->amount }} DH</td>
                                            <td>{{ ucfirst($payment->payment_method) }}</td>
                                            <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer Section --}}
    @include('admin.footer')

    {{-- Scripts Section --}}
    @include('admin.script')
</body>
</html>
