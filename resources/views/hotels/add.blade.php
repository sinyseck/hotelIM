@extends('welcome')

@section('title', '| Create New Produit')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-info">GESTION DES HÔTELS</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('hotels.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES HÔTELS</a></li>

                            </ol>
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
        <!-- /.content-header -->

        <!-- Main content -->
        {{ Form::open(array('url' => 'hotels','enctype'=>'multipart/form-data')) }}
         @csrf
                 <div class="card border-danger border-0">
                            <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UN NOUVEAU HÔTEL</div>
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
                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        <div class="row">
                            <div class="col-lg-6">
                            {{ Form::label('nom', 'Nom') }}
                            {{ Form::text('nom', null, array('class' => 'form-control','required'=>'true')) }}
                            </div>
                            <div class="col-lg-6">
                            {{ Form::label('telephone', 'Téléphone') }}
                            {{ Form::text('telephone', null, array('class' => 'form-control','required'=>'true')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control','required'=>'true')) }}
                            </div>
                            <div class="col-lg-6">
                            {{ Form::label('adrese', 'Adresse') }}
                            {{ Form::text('adresse', null, array('class' => 'form-control','required'=>'true')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            {{ Form::label('logo', 'Logo') }} <br>
                            {{ Form::file('logo', null, array('class' => 'form-control','required'=>'true')) }}
                            </div>
                        </div>
                        <div>
                            <center>
                                <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                            </center>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection
