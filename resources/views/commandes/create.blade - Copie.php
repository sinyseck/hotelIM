@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-info">GESTION DES PRODUITS</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('produits.index') }}" role="button" class="btn btn-primary">LISTE DES PRODUITS</a></li>

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
            <form action="{{ route('commandes.store') }}" method="POST">
                @csrf
                <div class="card border-danger border-0">
                    <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UNE COMMANDE</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Client</label>
                                <select class="form-control" name="client_id" required="">
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->prenom}} {{$client->nom}} {{$client->telephone}}</option>
                                    @endforeach

                                </select>
                            </div>



                            <div class="col-lg-6">
                                <label>Table</label>
                                <select class="form-control" name="table_id">
                                    @foreach ($tables as $table)
                                        <option value="{{$table->id}}">{{$table->numero}}</option>
                                    @endforeach

                                </select>
                                <br>
                            </div>
                            <br>
                            <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <thead>

                                    <tr>
                                        <th>Plat</th>
                                        <th>prix</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    {{--  <tbody>
                                      <tr>


                                          <td>
                                              @foreach ($plats as $plat)
                                                  {{ Form::checkbox('plats[]',  $plat->id ) }}
                                                  Produit {{ Form::label($plat->nom, ucfirst($plat->nom)) }}<br>
                                              @endforeach
                                          </td>
                                          <td><input type="text" name="quantite[]" class="form-control"/></td>

                                          <td><button type="button" class="btn btn-success addRow">AJOUTER</button></td>

                                      </tr>
                                      </tbody>--}}
                                    <tbody>
                                    @foreach($plats as $plat)
                                        <tr>
                                            <td>{{ $plat->nom }}</td>
                                            <td>{{ $plat->prix }} FCFA</td>
                                            <td><button type="button" class="btn btn-success addRow">AJOUTER</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-lg-6">
                                </div>
                                {{--<button type="submit" class="btn btn-success">Save</button>--}}

                                {{--

                                                                <script type="text/javascript">

                                                                    $('.addRow').on('click',function(){
                                                                        addRow();
                                                                    });
                                                                    function addRow()
                                                                    {
                                                                        var tr='<tr>'+
                                                                                '<td>@foreach ($plats as $plat){{ Form::checkbox('plats[]',  $plat->id ) }}Produit {{ Form::label($plat->nom, ucfirst($plat->nom)) }}<br> @endforeach</td>'+
                                                                                '<td><input type="text" name="quantite[]" class="form-control" required=""></td>'+
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

                            <div>
                                <center>
                                    <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                </center>
                            </div>


                        </div>
                    </div>
                    </div>
            </form>
        </div>
    </div>



@endsection
