<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function get(){
        dd('Get method called');
    }
    public function index()
    {
        return view('projects.index'); 
    }
    public function create()
    {
        return view('projects.create'); 
    }
    public function store(Request $request)
    {
        return redirect()->route('projects.index')->with('success', 'Proyecto creado exitosamente.');
    }
    public function show($id)
    {
        return view('projects.show', ['id' => $id]); 
    }
    public function edit($id)
    {
        return view('projects.edit', ['id' => $id]); 
    }
    public function update(Request $request, $id)
    {
        return redirect()->route('projects.show', $id)->with('success', 'Proyecto actualizado exitosamente.');
    }
    public function destroy($id)
    {
        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Aquí puedes implementar la lógica de búsqueda
        return view('projects.search', ['query' => $query]); // Ajusta la vista según tu necesidad
    }
    
}
