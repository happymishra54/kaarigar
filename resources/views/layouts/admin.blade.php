<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.sidebar{
    min-height:100vh;
    background:#111827;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:15px;
}

.sidebar a:hover{
    background:#1f2937;
}

</style>

</head>

<body>

<div class="container-fluid">

<div class="row">

<div class="col-md-2 sidebar">

<h3 class="text-white p-3">
Kaarigar
</h3>

<a href="/admin/dashboard">
Dashboard
</a>

<a href="/admin/users">
Users
</a>

<a href="/admin/workers">
Workers
</a>

<a href="/admin/services">
Services
</a>

<a href="/admin/bookings">
Bookings
</a>

</div>

<div class="col-md-10 p-4">

@yield('content')

</div>

</div>

</div>

</body>

</html>