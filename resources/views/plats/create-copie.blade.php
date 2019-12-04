@extends ('welcome')

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
</script>



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
        <form action="{{ route('plats.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                    <table class="table table-bordered">

                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UN PLAT</div>
                            <div class="card-body">

                                    <div class="row">
                                            <div class="col-lg-6">
                                                <label>Client</label>
                                                    <select class="form-control" name="id_client">
                                                        @foreach ($clients as $client)
                                                        <option value="{{$client->id}}">{{$client->prenom}} {{$client->nom}} {{$client->telephone}}</option>
                                                        @endforeach

                                                    </select>
                                            </div>



                                            <div class="col-lg-6">
                                                <label>Table</label>
                                                <select class="form-control" name="id_table">
                                                    @foreach ($tables as $table)
                                                    <option value="{{$table->id}}">{{$table->numero}}</option>
                                                        @endforeach

                                                </select>
                                            </div>

                                    </div>
                                    <table class="table table-bordered">
                                        <thead>

                                        <tr>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Quantite</th>
                                            <th>Produit</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                    </tbody>
                                        <tr>
                                            <td><input type="text" name="nom[]" class="form-control"/></td>
                                            <td><input type="text" name="prix[]" class="form-control"/></td>
                                            <td><input type="text" name="quantite[]" class="form-control"/></td>
                                            <td>
                                                    @foreach ($produits as $produit)
                                                    {{ Form::checkbox('produits[]',  $produit->id ) }}
                                                    Produit {{ Form::label($produit->nom, ucfirst($produit->nom)) }}<br>
                                                @endforeach
                                            </td>

                                            <td><button type="button" class="btn btn-success addRow">AJOUTER</button></td>

                                        </tr>
                                    </tbody>
                    </table>
                                        <button type="submit" class="btn btn-success">Save</button>


                                <script type="text/javascript">

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




                            </div>
                        </div>
            </form>
            </div>
        </div>

    </div>

@endsection

