{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Enregistrer chambre')

@section('content')
<div class="content-wrapper">

    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">GESTION DES RÉSERVATIONS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('reservations.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        @csrf
         <div class="card border-danger border-0">
                    <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION RÉSERVATION</div>
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

                            {!! Form::model($reservation, ['method'=>'PATCH','route'=>['reservations.update', $reservation->id]]) !!}

                            {{--<div class="form-group">
                                 {{ Form::label('date_arrivee', 'Date Debut') }}
                             </div>--}}
                        <div class="row">
                            <div class="col-lg-6">
                            <label>Date Début</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="datetime-local" autocomplete="on" value="{{Carbon\Carbon::parse( $reservation->date_arrivee )->format('Y-m-d\TH:i') }}" name="date_arrivee" class="form-control" required autofocus>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <label>Date Fin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="datetime-local" name="date_depart" value="{{Carbon\Carbon::parse($reservation->date_depart)->format('Y-m-d\TH:i') }}" class="form-control"  autocomplete="on" required autofocus>
                            </div>
                            </div>
                        </div>
                            {{-- <div class="form-group">
                                 {{ Form::label('date_depart', 'Date Fin') }}
                                 {{ Form::datetime('date_depart', '', array('class' => 'form-control','required' => 'true')) }}
                             </div>--}}
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::label('nbre_personne', 'Nombre de Personne') }}
                                {{ Form::number('nbre_personne', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="col-lg-6">
                                {{ Form::label('statut', 'Statut') }}
                                {{ Form::text('statut', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::Label('item', 'Paiement') !!}
                                <select class="form-control" name="etat_paiement" required="">
                                    <option value="">Choisir</option>
                                    <option value="1">payé</option>
                                    <option value="0"> non payé</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                {!! Form::Label('item', 'Client') !!}
                                <select class="form-control" name="client_id">
                                    <option value="">Choisir</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->nom}} {{$client->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="form-group">
                                {!! Form::Label('item', 'Tarif') !!}
                                <select class="form-control" name="tarif_id">
                                    <option value="">Choisir</option>
                                    @foreach($tarifs as $tarif)
                                        <option value="{{$tarif->id}}">{{$tarif->nbre_personne}} personnes {{$tarif->prix}} cfa</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='form-group'>
                                @foreach ($chambres as $chambre)
                                    {{ Form::checkbox('chambres[]',  $chambre->id, $reservation->chambres) }}
                                    Chambre {{ Form::label($chambre->numero, ucfirst($chambre->numero)) }}<br>

                                @endforeach
                            </div>

                            <div>
                                <br>
                                <center>
                                    <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </section>
    </div>
@endsection
