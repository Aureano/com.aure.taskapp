@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-end m-2">

                                     <a href="{{ route('createEmpView') }}" class="p-3 bg-blue-700 rounded-md text-white font-bold"><i class="fas fa-plus mr-2"></i>Ajouter membre</a>
                                </div>
                            </div>
                        </div>

                        @if (session('success'))
               <div class="alert alert-primary alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
               </div>
            @endif






                        <h1 class="text-3xl text-black-500 mb-5 mt-5"> Membres du service <span class="text-blue-500">{{ Auth::user()->service->nom }}</span></h1>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center border">
                                            Nom
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center border">
                                            Email
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-center border">
                                            Poste
                                        
                                        </th>

                                        <th scope="col" class="px-6 py-3 border d-flex justify-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empLists as $empList)
                                        <tr class="bg-white border-b green:bg-gray-900 ">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">
                                                {{ $empList->name }}
                                            </th>
                                            <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                                {{ $empList->email }}
                                            </td>

                                            <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                                {{ $empList->poste }}
                                            </td>


                                            <td class="px-6 py-4 d-flex justify-around">
                                                <a href="{{ route('admin.users.show',["user"=> $empList->id]) }}" class="rounded-md font-bold px-3 py-2 bg-yellow-400 text-white"><i class="fas fa-eye mr-2"></i>Voir</a>
                                                <a href="" class="font-bold bg-blue-500 px-3 py-2 text-white rounded-md hover:none"><i class="fas fa-edit mr-2"></i>Modifier</a>




                                                 <form action="" method="POST">

                                                  @csrf
                                                  @method('delete')
                                                  <button type="submit" class="px-3 py-2 rounded-md font-bold bg-red-600 text-white ">Supprimmer</button>
                                                </form>


                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $empLists->links() }}
                        </div>
                        <br>
                        <a href="/" class="font-medium bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>


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
