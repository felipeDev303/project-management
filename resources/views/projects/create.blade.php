
@extends('layouts.app')

@section('content')
    <h1>Crear Proyecto</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="date" name="fecha_inicio" required>
        <input type="text" name="estado" placeholder="Estado" required>
        <input type="text" name="responsable" placeholder="Responsable" required>
        <input type="number" name="monto" placeholder="Monto" required>
        <button type="submit">Guardar</button>
    </form>
@endsection