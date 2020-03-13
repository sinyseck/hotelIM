{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Créer Tarif')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Enregistrer une tarif</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Enregistrer Tarif</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class='fa fa-plus'></i> Ajouter Tarif</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
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
                        <div class='col-lg-4 offset-md-4'>

                            {{ Form::open(array('url' => 'tarifs')) }}

                            <div class="form-group">
                                {{ Form::label('prix', 'Prix') }}
                                {{ Form::number('prix', '', array('class' => 'form-control','required' => 'true')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('nbre_personne', 'Nombre de personne') }}
                                {{ Form::number('nbre_personne', '', array('class' => 'form-control','required' => 'true')) }}
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