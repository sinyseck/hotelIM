{{-- \resources\views\permissions\index.blade.php --}}
@extends('welcome')

@section('title', '| Permissions')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES PERMISSIONS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('permissions.create') }}" role="button" class="btn btn-primary">AJOUTER UNE PERMISSION</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" role="button" class="btn btn-primary">UTILISATEURS</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" role="button" class="btn btn-primary">RÔLES</a></li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="col-12">
            <div class="card border-danger border-0">
                <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES PERMISSIONS</div>
                     <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                            <tr>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>

                                <a href="{{ route('permissions.edit', $permission->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['permissions.destroy', $permission->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
                </div>
        </section>
    </div>
@endsection
