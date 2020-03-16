@extends('welcome')

@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">GESTION DES PLATS</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('plats.create') }}" role="button" class="btn btn-primary">ENREGISTRER PLAT</a></li>
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

<div class="col-12">
    <div class="card border-danger border-0">
        <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES PLATS</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prix
                            <th>Compositions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plats as $plat)
                        <tr>
                            <td>{{ $plat->id }}</td>
                            <td>{{ $plat->nom }}</td>
                            <td>{{ $plat->prix}}</td>
                            <td> @foreach($plat->produits as $produit)
                                     {{ $produit->nom }},
                            @endforeach
                            </td>


                            <td>
                                <a href="{{ route('plats.edit', $plat->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {{--<a href="{{ route('plats.show', $plat->id) }}" role="button" class="btn btn-info"><i class="fas fa-eye"></i></a>--}}
                                {!! Form::open(['method' => 'DELETE', 'route'=>['plats.destroy', $plat->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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



