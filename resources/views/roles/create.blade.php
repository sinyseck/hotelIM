@extends('welcome')

@section('title', '| Add Role')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-info">GESTION DES RÔLES</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES RÔLES</a></li>

                            </ol>
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
        <!-- /.content-header -->

        <!-- Main content -->
        {{ Form::open(array('url' => 'roles')) }}
            @csrf
                <div class="card border-danger border-0">
                    <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UN NOUVEAU RÔLE</div>
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
                            <div class="form-group">
                                {{ Form::label('name', 'Nom du rôle') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>

                            <h5><b>Attribuer des autorisations</b></h5>

                            <div class='form-group'>
                                @foreach ($permissions as $permission)
                                    {{ Form::checkbox('permissions[]',  $permission->id ) }}
                                    {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                                @endforeach
                            </div>

                            <div>
                                <center>
                                    <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER </button>
                                </center>
                            </div>
                        </div>
                </div>
        {{ Form::close() }}

        </div>

    </div>


@endsection
