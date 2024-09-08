@extends('layouts.dash')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ isset($role) ? 'Editar Proyecto' : 'Crear Proyecto' }}</h1>
                @if(isset($project))
                    <p>ID del Proyecto: {{ $project->id }}</p>
                @else
                    <p>No se encontró el proyecto.</p>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
<form action="{{ route('proyects.update', ['proyect' => $project->id]) }}" method="POST">


@csrf
        @if(isset($project))
            @method('PUT')
        @endif

        <div class="form-group">
            <label>Nombre del Proyecto</label>
            <input type="text" name="name" class="form-control" value="{{ $project->name ?? old('name') }}">
        </div>

        <div class="form-group">
            <label>Fecha de Creación</label>
            <input type="date" name="creation_date" class="form-control" value="{{ $project->creation_date ?? old('creation_date') }}">
        </div>

        <div class="form-group">
            <label for="active">Estado Activo:</label>
            <input type="checkbox" name="active" id="active" {{ $project->active ? 'checked' : '' }}>
        </div>
        

        <button type="submit" class="btn btn-success">{{ isset($project) ? 'Actualizar' : 'Crear' }}</button>
    </form>
                    </div></div></div></div></div></div>
@endsection
