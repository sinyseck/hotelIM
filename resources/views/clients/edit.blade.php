@extends ('welcome')
@section('title', '| Modifier Client')

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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('clients.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

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
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger">
                                            <p>{{ $message }}</p>
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
                                        <select class="form-control" name="typePiece">
                                            <option value="CIN" {{($client->typePiece === 'CIN') ? 'Selected' : ''}}>CNI</option>
                                            <option value="Passeport" {{($client->typePiece === 'Passeport') ? 'Selected' : ''}}>Passeport</option>
                                            <option value="Autre">Autres</option>
                                        </select>
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
                                    <br>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>
                                    </center>
                                </div>
                            </div>

                            </div>
                        </div>
    {!! Form::close() !!}
                </div>
        </div>

    </div>

@endsection
