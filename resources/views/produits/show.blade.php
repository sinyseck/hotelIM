@extends ('welcome')

@section('title', 'Produit')


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

             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">INFORMATIONS PRODUIT</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">NOM PRODUIT : {{ $produit->nom }}</li>
                                    <li class="list-group-item">QUANTITE PRODUIT : {{ $produit->quantite }}</li>
                                    <li class="list-group-item">PRIX UNITAIRE : {{ $produit->quantite }}</li>
                                </ul>
                            </div>
                </div>

                <form method="GET" action="/pdf" enctype="multipart/form-data">
                    <div class="form-group">

                     <div class="control">

                         <button type="submit" class="btn btn-primary">Generate PDF File</button>

                     </div>

                    </div>

                    </form>
        </div>
    </div>
@endsection
