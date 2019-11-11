@extends('welcome')

@section('title', '| Add Role')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">ACCUEIL</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">BIENVENU</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i> Add Role</h1>
        <hr>

        {{ Form::open(array('url' => 'roles')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>Assign Permissions</b></h5>

        <div class='form-group'>
            @foreach ($permissions as $permission)
                {{ Form::checkbox('permissions[]',  $permission->id ) }}
                {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

            @endforeach
        </div>

        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

    </div>
    </section>
    </div>

@endsection