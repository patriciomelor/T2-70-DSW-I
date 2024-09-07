@extends('layouts.dash')

@section('content')
@if(isset($project))
    <p>ID del Proyecto: {{ $project->id }}</p>
@else
    <p>No se encontró el proyecto.</p>
@endif

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

        <div class="form-group form-check">
            <input type="checkbox" name="active" class="form-check-input" {{ (isset($project) && $project->active) ? 'checked' : '' }}>
            <label class="form-check-label">Activo</label>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($project) ? 'Actualizar' : 'Crear' }}</button>
    </form>
@endsection
