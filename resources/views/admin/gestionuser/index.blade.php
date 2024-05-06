
@extends('partials.navbar')
@section('content')
            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tasks</h2>

                                </div>
                            </div>
                        </div>


                        <h1 class="text-3xl text-black-500 mb-3 mt-10">Listes des utilisateurs</h1>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nom
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Role
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $items)
                                        <tr class="bg-white border-b green:bg-gray-900 ">
                                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">
                                                {{ $items->name }}
                                            </th>
                                            <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                                {{ $items->email }}
                                            </td>
                                            <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                                @foreach ($items->roles as $role)
                                                     {{ $role->name }}
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="#" class="font-medium bg-blue-500 px-4 py2 text-white rounded-md hover:none">Edit</a>
                                                <a href="#" class="font-medium bg-red-500 px-6 py2 text-white rounded-md  hover:none">Remove</a>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <a href="#" class="font-medium bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>




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



</body>

</html>
<!-- end document-->
@endsection

