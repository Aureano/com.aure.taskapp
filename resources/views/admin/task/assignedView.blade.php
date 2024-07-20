@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                         {{ session('error') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                        </div>
                     @endif




                        <h1 class="text-3xl text-black-500 mb-3 mt-10">Attribuer une tâche</h1>

                        <div class="bg-white shadow-lg px-4 py-6 rounded-md">
                            <form action="{{ route('tasks.assign',['task'=>$task->id]) }}" method="POST">
                             @csrf
                             @method('post')
                             <div class="mb-6 form-group">
                                <label for="" class="text-xl">Nom de la tâche:</label><br><br>
                                <h1 class="text-xl font-bold">{{$task->name}}</h1>
                                <div class="divider"></div>
                             </div>
                             <div class="mb-10">
                                <label for="user_assigned_to" class="block mb-2 text-sm font-medium text-gray-900">Utilisateurs</label>
                                <select name="user_assigned_to" id="user_assigned_to" class="bg-gray-50 border border-gray-300 text-black-700 w-full rounded-lg">
                                    @foreach ($users as $user)
                                     <option value="{{ $user->id }}">{{ $user->name }}</option>
                                     @endforeach
                                </select>
                             </div>
                             <button type="submit" class=" font-medium px-4 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none rounded-lg">Attribuer</button>

                            </form>

                        </div>
                        <br>
                        <a href="/" class=" font-medium px-4 py-2 bg-blue-500 shadow-lg text-white rounded-md hover:none">Back</a>



                        <style>
                            .divider
                            {
                                width: 150px;
                                background-color: aqua;
                                height:2px;
                            }
                        </style>





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

</body>

</html>
<!-- end document-->
@endsection
