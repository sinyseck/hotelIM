@extends ('welcome')

@section('title', '| Enregistrer Plat')

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
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('plats.index') }}" role="button" class="btn btn-primary">LISTE D'ENREGISTREMENT DES PLATS</a></li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('plats.store') }}" method="POST">
                @csrf
                <div class="card border-danger border-0">

                    <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UN PLAT</div>
                    <div class="card-body">
                  <!--  <table class="table table-bordered">-->



                            <div class="row">


                                <div class="col-lg-6">
                                    <label>Plat</label>
                                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Prix</label>
                                    <input type="text" name="prix" class="form-control" min="1" value="{{ old('prix') }}" required/>
                                </div>

                                <div class="col-lg-6">
                                    <br>
                                    <h4>Affecter Produit</h4>
                                    @foreach ($produits as $produit)
                                        {{ Form::checkbox('produits[]',  $produit->id ) }}
                                        Produit {{ Form::label($produit->nom, ucfirst($produit->nom)) }}<br>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER </button>
                                    </center>
                                </div>
                            </div>
                            {{--    <script type="text/javascript">

                                    $('.addRow').on('click',function(){
                                        addRow();
                                    });
                                    function addRow()
                                    {
                                        var tr='<tr>'+
                                                '<td><input type="text" name="nom[]" class="form-control" required=""></td>'+
                                                '<td><input type="text" name="prix[]" class="form-control"></td>'+
                                                '<td><input type="text" name="quantite[]" class="form-control" required=""></td>'+
                                                '<td>@foreach ($produits as $produit){{ Form::checkbox('produits[]',  $produit->id ) }}Produit {{ Form::label($produit->nom, ucfirst($produit->nom)) }}<br> @endforeach</td>'+
                                                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>'+
                                                '</tr>';
                                        $('tbody').append(tr);
                                    };
                                    $(document).on('click', '.remove-tr', function(){
                                        $(this).parents('tr').remove();
                                    });
                                </script>
    --}}
                        </div>



                </div>

            </form>
        </div>
    </div>



@endsection

