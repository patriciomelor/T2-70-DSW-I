@extends('layouts.dash')

@section('content')
  <div class="lockscreen-logo">
    <a href="{{ url('/') }}"><b>Admin</b>LTE</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- Lock screen image -->
    <div class="lockscreen-image">
      <!-- Consider replacing ion-icon with a more widely supported icon or ensuring you have the ion-icon library loaded -->
      <ion-icon name="person-circle-outline" style="color:grey!important;font-size: 64px;"></ion-icon>
    </div>
    <!-- /.lockscreen-image -->

    <!-- Lock screen credentials (contains the form) -->
    <form class="lockscreen-credentials" onsubmit="validatePassword(event)">
      <div class="input-group">
        <input type="password" id="password" class="form-control" placeholder="Password" required>

        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
  </div>
  <div class="help-block text-center">
    Ingresa la contraseña para validar sesión...
  </div>
  <div class="text-center">
    <a href="{{ route('login') }}" id="change-session">o ingresa una sesión diferente</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright © 2024 <b><a href="https://adminlte.io" class="text-black">AdminLTE.io por Equipo Linces</a></b><br>
    para IPSS
  </div>
@endsection


