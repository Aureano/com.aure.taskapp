{{-- @dd(Auth::User()->isCreate()); --}}

@php
use Illuminate\Support\Str;
@endphp
@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid ">

                        <div class="alert alert-primary alert-dismissible fade show">
                            <p>Bienvenue  {{ Auth::user()->name }} du service {{ Auth::user()->service->nom }} !</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        @if (session('success'))
                        <div class="alert alert-primary alert-dismissible fade show">
                         {{ session('success') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                        </div>
                     @endif

                       <div class="row">


                        @forelse ($news as $new)
                            <div class="col-lg-4 com mb-5">
                                <div class="bg-white co p-2 hover:scale-110 duration-500 ease-in-out hover:shadow-lg">
                                   <div class="mb-2">
                                    <img src="{{ Storage::url($new->image) }}" class="rounded-lg">
                                   </div>
                                    <div class="mb-2 px-2">{{ Str::limit($new->description, 95 , '...') }}</div>

                                        <div class="flex justify-around items-center">
                                            <p class="text-sm text-blue-600 ">Publié {{$new->created_at->diffForHumans()}}</p>

                                            <a href="{{ route('news.show',["news"=>$new->id]) }}" class="infoplus btn btn-info">Voir<i class="fas fa-plus ml-2"></i></a>

                                        </div>

                                </div>
                             </div>

                             @empty
                            <div class="container p-10 d-flex justify-content-center align-items-center rounded-lg border border-warning">
                                <h1 class="text-3xl text-blue-600">Aucune News pour le moment</h1>
                            </div>
                        @endforelse

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
   <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

   <!-- Main JS-->
   <script src="{{ asset('js/main.js') }}"></script>



   <style>
      .co
      {

           cursor: pointer;
           border-radius: 8px;

      }
      img{
        width: 100%;
        height: 240px;
      }

   </style>

</body>

</html>
<!-- end document-->
@endsection
