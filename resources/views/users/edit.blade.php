{{-- \resources\views\users\edit.blade.php --}}

@extends('welcome')

@section('title', '| Modifier Utilisateur')

@section('content')
<div class="content-wrapper">

    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">GESTION DES UTILISATEURS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES UTILISATEURS</a></li>

                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        @csrf
         <div class="card border-danger border-0">
                    <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION UTILISATEUR</div>
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


                        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::label('name', 'Nom Utilisateur') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="col-lg-6">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                        <h5><b>Rôles</b></h5>

                        <div class='form-group'>
                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach
                        </div>
                    <div class="row">

                        <div class="col-lg-6">
                            {{ Form::label('password', 'Mot de passe') }}<br>
                            {{ Form::password('password', array('class' => 'form-control')) }}

                        </div>

                        <div class="col-lg-6">
                            {{ Form::label('password', 'Confirmation Mot de Passe') }}<br>
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                        </div>
                    </div>
                        <div class='form-group'>
                            {{ Form::label('hotel_id', 'Hôtel') }}<br>
                            {{--{{ Form::select('hotel_id', $hotels, null, ['class' => 'form-control']) }}--}}
                            {!! Form::select('hotel_id', $hotels, null, ['class' => 'form-control']) !!}
                        </div>

                        <div>
                            <center>
                                <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER </button>
                            </center>
                        </div>
                    </div>
                </div>
    </div>
    </div>
@endsection
