@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES CLIENTS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('clients.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES CLIENTS</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($client, ['method'=>'PATCH','route'=>['clients.update', $client->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UN NOUVEAU CLIENT</div>
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
                                        <label>Nom</label>
                                    <input type="text" name="nom" class="form-control" value="{{$client->nom}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Prénom</label>
                                        <input type="text" name="prenom" class="form-control" value="{{$client->prenom}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nationalité</label>
                                        <input type="text" name="nationalite" class="form-control" value="{{$client->nationalite}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Type de Pièce</label>
                                        <input type="text" name="typePiece" class="form-control" value="{{$client->typePiece}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Numéro Pièce</label>
                                        <input type="number" name="numeroPiece" class="form-control" value="{{$client->numeroPiece}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Adresse</label>
                                        <input type="text" name="adresse" class="form-control" value="{{$client->adresse}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Téléphone</label>
                                        <input type="number" name="telephone" class="form-control" value="{{$client->telephone}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{$client->email}}">
                                    </div>
                                </div>
                                <div>
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
