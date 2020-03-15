{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Create Permission')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-info">GESTION DES PERMISSIONS</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES PERMISSIONS</a></li>

                            </ol>
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.container-fluid -->

        <!-- /.content-header -->

        <!-- Main content -->
        {{ Form::open(array('url' => 'permissions')) }}
        @csrf
                <div class="card border-danger border-0">
                    <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UNE PERMISSION</div>
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
                            {{ Form::label('name', 'Nom de la permission') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div><br>
                        @if(!$roles->isEmpty()) <!-- //If no roles exist yet-->
                        <h4>Attribuer des rôles</h4>

                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                        @endforeach
                        @endif
                        <div>
                            <center>
                                <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                            </center>
                        </div>
                        {{ Form::close() }}

    </div>
                </div>
            </div>
    </div>
@endsection
