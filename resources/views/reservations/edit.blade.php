{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Enregistrer chambre')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Modifier Reservation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Modifier reservation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class='fa fa-plus'></i> Modifier Reservation</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class='col-lg-4 offset-md-4'>

                            {!! Form::model($reservation, ['method'=>'PATCH','route'=>['reservations.update', $reservation->id]]) !!}

                            {{--<div class="form-group">
                                 {{ Form::label('date_arrivee', 'Date Debut') }}
                                 {{ Form::datetime-local('date_arrivee',\Carbon\Carbon::now(), array('class' => 'form-control','required' => 'true')) }}
                             </div>--}}
                            <label>Date Début</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="datetime-local" value="{{ $reservation->date_arrivee }}" name="date_arrivee" class="form-control" displayFormat="dd-MM-yyyy hh:mm">
                            </div>
                            <label>Date Fin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="datetime-local" name="date_depart" value="{{ $reservation->date_depart }}" class="form-control" displayFormat="dd-MM-yyyy hh:mm">
                            </div>
                            {{-- <div class="form-group">
                                 {{ Form::label('date_depart', 'Date Fin') }}
                                 {{ Form::datetime('date_depart', '', array('class' => 'form-control','required' => 'true')) }}
                             </div>--}}
                            <div class="form-group">
                                {{ Form::label('nbre_personne', 'Nombre de Personne') }}
                                {{ Form::number('nbre_personne', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('statut', 'Statut') }}
                                {{ Form::text('statut', null, array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {!! Form::Label('item', 'Paiement:') !!}
                                <select class="form-control" name="etat_paiement" required="">
                                    <option value="">Choisir</option>
                                    <option value="1">payé</option>
                                    <option value="0"> non payé</option>
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('item', 'Client:') !!}
                                <select class="form-control" name="client_id">
                                    <option value="">Choisir</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->nom}} {{$client->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('item', 'Item:') !!}
                                <select class="form-control" name="tarif_id">
                                    <option value="">Choisir</option>
                                    @foreach($tarifs as $tarif)
                                        <option value="{{$tarif->id}}">{{$tarif->nbre_personne}} personnes {{$tarif->prix}} cfa</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='form-group'>
                                @foreach ($chambres as $chambre)
                                    {{ Form::checkbox('chambres[]',  $chambre->id ) }}
                                    Chambre {{ Form::label($chambre->numero, ucfirst($chambre->numero)) }}<br>

                                @endforeach
                            </div>

                            {{ Form::submit('Enregitrer', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
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