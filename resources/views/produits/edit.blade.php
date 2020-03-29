@extends ('welcome')

@section('title', '| Modifier Produit')


@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES PRODUITS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('produits.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($produit, ['method'=>'PATCH','route'=>['produits.update', $produit->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION D'UN PRODUIT</div>
                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nom</label>
                                    <input type="text" name="nom" class="form-control" value="{{$produit->nom}}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Quantité</label>
                                        <input type="text" name="quantite" class="form-control" min="1" value="{{$produit->quantite}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Prix Unitaire</label>
                                        <input type="text" name="pu" class="form-control" value="{{$produit->pu}}" required>
                                    </div>

                                </div>

                                <div>
                                    <br>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
    {!! Form::close() !!}
                </div>
        </div>

    </div>

@endsection
