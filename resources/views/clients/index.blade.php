@extends('welcome')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Clients</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Liste des clients</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Clients</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--<div class="col-lg-12">-->
                                    <div class="panel-heading">Page {{ $clients->currentPage() }} of {{ $clients->lastPage() }}
                                        <a href="{{route('clients.create') }}" class="btn btn-info float-right" style="margin-right: 3px;"><i class="fas fa-plus"></i></a></div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">

                                            <thead>
                                            <tr>

                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Adresse</th>
                                                <th>Téléphone</th>
                                                <th>Email</th>
                                                <th>Nationalité</th>
                                                <th>Numéro de Piece</th>
                                                <th>Type de Piece</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>{{$client->nom}}</td>
                                                    <td>{{$client->prenom}}</td>
                                                    <td>{{$client->adresse}}</td>
                                                    <td>{{$client->telephone}}</td>
                                                    <td>{{$client->email}}</td>
                                                    <td>{{$client->nationalite}}</td>
                                                    <td>{{$client->typePiece}}</td>
                                                    <td>{{$client->numeroPiece}}</td>
                                                    <td>

                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['clients.destroy', $client->id] ]) !!}
                                                        <a href="{{ URL::to('clients/'.$client->id.'/edit') }}" class="btn btn-warning pull-left" ><i class="far fa-edit"></i></a>
                                                        <button class="btn btn-danger border-left-0 border" type="submit">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="text-center">
                                        {{ $clients->links() }}
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                   <!-- </div>-->
                </div>
            </div>
        </section>
    </div>

@endsection