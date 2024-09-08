@extends('layouts.dash')

@section('content')
    <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST">
        @csrf
        @if(isset($project))
            @method('PUT')
        @endif

        <!-- Display validation errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="name">Nombre del Proyecto</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $project->name ?? old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="creation_date">Fecha de Creación</label>
            <input type="date" id="creation_date" name="creation_date" class="form-control" value="{{ $project->creation_date ?? old('creation_date') }}" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="active" name="active" class="form-check-input" {{ (isset($project) && $project->active) ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Activo</label>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($project) ? 'Actualizar' : 'Crear' }}</button>
    </form>
@endsection


