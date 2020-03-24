<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <script src="{!! asset('assets/plugins/jquery/jquery.min.js') !!}"></script>
    <link rel="stylesheet" href="{!! asset('assets/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/jqvmap/jqvmap.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('assets/dist/css/adminlte.min.css') !!}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/daterangepicker/daterangepicker.css') !!}">
    <!-- summernote -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/summernote/summernote-bs4.css') !!}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

    <script src=https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json></script>

    @yield('calendar')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link">TABLEAU DE BORD</a>
            </li>


            {{-- <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> --}}
        </ul>

        <!-- SEARCH FORM -->
        {{-- <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="rechercher" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form> --}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li> --}}


            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                    {{ __('QUITTER') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{ asset('assets//dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">IM HOTEL</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Tableau de bord
                            </p>
                        </a>

                    </li>
                    <li class="nav-header">HOTEL</li>

                            @role('SuperAdmin')

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-hotel"></i>

                            <p>
                                Paramètres de l'hôtel
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('hotels.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter hôtel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('hotels.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des hôtels</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                            @endhasrole
                            @role('Administre')

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-hotel"></i>

                                    <p>
                                        Paramètres de l'hôtel
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right"></span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('mon.hotel') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mon hôtel</p>
                                </a>
                            </li>
                                </ul>
                            </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-bed"></i>

                            <p>
                                Gestion des chambres
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('chambres.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter chambre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('chambres.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des chambres</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>

                            <p>
                                Gestion des clients
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('clients.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter client</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('clients.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des clients</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>

                            <p>
                                Gestion des réservations
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('reservations.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter réservation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reservations.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des réservations</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-donate"></i>

                            <p>
                                Gestion des tarifs
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tarifs.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter tarif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tarifs.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des tarifs</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">RESTAURANT</li>

                    {{--  <li class="nav-item">
                          <a href="" class="nav-link">
                              <i class="nav-icon fas fa-dolly"></i>

                              <p>
                                  Stock
                                  <i class="fas fa-angle-left right"></i>
                                  <span class="badge badge-info right"></span>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{route('produits.create')}}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Ajouter</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('produits.index') }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>lister</p>
                                  </a>
                              </li>
                          </ul>
                      </li>--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-dolly"></i>
                            <p>
                                Gestion des entrées
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('entreeStocks.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nouvelle entrée</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('entreeStocks.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des entrées</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chair"></i>
                            <p>
                                Gestion des tables
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tables.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer une table</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tables.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des tables</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Gestion des commandes
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('commandes.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer une commande</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('commandes.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des commandes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>
                                Gestion des plats
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plats.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer un plat</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plats.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des plats</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Gestion des produits
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('produits.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer un produit</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('produits.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des produits</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                            @endhasrole


                    @role('Caissier')
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-bed"></i>

                            <p>
                                Gestion des chambres
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('chambres.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter chambre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('chambres.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des chambres</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>

                            <p>
                                Gestion des clients
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('clients.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter client</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('clients.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des clients</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>

                            <p>
                                Gestion des réservations
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('reservations.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter réservation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reservations.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des réservations</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-donate"></i>

                            <p>
                                Gestion des tarifs
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tarifs.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter tarif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tarifs.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des tarifs</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endhasrole
                    @role('restauratrice')
                    <li class="nav-header">RESTAURANT</li>

                  {{--  <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-dolly"></i>

                            <p>
                                Stock
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('produits.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('produits.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>lister</p>
                                </a>
                            </li>
                        </ul>
                    </li>--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-dolly"></i>
                            <p>
                                Gestion des entrées
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('entreeStocks.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nouvelle entrée</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('entreeStocks.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des entrées</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chair"></i>
                            <p>
                                Gestion des tables
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tables.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer une table</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tables.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des tables</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Gestion des commandes
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('commandes.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer une commande</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('commandes.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des commandes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>
                                Gestion des plats
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plats.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer un plat</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('plats.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des plats</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Gestion des produits
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('produits.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Enregistrer un produit</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('produits.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste des produits</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endhasrole
                    @role('Administre')
                    <li class="nav-header">ADMINISTRATION</li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="nav-icon far fa-users"></i>
                            <p>
                                Gestion des utilisateurs
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                    @endhasrole
                    @role('SuperAdmin')
                    <li class="nav-header">ADMINISTRATION</li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="nav-icon far fa-users"></i>
                            <p>
                                Gestion des utilisateurs
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('permissions.index')}}" class="nav-link">
                            <i class="nav-icon far fa-key"></i>
                            <p>
                                Gestion des permissions
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="nav-icon far fa-key"></i>
                            <p>
                                Gestion des rôles
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                    @endhasrole
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    @yield('content')

    <!-- Content Wrapper. Contains page content -->
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <!-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> -->
        <strong>Copyright &copy; 2019-2020 | <a href="">Logiciel de gestion hotelière et de restauration</a> | </strong>

        Tous droits réservés.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 00.0.2020
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="{!! asset('assets/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{!! asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! asset('assets/plugins/chart.js/Chart.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('assets/plugins/sparklines/sparkline.js') !!}"></script>
<!-- JQVMap -->
<script src="{!! asset('assets/plugins/jqvmap/jquery.vmap.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('assets/plugins/jquery-knob/jquery.knob.min.js') !!}"></script>
<!-- daterangepicker -->
<script src="{!! asset('assets/plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{!! asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
<!-- Summernote -->
<script src="{!! asset('assets/plugins/summernote/summernote-bs4.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('assets/dist/js/adminlte.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('assets/dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('assets/dist/js/demo.js') !!}"></script>


<!-- DataTables -->
<script src="{!! asset('assets/plugins/datatables/jquery.dataTables.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
            }
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
@yield('script')
</body>
</html>
