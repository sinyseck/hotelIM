@extends('welcome')

@section('title', '| View Produit')

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

        <h1>{{ $produit->nom }}</h1>
        <hr>
        <p class="lead">{{ $produit->quantite }} </p>
        <p class="lead">{{ $produit->pu }} </p>
        <hr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['produits.destroy', $produit->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        @can('Edit Produit')
        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-info" role="button">Edit</a>
        @endcan
        @can('Delete Produit')
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        @endcan
        {!! Form::close() !!}

    </div>
        </section>
    </div>


@endsection