<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Lista de proyectos (para vistas web)
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'status' => 'required|in:pendiente,en_progreso,completado',
            'responsible' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $project = Project::create($validatedData);

        // Si es petición AJAX, devolver JSON
        if ($request->expectsJson()) {
            return response()->json($project, 201);
        }

        // Si es formulario web, redirigir
        return redirect()->route('projects.show', $project->id)
            ->with('success', 'Proyecto creado exitosamente.');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'status' => 'required|in:pendiente,en_progreso,completado',
            'responsible' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $project->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json($project);
        }

        return redirect()->route('projects.show', $id)
            ->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto eliminado exitosamente.');
    }

    // API Methods (return JSON)
    
    // 2. Controlador para obtener los proyectos
    public function api_index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    // 1. Controlador para crear un proyecto
    public function api_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'status' => 'required|in:pendiente,en_progreso,completado',
            'responsible' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $project = Project::create($validated);
        return response()->json($project, 201);
    }

    // 5. Controlador para obtener un proyecto por id
    public function api_show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    // 3. Controlador para actualizar un proyecto por id
    public function api_update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'status' => 'required|in:pendiente,en_progreso,completado',
            'responsible' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $project->update($validated);
        return response()->json($project);
    }

    // 4. Controlador para eliminar un proyecto por id
    public function api_destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Proyecto eliminado correctamente'], 200);
    }
}