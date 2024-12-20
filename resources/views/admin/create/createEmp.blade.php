@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">



                     <div class="rounded-lg shadow-md bg-white p-7">
                        <h1 class="text-2xl text-blue-500 mb-3 mt-10">Ajouter un membre</h1>
                        <form action="{{ route('createEmp') }}" method="POST">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" value="" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5" placeholder="Entrez un nom">
                                @error('name')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{$message}} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="block mb-2 text-sm text-gray-700 font-medium">Email</label>
                                <input type="text" value="" name="email" id="email" class="rounded-lg p-2.5 bg-white border border-gray-300 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500 w-full " placeholder="Entrez un email">
                                @error('email')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{$message}} </p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="password" class="form-label">Mot de passe</label>
                                 <input type="password" value="" name="password" id="password" class="form-control" placeholder="Entrez un mot de passe">
                                @error('password')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{$message}} </p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="poste" class="form-label">Poste</label>
                                 <input type="text" value="" name="poste" id="poste" class="form-control" placeholder="Poste occupé...">
                                @error('poste')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{$message}} </p>
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

    .modal
    {
    z-index: 1050 !important;
    }

.modal-backdrop {
    z-index: 1040 !important;
}

.modal-dialog {
    z-index: 1060 !important;
}
   </style>

</body>

</html>
<!-- end document-->
@endsection
