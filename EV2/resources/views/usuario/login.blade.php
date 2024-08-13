<!-- VISTA DE INICIO DE SESIÓN -->
!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <h1>Inicio de sesión</h1>

    <!-- Errores -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif

    <form action="{{Route('usuario.validar')}}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Ingrese email"><br>
        <input type="password" name="password" placeholder="Ingrese contraseña"><br>
        <button type="submit">Ingresar</button>
    </form>
    <hr>
    <a href="{{Route('usuario.registrar')}}">Crear nuevo usuario</a>
</body>

</html>