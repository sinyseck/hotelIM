<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>FACTURE RESTAURANT</title>
  <style>
    @include('PDF.style')
  </style>
</head>
<body>
<header class="clearfix">
  <div id="logo">
    {{--<img src="logo.png">--}}
  </div>

  <div id="company" class="clearfix" style="padding-right: 50px;">

    <div>Hello dummy name<br> Trading LLC</div>
    <div>Bashundhara 40, Road 7/C, sector 9
    </div>
    <div>Bashundhara, Dhaka</div>

    {{--<div><a href="mailto:company@example.com">company@example.com</a></div>--}}
  </div>


</header>

<hr>


<div id="project" >
  <div style="font-size: 15px;">Bill To:</div><br>
  <div style="font-size: 15px;"> Supplier: </div>
  <span>
      <div> seck</div>
      <div>siny</div>
      </span>
</div>

      <table style="padding-top: 100px;">
        <thead>
        <tr>
                                <th>SL</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Quantite</th>
                                <th>TOTAL</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($detailCommandes as $key=>$detailCommande)
                            <tr>
                                <td>{{++$key}} </td>
                                <td>{{$detailCommande->plat->nom}} </td>
                                <td>{{$detailCommande->plat->prix}} </td>
                                <td>{{ $detailCommande->quantite}} </td>
                                <td class="total"> {{$detailCommande->quantite*$detailCommande->plat->prix}}</td>

                            </tr>
                        @endforeach



        </tbody>
      </table>
      <br>
      <div id="notices" style="float: left">
        <div class="notice">________________</div>
        <div>Authorise signature</div>
      </div>

      <div style="float: right; padding-right: 50px">
        <div class="notice">__________________</div>
        <div>Manager signature</div>
      </div>

</body>
</html>
