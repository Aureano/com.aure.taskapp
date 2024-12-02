@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">




                        <h1 class="text-3xl text-black-500 mb-3 mt-10">Informations du service</h1>

                        <div class="bg-white shadow-lg px-4 py-6 rounded-md mb-1">
                           <div class="form-group">
                            <label for="">Service</label><br><br>
                            {{$service->nom}}
                            <div class="divider">

                            </div>
                           </div>
                           <div class="form-group">
                            <label for="">Description</label><br><br>
                            {{ $service->description }}
                            <div class="divider">

                            </div>
                           </div>
                           <div class="form-group">
                            <label for="">Chef</label><br><br>
                           {{$service->chef}}
                            <div class="divider">

                            </div>
                           </div><br>


                        </div>








                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>



    <script src="{{ asset('vendor/Chart/dist/chart.umd.js') }}"></script>
    <script src="{{ asset('js/charts.js') }}" defer></script>

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










