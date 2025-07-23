
@extends('layouts.app')

@section('content')
    <h1>Editar Proyecto</h1>
    <form action="{{ route('projects.update', $project['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $project['nombre'] }}" required>
        <input type="date" name="fecha_inicio" value="{{ $project['fecha_inicio'] }}" required>
        <input type="text" name="estado" value="{{ $project['estado'] }}" required>
        <input type="text" name="responsable" value="{{ $project['responsable'] }}" required>
        <input type="number" name="monto" value="{{ $project['monto'] }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection