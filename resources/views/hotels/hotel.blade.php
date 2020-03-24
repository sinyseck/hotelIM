@extends('welcome')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES HÔTELS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                            <li class="breadcrumb-item active"><a href="" role="button" class="btn btn-primary">Mon Hôtel</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="col-12">
            <div class="card border-danger border-0">
                <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES HÔTELS</div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                        <tr>
                            <th>logo</th>
                            <th>Nom</th>
                            <th>adresse</th>
                            <th>téléphone</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="{{asset('public/image/'. $hotel->logo)}}" class="avatar avatar-16 img-circle" style="width: 50px; height: 50px"> </td>
                                <td>{{$hotel->nom}}</td>
                                <td>{{$hotel->adresse}}</td>
                                <td>{{$hotel->telephone}}</td>
                                <td>{{$hotel->email}}</td>

                                {{-- <td>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['hotels.destroy', $hotel->id], 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }" ]) !!}
                                    <a href="{{ URL::to('hotels/'.$hotel->id.'/edit') }}" class="btn btn-primary" ><i class="far fa-edit"></i></a>
                                    <button class="btn btn-danger border-left-0 border" type="submit">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td> --}}

                                <td>
                                    <a href="{{ route('hotels.edit', $hotel->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    {!! Form::close() !!}

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center">

                </div>
            </div>

        </div>
        <div class="card-footer">

        </div>
    </div>


@endsection
