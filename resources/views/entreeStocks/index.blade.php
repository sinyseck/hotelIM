@extends('welcome')

@section('title', '| Entrées')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">GESTION DES ENTRÉES</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('entreeStocks.create') }}" role="button" class="btn btn-primary">NOUVELLE ENTRÉE</a></li>
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
        <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES ENTRÉES </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quantité</th>
                            <th>Produit</th>
                            <th>Date mise à jour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($entreeStocks as $entreeStock)
                        <tr>
                            <td>{{ $entreeStock->id }}</td>
                            <td>{{ $entreeStock->quantite }}</td>
                            <td>{{ $entreeStock->nom }}</td>
                            <td>{{ $entreeStock->created_at }}</td>



                            <td>
                                <a href="{{ route('entreeStocks.edit', $entreeStock->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                               <!-- <a href="{{ route('entreeStocks.show', $entreeStock->id) }}" role="button" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
                                {!! Form::open(['method' => 'DELETE', 'route'=>['entreeStocks.destroy', $entreeStock->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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



