@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">




                        <h1 class="text-3xl text-black-500 mb-3 mt-10">Informations de l'utilisateur</h1>

                        <div class="bg-white shadow-lg px-4 py-6 rounded-md mb-1">
                           <div class="form-group">
                            <label for="">Nom courant de l'utilisateur:</label><br><br>
                            {{$user->name}}
                            <div class="divider">

                            </div>
                           </div>
                           <div class="form-group">
                            <label for="">Email courant de l'utilisateur:</label><br><br>
                            {{$user->email}}
                            <div class="divider">

                            </div>
                           </div>
                           <div class="form-group">
                            <label for="">Rôle de l'utilisateur:</label><br><br>
                           @foreach ($user->roles as $role)
                               {{ $role->name }}
                           @endforeach
                            <div class="divider ">

                            </div>
                           </div><br>

                           <div class="container-fluid p-0 d-flex justify-content-center">

                            <div class="col-lg-6 p-0">
                                <h1 class="text-xl text-blue-600 font-medium">En fonction {{ $user->created_at->diffForHumans() }} au service {{ $user->service->nom }}</h1>
                            </div>
                            <div class="socials__links d-flex gap-2 align-items-center col-lg-6 p-0">
                                <i class="fab fa-whatsapp-square" style="color: green; font-size: 30px"></i>+229 95530395
                            </div>

                           </div>
                        </div>

                        <div class="bg-white shadow-lg rounded-lg px-4 container">
                         <div class="row">
                            <div class="col-lg-6 d-flex flex-column justify-content-center border border-right-warning">
                                <h2 class="text-2xl text-blue-500 mb-3">Stastiques</h2>
                                <p>Visionnez ici les stats de l'employé {{ $user->name  }}</p>
                            </div>

                             <div class="col-lg-6">
                                <canvas id="myPieChart" width="230" height="290"></canvas>
                             </div>
                         </div>
                        </div>






                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


    <script src="{{ asset('vendor/Chart/dist/chart.umd.js') }}"></script>
    <script src="{{ asset('js/charts.js') }}"></script>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}">
    </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>

<style>

.divider
{

  width: 160px;
  height: 2px;
  background: #ffa500;
}
</style>
<!-- end document-->
@endsection










