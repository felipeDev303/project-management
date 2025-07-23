
@extends('layouts.app')

@section('content')
    <h1>Proyecto: {{ $project['nombre'] }}</h1>
    <p>Fecha de inicio: {{ $project['fecha_inicio'] }}</p>
    <p>Estado: {{ $project['estado'] }}</p>
    <p>Responsable: {{ $project['responsable'] }}</p>
    <p>Monto: ${{ number_format($project['monto'], 0, ',', '.') }}</p>
    <a href="{{ route('projects.index') }}">Volver</a>
@endsection