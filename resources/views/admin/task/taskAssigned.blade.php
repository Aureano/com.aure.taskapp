@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        @if (session('success'))
                        <div class="alert alert-success mb-2 alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                         @endif

                       @forelse ($tasks as $item)
                       <div class="mb-5 px-2 py-5 shadow-md hover:shadow-lg rounded border border-gray-200 bg-white">
                        <p class="mb-3 text-3xl">Nom de l'assignataire:</p>
                        <h1 class="text-3xl font-bold text-gray-800">{{ $item->name }}</h1>
                        <div class="divider mb-5"></div>
                        <p class="mb-3 text-3xl">Description de la tâche:</p>

                        <div class="text-md text-gray-800 mb-5 px-3 py-2.5 desc">{{ $item->description }}</div>

                    <div class="flex justify-between">
                        <p class="mt-2 text-3xl mb-3">Date de début: {{ $item->start_date }}</p>
                        <p class="mt-2 text-3xl">Date d'échéance: {{ $item->due_date }}</p>
                    </div>
                        <button class="p-2 rounded-md  {{ $item->colorStatus() }} text-white  mb-3 mt-3" type="submit">{{$item->status}}</button>


                          <div class="flex-column">

                            @if ($item->isActive())
                                <form action="{{ route('tasks.startTask',['task'=>$item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-400 hover:bg-green-600 px-2 py-1 text-white mt-3 font-bold rounded-md">Commencer la tâche</button>
                                </form>
                            @endif

                           </div>

                            <div class="flex-column">

                                @if ($item->status == 'en cours')
                                    <form action="{{ route('tasks.markAsTermined',['task'=>$item->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-400 hover:bg-red-600 px-2 py-1 text-white mt-3 font-bold rounded-md">Marqué comme terminée</button>
                                    </form>
                                @endif

                            </div>
                            <p class="mt-1 flex justify-end text-blue-500 font-bold">Publié {{ $item->created_at->diffForHumans() }}</p>

                           <div class="border border-black p-4 mt-2">
                            <form action="{{ route('tasks.commentTask',['task'=>$item->id]) }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="mb-6">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Votre commentaire <span class="text-blue-500">*</span></label>
                                    <textarea id="message" name="comments" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  @error('comments')   @enderror"
                                    placeholder="Laissez un commentaire"></textarea>
                                    @error('comments')
                                      <p class=" mt-2 text-sm text-red-500"><span>Oops. </span>{{ $message }}</p>
                                    @enderror

                                    <p class="mt-2 mb-4 text-sm text-blue-600 dark:text-blue-500"><span class="font-bold">*</span> indique que le champ n'est pas obligatoire</p>

                                    <button type="submit" class="text-white font-bold px-3 py-2.5 bg-red-500 hover:bg-red-800 rounded-md">Soumettre</button>

                            </form>
                           </div>


                            </div>
                        </div>


                        @empty

                        <div class="mt-12 p-5 flex justify-center items-center rounded-lg border border-warning">
                            <p class="text-blue-500 text-3xl font-medium">Aucune tâche ne vous a été attribuée pour le moment</p>
                        </div>

                       @endforelse












                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
     .divider
    {
      height:1px;
      width: 10%;
      background: aqua;

    }

    .desc
    {
        border-bottom: 1px solid aqua;
        border-top: 1px solid aqua;
    }
   </style>

</body>

</html>
<!-- end document-->
@endsection
