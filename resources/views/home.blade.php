@extends ('welcome')
@section('title', '| Tableau de bord')

@section('calendar')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">TABLEAU DE BORD</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Accueil</a></li> -->
                            <li class="breadcrumb-item active">Logiciel de gestion hotelière et de restauration</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Chiffre d'affaires du jour</span>
                <span class="info-box-number">
                 {{$chiffreAffaireDuJour}}
                  <small>CFA</small>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Chiffre d'affaires de la semaine</span>
                                <span class="info-box-number">{{$chiffreAffaireDuSemaine}}<small>CFA</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Chiffre d'affaires du mois</span>
                                <span class="info-box-number">{{$chiffreAffaireDuMois}}<small>CFA</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  {{--  <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Members</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->--}}
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3></div>
                            <div class="card-body">
                        <canvas id="myChart" width="300" height="200"></canvas>
                                </div>
                            </div>
                    </div >
                    <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3></div>
                                <div class="card-body">
                        <canvas id="myPieChart" width="300" height="200"></canvas>
                                    </div>
                    </div>
                        </div>
                    <script>
                        var label = [];
                        var donnee = [];
                        var coloR = [];
                        var dynamicColors = function() {
                            var r = Math.floor(Math.random() * 255);
                            var g = Math.floor(Math.random() * 255);
                            var b = Math.floor(Math.random() * 255);
                            var e = 1;
                            return "rgba(" + r + "," + g + "," + b + ","+e + ")";
                        };
                    $(document).ready(function() {
                        @foreach($plats as $plat)
                            label.push('{{$plat->nom}}');
                            donnee.push({{$plat->total_sales}});
                        coloR.push(dynamicColors());
                        @endforeach
                         var ctx = document.getElementById('myChart');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: label,
                                datasets: [{
                                    label: 'Nombre de plat vendus',
                                    data: donnee,
                                    backgroundColor: coloR,
                                    borderColor: coloR,

                                    borderWidth: 1
                                }]
                            },

                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        data = {
                            datasets: [{
                                data: donnee,
                                backgroundColor: coloR,
                                borderColor: coloR
                            }],

                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: label
                        };
                        var ctx1 = document.getElementById('myPieChart');
                        var myPieChart = new Chart(ctx1, {
                            type: 'pie',
                            data: data

                        });
                    });

                    </script>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Caliendrier Réservation</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id='calendar'></div>
                            </div>
                            <div class="card-footer">

                            </div>
                    </div>
                </div>

            </div>
                </div><!-- /.card -->
        </section>
        <!-- right col -->
    </div>

@endsection
@section('script')

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale-all.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                // put your options and callbacks here
                locale: 'fr',
                events : [
                    @foreach($reservations as $reserver)

                    {
                        @foreach($reserver->chambres as $chambre)
                        title : 'chambre N°'+'{{ $chambre->numero }}' +' {{  $reserver->client->prenom }}' +' {{  $reserver->client->nom }}',
                        @endforeach
                        start : '{{ $reserver->date_arrivee }}',
                        end: '{{$reserver->date_depart }}',
                        url : '{{ route('reservations.show', $reserver->id) }}'
                    },

                    @endforeach
                ]
            })
        });

    </script>
@endsection
