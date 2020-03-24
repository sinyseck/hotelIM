@extends ('welcome')

@section('title', 'Table')


@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES TABLES</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">INFORMATIONS PRODUIT</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">NUMERO TABLE : {{ $table->numero }}</li>

                                </ul>
                            </div>
                </div>
        </div>
    </div>
@endsection
