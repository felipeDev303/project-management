<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Models\Project;
class ProjectController extends Controller
{
    protected $projectService;

    //Desde aqui inicializamos el servicio de proyectos inyectamos en el constructor
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }
    public function get()
    {
        return response()->json($this->projectService->getAllProjects());
    }
    //Listar todos los proyectos
    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return view('projects.index', compact('projects'));
    }
    //form para crear los proyectos solo lo mostramos
    public function create()
    {
        return view('projects.create');
    }
    //Guardar un proyecto
    public function store(Request $request)
    {

        $project = $this->projectService->createProject($request->all());
        return redirect()->route('projects.show', $project['id'])
            ->with('success', 'Proyecto creado exitosamente.');
    }
    //mostrar por ID
    public function show($id)
    {
        $project = $this->projectService->getProjectById((int)$id);
        if (!$project) {
            abort(404);
        }
        return view('projects.show', compact('project'));
    }
    //mostrar el formulario de edicion
    public function edit($id)
    {
        $project = $this->projectService->getProjectById($id);
        return view('projects.edit', compact('project'));
    }
    //update de un proyecto
    public function update(Request $request, $id)
    {

        $project = $this->projectService->updateProject($id, $request->all());
        return redirect()->route('projects.show', $id);
    }

    //eliminar un proyecto
    public function destroy($id)
    {
        $this->projectService->deleteProject($id);
        return redirect()->route('projects.index');
    }
}