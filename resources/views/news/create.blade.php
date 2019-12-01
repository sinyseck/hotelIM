@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES PLATS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('plats.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES PLATS</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{route('news.store')}}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UN PLAT</div>
                            <div class="card-body">

                                    <div class="row">
                                            <div class="col-lg-6">
                                                    <label>Nom</label>
                                                    <input type="text" name="nom" class="form-control">
                                                </div>



                                                <div class="col-lg-6">
                                                        <label>Nom</label>
                                                        <input type="text" name="nom" class="form-control">

                                                </div>

                                    </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control" value="{{$plat->nom}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Prix</label>
                                        <input type="text" name="prix" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-6">
                                                <label>Quantite</label>
                                                <input type="text" name="quantite" class="form-control">
                                            </div>


                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
            </form>
            </div>
        </div>

    </div>

@endsection

