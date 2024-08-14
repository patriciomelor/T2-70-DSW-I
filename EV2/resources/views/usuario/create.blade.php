<!-- VISTA DE REGISTRO DE NUEVO USUARIO -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>

<body>
    <h1>Crear nuevo usuario</h1>

    <!-- Errores -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif

    <form action="{{Route('usuario.registrar')}}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Ingrese su nombre y apellido"><br>
        <input type="text" name="email" placeholder="Ingrese su email"><br>
        <input type="password" name="password" placeholder="Ingrese la contraseña"><br>
        <input type="password" name="rePassword" placeholder="Ingrese nuevamente la contraseña"><br>
        <input type="password" name="dayCode" placeholder="Ingrese el código del día"><br>
        <button type="submit">Crear</button>
    </form>
    <hr>
    <a href="/login">Iniciar sesión</a>
</body>

</html>