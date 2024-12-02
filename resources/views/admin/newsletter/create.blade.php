@extends('partials.navbar')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

           <div class="rounded-lg shadow-lg bg-white p-7">
            <h1 class="text-3xl text-black-500 mb-3 mt-10">Ajouter une <span class="text-blue-600">actualité</span></h1>
            <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" value="" name="nom" id="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 w-full p-2.5" placeholder="Entrez un nom">
                    @error('name')
                    <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{$message}} </p>
                    @enderror
                </div>
               <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" cols="30" rows="6" class="text-sm p-2.5 rounded-lg border border-gray-300 text-gray-900 bg-white focus:ring-orange-500 focus:border-orange-500 w-full" placeholder="Entrez une description de la news">

                </textarea>
                @error('description')
                   <p class="mt-2 text-sm text-red-600"><span>Oops!</span>{{ $message }}</p>
                @enderror
               </div>
                <div class="mb-5 form-group" >
                     <label for="image" class="form-label block mb-2 text-sm font-medium text-gray-700">Choisir une image</label>
                     <input type="file" name="image" id="image" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none py-2">
                    @error('image')
                    <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{$message}} </p>
                    @enderror
                </div>

                <button type="submit" class="px-3 py-2 rounded-md bg-blue-500 hover:bg-blue-800 text-white">Envoyer</button>
            </form>
           </div>
        </div>
    </div>
</div>
</div>








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


</body>

</html>
<!-- end document-->
@endsection
