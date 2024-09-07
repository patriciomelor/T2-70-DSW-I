@extends('layouts.dash')

@section('content')
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
    <ion-icon name="person-circle-outline" style="color:grey!important;font-size: 64px;"></ion-icon>
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" onsubmit="validatePassword(event)">
      <div class="input-group">
        <input type="password" id="password" class="form-control" placeholder="password">

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
  </div>
  <div class="help-block text-center">
    Ingresa la contraseña para validar sesion...
  </div>
  <div class="text-center">
    <a href="{{ route('login') }}" id="change-session">o ingresa una sesión diferente</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright © 2024 <b><a href="https://adminlte.io" class="text-black">AdminLTE.io por Equipo Linces </a></b><br>
    para IPSS
  </div>

  <script>
    function validatePassword(event) {
      event.preventDefault();
      const passwordInput = document.getElementById('password').value;

      if (passwordInput === '') {
        alert('Por favor, ingresa una contraseña');
        return;
      }

      // Enviar solicitud AJAX al servidor para validar la contraseña
      fetch('{{ route("validate.password") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          password: passwordInput
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.valid) {
          alert('Contraseña validada, sesión correcta.');
          // Redirigir al dashboard o realizar otra acción
        } else {
          alert('Contraseña incorrecta. Inténtalo de nuevo.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al validar la contraseña. Inténtalo de nuevo más tarde.');
      });
    }

    document.getElementById('change-session').addEventListener('click', function(event) {
      event.preventDefault();
      window.location.href = '{{ route("login") }}'; // Redirige al login
    });
  </script>
@endsection