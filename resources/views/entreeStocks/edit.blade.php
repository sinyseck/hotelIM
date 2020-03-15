@extends ('welcome')

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
                        <li class="breadcrumb-item active"><a href="{{ route('entreeStocks.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($entreeStock, ['method'=>'PATCH','route'=>['entreeStocks.update', $entreeStock->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION D'UNE ENTRÉE</div>
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
                                 {{--   <div class="col-lg-6">
                                        <label>Date</label>
                                    <input type="text" name="date" class="form-control" value="{{$entreeStock->date}}">
                                    </div>--}}
                                    <div class="col-lg-6">
                                        <label>Quantité</label>
                                        <input type="text" name="quantite" class="form-control" value="{{$entreeStock->quantite}}"  min="1" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Nom Produit</label>
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
