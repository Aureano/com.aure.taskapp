@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">




                        <h1 class="text-3xl text-black-500 mb-3 mt-10">Editer</h1>
                        <div class="alert alert-primary alert-dismissible fade show">
                            <p>Attribuer à la fois au plus un rôle et un service. Merci!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>

                        <div class="bg-white shadow-lg px-4 py-6 rounded-md">
                            <p class="text-blue-600 font-medium text-2xl mb-4">Attribuer un rôle</p>
                            <form method="POST" action="{{ route('admin.users.update',['user'=>$user]) }}">
                              @csrf
                              @method('put')
                                 @foreach ($roles as $role)
                                 <div class="flex items-start mb-6">
                                    <div class="flex items-center h-5">
                                      <input id="role" type="checkbox" value="{{ $role->id }}" name="roles[]"

                                            @if ($user->roles->contains('id',$role->id))
                                                  checked
                                            @endif
                                      class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300  dark:focus:ring-blue-600">

                                    </div>
                                    <label for="role" class="ml-2 text-sm font-medium text-gray-900">{{ $role->name === 'create' ? 'Chef Service' : $role->name }}</label>
                                </div>

                                 @endforeach
                                 <hr>
                                 <p class="text-blue-600 text-2xl font-medium mb-3">Attribuer un Service</p>



                                   @foreach ($services as $service)

                                   <div class="flex items-start mb-6">
                                        <div class="flex items-center h-5">
                                        <input id="" type="checkbox" value="{{ $service->id }}" name="services"

                                        @if($user->service_id == $service->id)
                                              checked
                                        @endif

                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300  dark:focus:ring-blue-600">

                                        </div>
                                       <label for="" class="ml-2 text-sm font-medium text-gray-900">{{ $service->nom }}</label>
                                    </div>
                                   @endforeach


                                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 rounded-md p-2">Editer</button>
                            </form>
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










