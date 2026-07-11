<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<div class="container-fluid">


    <div class="row min-vh-100">


        {{-- SIDEBAR --}}

        <div class="col-md-2 bg-dark p-0">


            <h3 class="text-white p-3 mb-0">

                Kaarigar

            </h3>



            <div class="nav flex-column">


                <a href="/admin/dashboard"
                   class="nav-link text-white px-3 py-3">

                    Dashboard

                </a>



                <a href="/admin/users"
                   class="nav-link text-white px-3 py-3">

                    Users

                </a>




                <a href="/admin/workers"
                   class="nav-link text-white px-3 py-3">

                    Workers

                </a>




                <a href="/admin/services"
                   class="nav-link text-white px-3 py-3">

                    Services

                </a>




                <a href="/admin/bookings"
                   class="nav-link text-white px-3 py-3">

                    Bookings

                </a>



            </div>


        </div>






        {{-- CONTENT --}}


        <div class="col-md-10 p-4">


            @yield('content')


        </div>



    </div>


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>