@extends('welcome')

@section('title', '| Modifier Rôle')

@section('content')
<div class="content-wrapper">

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
                    <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

        @csrf
        <div class="card border-danger border-0">
                   <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION RÔLE</div>
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
        @foreach ($permissions as $permission)

            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
        <div>
            <center>
                <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER </button>
            </center>
        </div>
    </div>
</div>
{!! Form::close() !!}
</div>
</div>

</div>

@endsection
