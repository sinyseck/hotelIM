@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-info">{{ $commande->client->prenom }} {{ $commande->client->nom }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('clients.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="col-12">
                <div class="card border-danger border-0">
                    <div class="card-header bg-info text-center">Client: {{ $commande->client->prenom }} {{ $commande->client->nom }}
                    Date: {{ Carbon\Carbon::parse($commande->created_at)->format('d-m-Y h:m:s') }}</div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Quantite</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailCommandes as $detailCommande)
                                    <tr>
                                        <td>{{$detailCommande->plat->id}} </td>
                                        <td>{{$detailCommande->plat->nom}} </td>
                                        <td>{{ $detailCommande->plat->prix * $detailCommande->quantite}} </td>
                                        <td>{{ $detailCommande->quantite}} </td>
                                    </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
