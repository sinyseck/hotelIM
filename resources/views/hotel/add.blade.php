@extends ('welcome')
@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION CHAMBRE</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('chambre_liste') }}" role="button" class="btn btn-primary">LISTE DES CHAMBRES</a></li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="post">
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UNE CHAMBRE</div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="nom" value="" class="form-control" placeholder="NOM CLIENT">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="nom" class="form-control" placeholder="NOM CLIENT">
                                    </div>
                                </div>


                                <center>
                                    <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                </center>

                            </div>
                    </div>
            </form>
        </div>

    </div>

@endsection
