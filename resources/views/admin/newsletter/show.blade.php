@extends('partials.navbar')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

           <div class="rounded-lg shadow-lg bg-white p-7">
            <h1 class="text-3xl text-black-500 mb-3 mt-10">Vue sur une news</h1>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                     <label for="" class="text-xl text-gray-700 font-medium mb-1">Nom</label><br>
                     <p class="mb-2 text-blue-500">{{ $news->title }}</p>
                     <hr>
                     <label for="" class="text-xl text-gray-700 font-medium mb-1">Description</label><br>
                     <p>{{ $news->description }}</p><br>
                     <p class="text-orange-600 font-medium mb-2">Publié {{ $news->created_at->diffForHumans() }}</p>
                     <a href="{{ route('accueil') }}" class="btn btn-warning">Retour</a>
                    </div>
                    <div class="col-lg-6 p-0">
                          <img src="{{ Storage::url($news->image) }}" alt="" style="width: 100%;object-fit:cover; height:385px">
                    </div>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>
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


</body>

</html>
<!-- end document-->
@endsection
