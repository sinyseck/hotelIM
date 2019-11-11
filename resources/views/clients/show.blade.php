@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES CLIENTS</h1>
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

             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">INFORMATIONS CLIENT</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">NOM CLIENT : {{ $client->nom }}</li>
                                    <li class="list-group-item">PRENOM CLIENT : {{ $client->prenom }}</li>
                                    <li class="list-group-item">NATIONALITE CLIENT : {{ $client->nationalite }}</li>
                                    <li class="list-group-item">TYPE PIECE FOURNI: {{ $client->typePiece }}</li>
                                    <li class="list-group-item">NUMERO PIECE : {{ $client->numeroPiece }}</li>
                                    <li class="list-group-item">ADRESSE : {{ $client->adresse }}</li>
                                    <li class="list-group-item">TELEPHONE: {{ $client->telephone }}</li>
                                    <li class="list-group-item">EMAIL: {{ $client->email }}</li>
                                </ul>
                            </div>
                </div>
        </div>
    </div>
@endsection
