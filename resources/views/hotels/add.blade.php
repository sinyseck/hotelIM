@extends('welcome')

@section('title', '| Create New Produit')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Hotel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Enegister Hotel</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <h1>Enrgistrer un Hotel</h1>
                        <hr>

                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('url' => 'hotels','enctype'=>'multipart/form-data')) }}

                        <div class="form-group">
                            {{ Form::label('nom', 'Nom') }}
                            {{ Form::text('nom', null, array('class' => 'form-control','required'=>'true')) }}
                            <br>

                            {{ Form::label('telephone', 'Téléphone') }}
                            {{ Form::text('telephone', null, array('class' => 'form-control','required'=>'true')) }}
                            <br>
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control','required'=>'true')) }}
                            <br>
                            {{ Form::label('adrese', 'Adresse') }}
                            {{ Form::email('adresse', null, array('class' => 'form-control','required'=>'true')) }}
                            <br>
                            {{ Form::label('logo', 'Logo') }}
                            {{ Form::file('logo', null, array('class' => 'form-control','required'=>'true')) }}
                            <br>
                            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection