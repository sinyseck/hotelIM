@extends ('welcome')

@section('title', '| Enregistrer Entrée')


@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES ENTRÉES</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('entreeStocks.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES ENTRÉES</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('entreeStocks.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UNE NOUVELLE ENTRÉE</div>
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
                                <div class="row">
                                        <div class="col-lg-6">
                                        <label>Quantité</label>
                                        <input type="number" name="quantite" value="{{ old('quantite') }}" class="form-control" min="1" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Produit</label>
                                        <select class="form-control" name="id_produit" required="">
                                            @foreach ($produits as $produit)
                                            <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                                @endforeach

                                        </select>
                                    </div>

                                </div>

                                <div>
                                    <br>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
            </form>
            </div>
        </div>



@endsection
