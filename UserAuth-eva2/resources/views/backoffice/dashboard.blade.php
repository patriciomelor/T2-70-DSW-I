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

@endsection