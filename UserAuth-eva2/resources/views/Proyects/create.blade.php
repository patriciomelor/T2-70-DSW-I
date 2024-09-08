@extends('layouts.dash')

@section('content')
    <form action="{{ isset($project) ? route('proyects.update', $project->id) : route('proyects.store') }}" method="POST">

    <!-- <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST"> -->
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
