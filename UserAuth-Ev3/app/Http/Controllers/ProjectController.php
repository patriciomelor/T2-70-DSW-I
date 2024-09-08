<?php

namespace App\Http\Controllers;
use App\Models\Project; 
use Illuminate\Http\Request;

class ProjectController extends Controller
{
        // Listar todos los proyectos
        public function index()
        {
            $proyects = Project::with('user')->get();
            return view('proyects.index', compact('proyects'));
        }
    
        // Mostrar formulario de creación
        public function create()
        {
            return view('proyects.create');
        }
    
        // Guardar nuevo proyecto
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'creation_date' => 'required|date',
            ]);
    
            Project::create([
                'name' => $request->name,
                'creation_date' => $request->creation_date,
                'user_id' => auth()->id(),
                'active' => $request->has('active'),
            ]);
    
            return redirect()->route('proyects.index');
        }
    
        // Editar un proyecto existente
        public function edit($id)
        {
            $project = Project::findOrFail($id);
            return view('proyects.edit', compact('project'));
        }

                
    
        public function update(Request $request, Project $project)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'creation_date' => 'required|date',
                // Puedes agregar validación para 'active' si es necesario
            ]);
        
            // Actualizar el proyecto con nuevos valores
            $project->update([
                'name' => $request->name,
                'creation_date' => $request->creation_date,
                'active' => $request->has('active'),  // Esto devolverá true si 'active' está marcado, false si no
            ]);
        
            // Redireccionar al usuario con un mensaje de éxito
            return redirect()->route('proyects.index')->with('success', 'Proyecto actualizado exitosamente.');
        }
        
    
        // Eliminar un proyecto
        public function destroy(Project $project)
        {
            $project->delete();
            return redirect()->route('proyects.index');
        }
    }
    
