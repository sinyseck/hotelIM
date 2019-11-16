{{-- \resources\views\users\index.blade.php --}}
@extends('welcome')

@section('title', '| Users')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES UTILISATEURS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('users.create') }}" role="button" class="btn btn-primary">AJOUTER UN UTILISATEUR</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" role="button" class="btn btn-primary">RÔLES</a></li>
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
                <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES UTILISATEURS</div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date/Time Added</th>
                                    <th>User Roles</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>

                                <tbody>
                                @foreach ($users as $user)
                                    <tr>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                        <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                        <td>


                                            <a href="{{ route('users.edit', $user->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
            </div>
        </section>
    </div>
@endsection
