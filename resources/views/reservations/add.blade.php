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
                    <li class="breadcrumb-item active"><a href="{{ route('reservations.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES RÉSERVATIONS</a></li>

                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
         <div class="card border-danger border-0">
                    <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UNE RÉSERVATION</div>
                        <div class="card-body">

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                           {{--<div class="form-group">
                                {{ Form::label('date_arrivee', 'Date Debut') }}
                                {{ Form::datetime-local('date_arrivee',\Carbon\Carbon::now(), array('class' => 'form-control','required' => 'true')) }}
                            </div>--}}
                        <div class="row">
                        <div class="col-lg-6">
                            <label>Date Début</label>
                           <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="datetime-local" name="date_arrivee" class="form-control" displayFormat="dd-MM-yyyy hh:mm">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Date Fin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="datetime-local" name="date_depart" class="form-control" displayFormat="dd-MM-yyyy hh:mm">
                            </div>
                           {{-- <div class="form-group">
                                {{ Form::label('date_depart', 'Date Fin') }}
                                {{ Form::datetime('date_depart', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>--}}
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::label('nbre_personne', 'Nombre de Personnes') }}
                                {{ Form::number('nbre_personne', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>
                           {{-- <div class="form-group">
                                {{ Form::label('statut', 'Statut') }}
                                {{ Form::text('statut', '', array('class' => 'form-control','required' => 'true')) }}

                            </div>--}}

                            <input type="hidden" value="neant" name="statut">
                            <div class="col-lg-6">
                                {!! Form::Label('item', 'Paiement') !!}
                                <select class="form-control" name="etat_paiement" required="">
                                    <option value="">Choisir</option>
                                        <option value="1">payé</option>
                                    <option value="0"> non payé</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::Label('item', 'Client') !!}
                                <select class="form-control" name="client_id">
                                    <option value="">Choisir</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->nom}} {{$client->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                {!! Form::Label('item', 'Tarif') !!}
                                <select class="form-control" name="tarif_id">
                                    <option value="">Choisir</option>
                                    @foreach($tarifs as $tarif)
                                        <option value="{{$tarif->id}}">{{$tarif->nbre_personne}} personnes {{$tarif->prix}} cfa</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class='form-group'>
                                @foreach ($chambres as $chambre)
                                    {{ Form::checkbox('chambres[]',  $chambre->id ) }}
                                     Chambre {{ Form::label($chambre->numero, ucfirst($chambre->numero)) }}<br>

                                @endforeach
                            </div>
                            <div>
                                <br>
                                <center>
                                    <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
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
