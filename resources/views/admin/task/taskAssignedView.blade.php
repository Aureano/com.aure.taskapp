@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="bg-white p-3 rounded-md hover:rounded-lg shadow-lg">


                            <p class="text-3xl text-black-500 font-bold mb-3 mt-10">Titre de la tâche</p>



                            <p class="text-3xl font-medium">{{ $task->name }}</p>

                            <div class="divider mb-5"></div>



                            <div class="mb-5 ">

                                <p class="text-3xl text-black-600 font-bold mb-4">Détail de la tâche</p>

                                <p class="">{{ $task->description }}</p>
                                <div class="divider mb-12"></div>
                                <p class="text-xl text-black-600 font-bold mb-12">Status: <span class="text-blue-500">{{ $task->status }}</span></p>
                                <p class="text-xl font-bold">Commentaires:</p>
                                <p class="">{{ $task->comments }}</p>

                                    <div class="text-blue-500 flex justify-end">
                                        <span>Publié par
                                            @if (Auth::User()->id == $task->user_created_by)
                                           <strong>vous</strong>
                                            @else

                                            <strong>{{ $task->name }}</strong>

                                            @endif {{ $task->created_at->diffForHumans() }}  </span>


                                    </div>

                           </div>


                            <a href="{{ route('tasks.index') }}" class="px-4 py-2.5 rounded-md shadow-md bg-red-500 hover:bg-red-600 text-white font-medium">Retour</a>


                        </div>














                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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

   <style>

    .divider
    {
        height:2px;
        background-color: rgb(175, 166, 166);
        width:100%;
    }
   </style>

</body>

</html>
<!-- end document-->
@endsection
