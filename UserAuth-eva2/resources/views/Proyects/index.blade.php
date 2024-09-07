@extends('layouts.dash')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proyectos</h1>
        </div>
        <div class="col-sm-6">
   
        </div>
      </div>
    </div><!-- /.container-fluid -->
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
    <a href="{{ route('proyects.create') }}" class="btn btn-primary">Crear Proyecto</a>
            </div>

   <div class="card-body table-responsive content-loader">
            <table id="users-table" class="table table-striped table-light  table-hover table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de Creación</th>
                <th>Usuario</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->creation_date }}</td>
                    <td>{{ $project->user->name ?? 'No disponible' }}</td>

                    <td>{{ $project->active ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('proyects.edit', $project->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proyects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   </div></div>
@endsection
