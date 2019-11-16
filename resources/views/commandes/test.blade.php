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
        <div class="col-md-5">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">

                        <h3 class="box-title">Add new products to stock</h3>
                        <a href="#addSupplyer" role="button" class="btn btn-warning btn-sm  pull-right" title="Add new supplyer" data-toggle="modal"><i class="fa fa-user-plus" ></i></a>



                        <!-- /.box-tools -->
                    </div>
                    <span class="callout text-danger"> Follow the steps to add new products.</span>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                    <p>Step 1</p>
                                </div>

                                <div class="stepwizard-step">
                                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                    <p>Step 2</p>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('commandes.store') }}" method="POST">
                                <div class="row setup-content" id="step-1">
                                <div class="">
                                    <div class="col-md-7">

                                        <table class="table table-hover">

                                                <div class="col-lg-6">
                                                        <label>Client</label>
                                                            <select class="form-control" name="id_client">
                                                                @foreach ($clients as $client)
                                                                <option value="{{$client->id}}">{{$client->telephone}}</option>
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


                                            <br>

                                        </table>
                                        <br>
                                        <button class="btn btn-primary btn-sm nextBtn pull-right" onclick="displayStep1();" type="button">Next</button>

                                    </div>
                                </div>
                            </div>

                            <div class="row setup-content" id="step-3">
                                <div class="">
                                    <div class="col-md-7">
                                        <table class="table table-hover">
                                            <tr>
                                                <td><label class="control-label">Brand:</label></td>
                                                <td> <select class="form-control select2" onchange="getBrand(this)" style="width: 100%;" ;>
                                                    <option>Select...</option>
                                                    <?php
                                                    foreach($all_published_brand as $Pvalue)
                                                    {
                                                    ?>
                                                    <option value="{{$Pvalue->ID}}">{{$Pvalue->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><label class="control-label">Product:</label></td>
                                                <td> <input id="product" type="text" required="required" class="form-control" maxlength="50px" placeholder="Enter Product" /></td>
                                            </tr>

                                            <tr>
                                                <td><label class="control-label">Style</label></td>
                                                <td> <select class="form-control select2" id="styleID" onchange="getStyle(this)" style="width: 100%;" ;>
                                                    <option value="-1">Select...</option>
                                                    <?php
                                                    foreach($all_published_style as $Pvalue)
                                                    {
                                                    ?>
                                                    <option value="{{$Pvalue->id}}">{{$Pvalue->name}}</option>
                                                    <?php } ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label class="control-label">Size:</label></td>
                                                <td> <input id="size" type="text" required="required" class="form-control" maxlength="50px" placeholder="Enter size" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="control-label">Color:</label></td>
                                                <td> <input id="color" type="text" required="required" class="form-control" maxlength="50px" placeholder="Enter color" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="control-label">Qty:</label></td>
                                                <td> <input id="qty" type="number" required="required" class="form-control" maxlength="50px" placeholder="Enter quantity" /></td>
                                            </tr>
                                            <tr>
                                                <td><label class="control-label">Per price:</label></td>
                                                <td> <input id="price" type="number" required="required" class="form-control" maxlength="50px" placeholder="Enter price" /></td>
                                            </tr>

                                            <br>

                                        </table>
                                        <br>
                                        <button class="btn btn-primary btn-md pull-left" onclick="addData();" type="button"><i class="fa fa-plus-circle"></i> Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>



                </div>
                <!-- /.box-body -->
                <!-- /.box -->
            </div>
