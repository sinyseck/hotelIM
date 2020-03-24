{{-- \resources\views\roles\index.blade.php --}}
@extends('welcome')

@section('title', '| Rôles')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-info">GESTION DES RÔLES</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('roles.create') }}" role="button" class="btn btn-primary">AJOUTER UN RÔLE</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}" role="button" class="btn btn-primary">UTILISATEURS</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" role="button" class="btn btn-primary">PERMISSIONS</a></li>
                                    </ol>
                                </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="col-12">
            <div class="card border-danger border-0">
                <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES RÔLES</div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Rôles</th>
                                    <th>Permissions</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                <tbody>
                @foreach ($roles as $role)
                    <tr>

                        <td>{{ $role->name }}</td>

                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                        <td>
                                <a href="{{ route('roles.edit', $role->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['roles.destroy', $role->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
