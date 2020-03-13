@extends('welcome')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES RESERVATIONS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('reservations.create') }}" role="button" class="btn btn-primary">ENREGISTRER RESERVATION</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="col-12">
            <div class="card border-danger border-0">
                <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES RESERVATIONS</div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                        <tr>
                            {{--<th>#</th>--}}
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Téléphone</th>
                            <th>Paiement</th>
                            <th>Etat</th>
                            <th>Date Debut</th>
                            <th>Date Fin</th>
                            <th>Chambre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $reserver)
                            <tr>
                                {{--<td>{{ $reserver->id }}</td>--}}
                                <td>{{ $reserver->client->nom }}</td>
                                <td>{{ $reserver->client->prenom }}</td>
                                <td>{{ $reserver->client->telephone }}</td>
                                @if($reserver->etat_paiement==false)
                                <td><span class="badge bg-danger">non payé</span></td>
                                @else
                                    <td><span class="badge bg-success">payé</span></td>
                                @endif
                                <td>{{ $reserver->statut }}</td>
                                <td>{{Carbon\Carbon::parse( $reserver->date_arrivee)->format('d-m-Y h:m:s') }}</td>
                                <td>{{ Carbon\Carbon::parse($reserver->date_depart)->format('d-m-Y h:m:s') }}</td>
                                <td>
                                    <a href="{{ route('facturer.voir',[$reserver->id]) }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i></a>
                                    <a href="{{ route('reservations.edit', $reserver->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('reservations.show', $reserver->id) }}" role="button" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['reservations.destroy', $reserver->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    {!! Form::close() !!}

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>



                </div>

            </div>
        </div>
    </div>

@endsection



