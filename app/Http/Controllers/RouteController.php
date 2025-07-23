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
        return view('projects.index'); // Ajusta la vista según tu necesidad
    }
}
