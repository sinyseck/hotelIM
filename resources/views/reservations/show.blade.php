@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-info">GESTION DU STOCK</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('entreeStocks.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card border-danger border-0">
                <div class="card-header bg-info text-center">INFORMATIONS Reservation</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">NOM : {{ $reservation->client->nom }}</li>
                        <li class="list-group-item">PRENOM : {{$reservation->client->prenom }}</li>
                        <li class="list-group-item">Téléphone : {{ $reservation->client->telephone }}</li>
                        <li class="list-group-item">Date début : {{ $reservation->date_arrivee}}</li>
                        <li class="list-group-item">Date fin : {{ $reservation->date_depart}}</li>
                        <li class="list-group-item">Nombre de Personnes : {{ $reservation->nbre_personne}}</li>
                            @if($reservation->etat_paiement)
                        <li class="list-group-item text-success"> Paiement  : Payé</li>
                            @else
                                <li class="list-group-item text-danger">Paiement  : Non payé</li>
                            @endif
                        <li class="list-group-item">Chambre occupé :
                        @foreach($reservation->affectes as $affecte)
                             chambre N°{{ $affecte->chambre_id }},
                        @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
