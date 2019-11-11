@extends('welcome')
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
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Produits</h3></div>
                    <div class="panel-heading">Page {{ $produits->currentPage() }} of {{ $produits->lastPage() }}</div>
                    <div class="table-responsive">
                        <div class="panel-body">
                        <table class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Quantite</th>
                                <th>PU</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>{{$produit->nom}}</td>
                            <td>{{$produit->quantite}}</td>
                            <td>{{$produit->pu}}</td>

                           <td>
                                <a href="{{ route('produits.show', $produit->id ) }}">
                                   Voir
                                </a>
                           </td>
                     </tr>
                    @endforeach
                            </tbody>
                            </table>
                        </div>
                </div>
                <div class="text-center">
                    {{ $produits->links() }}
                </div>
            </div>
        </div>
    </div>
                </div>
        </section>
    </div>

@endsection