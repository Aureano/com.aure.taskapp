@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

            @if (session('success'))
               <div class="alert alert-primary alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
               </div>
            @endif


            <h1 class="text-3xl text-black-500 mb-3 mt-10">Tâches Crées</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Commentaires
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr class="bg-white border-b white:bg-gray-900 ">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                {{ $task->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">

                                {{ $task->description }}

                            </th>

                            <td class="px-6 py-4">
                              <span class="badge text-white {{ $task->colorStatus() }}">{{ $task->status }}</span>
                            </td>
                            <td class="">
                                {{-- <a href="#" class="font-medium bg-blue-500 px-2 py-2 text-white rounded-md"> </a> --}}
                                <div class="d-flex justify-content-center align-items-center">{{ $task->comments }}</div>
                            </td>
                            <td width="350" class="py-4 d-flex justify-around">
                                @if ($task->statusOn())
                                <a href="{{ route('tasks.assignedView',['task'=>$task->id]) }}" class="font-medium bg-green-500 px-2 py-2 text-white rounded-md">Attribuer</a>
                                @endif
                                {{-- <a href="{{ route('tasks.destroy',['task'=>$task->id]) }}" class="font-medium bg-red-500 px-2 py2 text-white rounded-md  hover:underline">Remove</a> --}}
                                <a href="{{ route('tasks.show',['task'=>$task->id]) }}" class="font-medium bg-yellow-500 px-2 py-2 text-white rounded-md"><i class="fas fa-eye mr-2"></i>Voir</a>
                                <a href="{{ route('tasks.edit',['task'=>$task->id]) }}" class="font-medium bg-blue-500 px-2 py-2 text-white rounded-md"><i class="fas fa-edit mr-2"></i>Editer</a>

                                <form action="{{ route('tasks.destroy',['task'=>$task->id]) }}" method="POST"></i>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-1 py-2 rounded-md font-bold bg-red-600 text-white">Supprimmer</button>
                                </form>

                            </td>
                        </tr>

                        @empty
                        <div class="mt-12 p-5 flex justify-center items-center rounded-lg border border-warning">
                            <p class="text-blue-500 text-3xl font-medium">Aucune tâche créée pour le moment</p>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- <div class="mt-4">
                {{ $tasks->links() }}
            </div> --}}
            <br>
            <a href="#" class="font-medium bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>








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
   </style>

</body>

</html>
<!-- end document-->
@endsection
