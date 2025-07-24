<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    /**
     * Obtener todos los proyectos como JSON (API).
     */
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    /**
     * Mostrar el formulario para crear un nuevo proyecto.
     */
    public function create()
    {
        return view('projects.create');
    }
    /**
     * Almacenar un nuevo proyecto.
     */
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
        return response()->json($project, 201);
    }
    /**
     * Mostrar un proyecto específico.
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    /**
     * Mostrar el formulario para editar un proyecto.
     */

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }
    /**
     * Actualizar un proyecto existente.
     */
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
        return response()->json($project);
    }
    /**
     * Eliminar un proyecto.
     */
    public function destroy($id) 
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(null, 204);
    }   
}