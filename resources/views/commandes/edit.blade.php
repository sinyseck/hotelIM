@extends ('welcome')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-info">GESTION DES COMMANDES</h1>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($commande, ['method'=>'PATCH','route'=>['commandes.update', $commande->id]]) !!}
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
                                        <th>#</th>
                                        <th>Plat</th>
                                        <th>prix</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plats as $plat)
                                        <tr>
                                            <td class="id">{{ $plat->id }}</td>
                                            <td class="name"> {{ $plat->nom }}</td>
                                            <td class="prix">{{ $plat->prix }} FCFA</td>
                                            <td><button type="button"  class="btn btn-success addRow">AJOUTER</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Plat</th>
                                        <th>Quantite</th>
                                        <th>prix</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="conteneur">
                                    @foreach($commande->detailCommandes as $key=>$detailCommande)
                                        <tr>
                                            <td><input type='hidden' value="{{ $detailCommande->plat->id }}" name='plats[]' required><input value="{{ $detailCommande->plat->nom }}" class='form-control'  readonly></td>
                                            <td><input type='number' value="{{$detailCommande->quantite}}" name='quantite[]' class='form-control' min='1' required> </td>
                                            <td><input type='text' value="{{$detailCommande->plat->prix}}" class='form-control' readonly></td>
                                           <td><button type='button' class='btn btn-danger remove-tr'>Supprimer</button></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-12">
                                <center>
                                    <button type="submit" class="btn btn-success btn btn-lg "> Valider</button>
                                </center>
                            </div>



                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        $(".btn-submit").click(function(e){



            e.preventDefault();



            var client_id = $("input[name=client_id]").val();

            var plat_id = $("input[name=password]").val();

            var quantite = $("input[name=quantite]").val();



            $.ajax({

                type:'POST',

                url:'/ajaxRequest',

                data:{name:name, password:password, email:email},

                success:function(data){

                    alert(data.success);

                }

            });



        });

    </script>
    <script>
        $(document).ready(function () {
            $(".addRow").click(function() {
                //find content of different elements inside a row.
                var nameTxt = $(this).closest('tr').find('.name').text();
                var id = $(this).closest('tr').find('.id').text();
                var prix =$(this).closest('tr').find('.prix').text();
                // var emailTxt = $(this).closest('tr').find('.email').text();
                //assign above variables text1,text2 values to other elements.
                /*$("#name").val( nameTxt );
                 $("#email").val( emailTxt );*/
                $(".conteneur").append("<tr> <td><input type='hidden' value="+id+" name='plats[]' required><input value="+nameTxt+" class='form-control'  readonly></td>"+
                "<td><input type='number' name='quantite[]' class='form-control' min='1' required> </td>"+
                "<td><input type='text' value="+prix+" class='form-control' readonly> </td><"+
                "<td><button type='button' class='btn btn-danger remove-tr'>Supprimer</button></td>");
                //alert(nameTxt);
            });
        });
        $(document).on('click', '.remove-tr', function(){
            $(this).parents('tr').remove();
        });
    </script>

@endsection
