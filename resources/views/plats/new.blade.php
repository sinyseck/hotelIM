@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES COMMANDES</h1>
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
                    <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES PRODUITS EN STOCK</div>
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
                        @foreach($plats as $key=>$plat)
                            <tr>
                                <td>{{++$key}} </td>
                                <td>{{$plat->nom}} </td>
                                <td>{{$plat->prix}} </td>
                                <td>{{$plat->quantite}} </td>
                            </tr>
                        @endforeach
                        </tbody>
            </div>
        </div>
    </div>
@endsection
