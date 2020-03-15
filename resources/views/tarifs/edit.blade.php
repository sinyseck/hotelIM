{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Créer Tarif')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES TARIFS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('tarifs.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES TARIFS</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($tarif, ['method'=>'PATCH','route'=>['tarifs.update', $tarif->id]]) !!}

            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION DES TARIFS</div>
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
                                        <label>Prix</label>
                                    <input type="text" name="prix" class="form-control" value="{{$tarif->prix}}"  min="1" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Nombre de personnes</label>
                                    <input type="text" name="nbre_personne" class="form-control" value="{{$tarif->nbre_personne}}"  min="1" required>
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
