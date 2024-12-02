<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> --}}



    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <div class="d-flex align-items-center logoab">
                    {{-- <img src="{{ asset('images/icon/4.png') }}" alt="AppTasks" width="55px" height="50px" /> --}}
                    <h1>Task <span style="color: orange">App</span></h1>
                        </div>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="">
                                <i class="fas fa-tachometer-alt"></i>Tâche</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index2.html">Gestion des tâches </a>
                                </li>
                                <li>
                                    <a href="index.html">Tâche en cours</a>
                                </li>
                                <li>
                                    <a href="index2.html">Tâche terminée</a>
                                </li>
                            </ul>
                        </li><br>

                        <li>
                            <a href="{{ route('tasks.create') }}">
                            <i class="fas fa-table"></i>Nouvelle tache</a>
                        </li><br>
                        <li>
                            <a href="#">
                            <i class="far fa-check-square"></i>Tâches crées</a>
                        </li><br>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Mes tâches</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('tasks.MyTask') }}">Mes tâches</a>
                                </li>
                                <li>
                                    <a href="#">Tâches en cours</a>
                                </li>
                                <li>
                                    <a href="#">Tâches terminées</a>
                                </li>
                            </ul>
                            <li>
                                <a href="{{route('admin.users.index')}}">
                                <i class="fas fa-chart-bar"></i>Gestions des utilisateur </a>
                            </li><br>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <div class="d-flex align-items-center logoab">
                    {{-- <img src="{{ asset('images/icon/4.png') }}" alt="AppTasks" width="55px" height="50px" /> --}}
                    <h1 class="text-gray-700">Task <span style="color: yellow">App</span></h1>
                </div>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        @can('candReadNews')
                        <li >
                            <a class="js-arrow" href="{{ route('accueil') }}">
                                <i class="fas fa-tachometer-alt"></i>Actualités</a>
                            {{-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index2.html">Gestion des tâches </a>
                                </li>
                                <li>
                                    <a href="index.html">Tâche en cours</a>
                                </li>
                                <li>
                                    <a href="index2.html">Tâche terminée</a>
                                </li>
                            </ul> --}}
                        </li><br>
                        @endcan



                       @can('canCreateTask')
                       <li>
                        <a href="{{ route('tasks.create') }}">
                            <i class="fas fa-table"></i>Nouvelle tache</a>
                        </li><br>
                       @endcan
                        @can('canCreateTask')
                        <li>
                            <a href="{{ route('tasks.index') }}">
                            <i class="far fa-check-square"></i>Tâches crées</a>
                        </li><br>
                        @endcan

                        @can('canReceiveTasks')
                        <li class="has-sub">
                            <a class="js-arrow" href="{{ route('tasks.MyTask') }}">
                                <i class="fas fa-copy"></i>Mes Tâches</a>
                            {{-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="">Mes tâches</a>
                                </li>
                                <li>
                                    <a href="#">Tâches en cours</a>
                                </li>
                                <li>
                                    <a href="#">Tâches terminées</a>
                                </li>

                            </ul> --}}


                        </li><br>
                        @endcan

                        @can('admin')
                        <li>
                            <a href="{{route('admin.users.index')}}">
                            <i class="fas fa-chart-bar"></i>Gestions des utilisateurs </a>
                        </li><br>
                        @endcan

                        @can('admin')
                        <li>
                            <a href="{{route('news.index')}}">
                            <i class="fas fa-chart-bar"></i>Gestions Actualitées </a>
                        </li><br>
                        @endcan

                        @can('createEmployeeList')
                        <li>
                            <a href="{{ route('list') }}">
                            <i class="fas fa-chart-bar"></i>Gestion du Personnel </a>
                        </li><br>
                        @endcan
                        @can('admin')
                        <li>
                            <a href="{{ route('services.index') }}">
                            <i class="fas fa-chart-bar"></i>Gestion des services </a>
                        </li><br>
                        @endcan
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap d-flex justify-content-end">



                            <ul class="">
                                <li class="pr-5">
                                    <div class="relative">
                                        <div class="absolute left-0 top-0 bg-red-500 rounded-full">
                                            @if(Auth::user()->unreadNotifications()->count() > 0)
                                            <span class="text-sm text-white p-1">{{ Auth::user()->unreadNotifications()->count() }}</span>
                                            @endif
                                        </div>
                                        <div id="dropdownNotificationButton" class="p-2 cursor-pointer" data-dropdown-toggle="dropdownNotification">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gray-600 w-6 h-6" viewBox="0 0 16 16">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownNotification" class="hidden z-20 w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-xl dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
                                        <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                                            Notifications
                                        </div>
                                        <div class="divide-y bg-dark divide-gray-100 dark:divide-gray-700 overflow-y-scroll">
                                            @foreach (Auth::user()->unreadNotifications as $notification)
                                            <a href="{{ route('tasks.show', ['task'=>$notification->data["task_id"]]) }}" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <div class="w-full pl-3">
                                                    <span class="font-semibold text-gray-900 dark:text-white inline-block">{{ $notification->data["name"] }}</span>
                                                    <span class="font-semibold text-gray-900 dark:text-white inline-block">{{ $notification->data["message"] }}</span>
                                                    <div class="text-xs text-blue-600 dark:text-blue-500">{{ $notification->created_at->diffForHumans() }}</div>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                        <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                                            <div class="inline-flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                    <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                                </svg>
                                                View all
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>




                            <div class="header-button">


                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset('images/icon/avatar1.jpg') }}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::User()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset('images/icon/avatar1.jpg') }}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::User()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::User()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>

                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('profile.edit') }}">

                                                        <i class="zmdi zmdi-settings"></i>{{ __('Profile') }}</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-settings">Déconnexion</i></button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <style>
                .logoab
                {
                   position: relative;
                   /* border: 1px solid red; */
                }

                .logoab::before
                {
                   /* content: '';
                   position: absolute;
                   width:50px;
                   height:30px;
                   top: -14px;
                   left:-12px;
                   border-top:8px solid yellow;
                   border-left:8px solid yellow; */
                }
                .logoab::after
                {
                   /* content: '';
                   position: absolute;
                   width:50px;
                   height:30px;
                   bottom:-14px;
                   right:-12px;
                   border-bottom:8px solid rgb(68, 62, 62);
                   border-right:8px solid rgb(68, 62, 62); */
                }
            </style>
            <!-- HEADER DESKTOP-->
  @yield('content')
