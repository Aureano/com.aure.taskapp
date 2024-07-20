@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-end m-2">

                                     <a href="{{ route('news.create') }}" class="p-3 bg-blue-700 rounded-md text-white font-bold"><i class="fas fa-plus mr-2"></i>Ajouter</a>
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






                        <h1 class="text-3xl text-black-500 mb-3 mt-10">Newsletter</h1>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Titre
                                        </th>
                                        <th scope="col" class="px-6 py-3" width="425">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 border border-gray-600">
                                            image
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($news as $new)
                                    <tr class="bg-white border-b green:bg-gray-900">
                                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap border border-gray-600">
                                             {{ $new->title }}
                                        </th>
                                        <td class="font-medium text-black px-6 py-4 " width="425">
                                            <div class="d-flex justify-content-center align-items-center">{{ $new->description }}</div>
                                        </td>
                                        <td class="font-medium text-black whitespace-nowrap px-6 py-4" >

                                           <img src="{{ Storage::url($new->image) }}" alt="">

                                        </td>
                                        <td scope="row" class="px-2 py-6 flex justify-around items-center border border-gray-600" width="400">
                                            <a href="{{ route('news.show',["news"=> $new->id ]) }}" class="rounded-md font-bold px-3 py-2 bg-yellow-400 text-white"><i class="fas fa-eye mr-2"></i>Voir</a>
                                            <a href="{{ route('news.edit',["news"=> $new->id ]) }}" class="font-bold bg-blue-500 px-3 py-2 text-white rounded-md hover:none"><i class="fas fa-edit mr-2"></i>Modifier</a>


                                             {{-- <button type="button" class="px-3 py-2 rounded-md font-bold bg-red-600 text-white" data-toggle="modal" data-target="#deleteModal">
                                                Supprimer
                                            </button>


                                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Êtes-vous sûr de vouloir supprimer cet utilisateur ?d
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                      <form action="{{ route('admin.users.destroy',['user'=>$items->id]) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div> --}}

                                           <form action="" method="POST"></i>
                                              @csrf
                                              @method('delete')
                                              <button type="submit" class="px-3 py-2 rounded-md font-bold bg-red-600 text-white">Supprimmer</button>
                                            </form>


                                        </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $news->links() }}
                        </div>
                        <br>
                        <a href="/" class="font-medium bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>
{{--
@forelse ( as )

@empty

@endforelse --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p class="co">Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
