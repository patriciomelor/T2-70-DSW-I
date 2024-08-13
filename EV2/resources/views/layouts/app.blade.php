<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- adminLTE CSS -->
     <link rel="stylesheet" href="{{asst('dist/css/adminlte.min.css') }}=>
     <!--  Font Awesonme--> NO LO MUESTRA COMO COMENTARIO
      <link rel="stylesheet" href="{{ asset('plugin/fontawesome-free/css/all.min.css') }}">
      <!-- Custom CSS -->
       @yield('css')

</head>
<body> class="hold-transition sidebar-mini sidebar-collapse layout-fixed" >
<div> class="wrapper">
    <!-- Navbar-->
     @include('partials.navbar')
     <!-- Sidebar-->
      @include('partials.sidebar')
      

</div>



</body>
</html>