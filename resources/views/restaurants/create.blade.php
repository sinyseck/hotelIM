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
                        <li class="breadcrumb-item active"><a href="{{ route('produits.index') }}" role="button" class="btn btn-primary">LISTE DES PRODUITS</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('restaurants.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UNE COMMANDE</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Client</label>
                                            <select class="form-control" name="id_client">
                                                @foreach ($clients as $client)
                                                <option value="{{$client->id}}">{{$client->prenom}} {{$client->nom}} {{$client->telephone}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Table</label>
                                            <select class="form-control" name="id_table">
                                                @foreach ($tables as $table)
                                                <option value="{{$table->id}}">{{$table->numero}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Prix</label>
                                        <input type="number" name="prix" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Quantite</label>
                                        <input type="number" name="quantite" class="form-control">
                                    </div>
                                    <div class='form-group'>
                                        @foreach ($produits as $produit)
                                            {{ Form::checkbox('produits[]',  $produit->id ) }}
                                            Produit {{ Form::label($produit->nom, ucfirst($produit->nom)) }}<br>
                                        @endforeach
                                    </div>
                                </div>

                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
            </form>
            </div>
        </div>

    </div>

@endsection
