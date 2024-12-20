@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">



                     <div class="rounded-lg shadow-md bg-white p-7">
                        <h1 class="text-2xl text-blue-500 mb-3 mt-10">Editer un service</h1>
                        <form action="{{route('services.update',['service'=>$service->id])}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Service</label>
                                <input type="text" value="{{ $service->nom }}" name="nom" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" placeholder="Entrez un nom de service..">
                                @error('nom')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                 <label for="description" class="block mb-2 text-sm text-gray-700 font-medium ">Description</label>
                                 <input type="text" value="{{ $service->description }}" name="description" class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue p-2.5" placeholder="Décrivez ici le service...">
                                @error('description')
                                 <p class="mt-2 text-sm text-red-600"><span>Oops!</span>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="chef" class="block mb-2 text-sm text-gray-700 font-medium ">Chef</label>
                                <input type="text" value="{{ $service->chef }}" name="chef" class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue p-2.5" placeholder="Décrivez ici le service...">
                               @error('chef')
                                <p class="mt-2 text-sm text-red-600"><span>Oops!</span>{{ $message }}</p>
                               @enderror
                           </div>

                            <button type="submit" class="px-3 py-2 rounded-md bg-blue-700 text-white">Envoyer</button>
                        </form>
                     </div>














                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p class="co">Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div> --}}
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
    .co
    {
      background: rgb(196, 236, 136);
      width: auto;
      padding: 4px;
    }
   </style>

</body>

</html>
<!-- end document-->
@endsection
