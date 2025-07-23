@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Poryectos</h1>
        @if (!empty($projects))
        <ul>
            @foreach ($projects as $project)
                <li>
                    <strong>{{ $project['nombre'] }}</strong>
                    - Estado: {{ $project['estado'] }} |
                    Responsable: {{ $project['responsable'] }}
                    <a href="{{ route('projects.show', $project['id']) }}">Ver</a>
                    <a href=" {{ route('projects.edit', $project['id']) }} ">Editar</a>
                    <form action="{{ route('projects.destroy', $project['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>

                    </form>
                </li>
            @endforeach
        </ul>
        @else
            <p>No hay proyectos disponibles.</p>
        @endif
        <a href="{{ route('projects.create') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
            Crear nuevo proyecto
        </a>

@endsection