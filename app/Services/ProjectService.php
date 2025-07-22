<?php

namespace App\Services;

class ProjectService
{
    /*
    Un array para simular nuestra base de datos de proyectos.
    En una aplicación real, esto sería reemplazado por un modelo Eloquent que interactúa
    con la base de datos. Usamos static para simular un almacenamiento persistente.
    @var array
     */
    protected static $projects = [
        [
            'id' => 1,
            'nombre' => 'Modernización del Sistema de Gestión',
            'fecha_inicio' => '2025-07-01',
            'estado' => 'en_progreso',
            'responsable' => 'Equipo de TI',
            'monto' => 100000,
        ],
        [
            'id' => 2,
            'nombre' => 'Implementación de Nuevas Funcionalidades',
            'fecha_inicio' => '2025-08-01',
            'estado' => 'pendiente',
            'responsable' => 'Equipo de Desarrollo',
            'monto' => 150000,
        ],
        [
            'id' => 3,
            'nombre' => 'Migración a la Nube',
            'fecha_inicio' => '2025-09-01',
            'estado' => 'completado',
            'responsable' => 'Equipo de Infraestructura',
            'monto' => 200000,
        ],
        [
            'id' => 4,
            'nombre' => 'Actualización de Seguridad',
            'fecha_inicio' => '2025-10-01',
            'estado' => 'en_progreso',
            'responsable' => 'Equipo de Seguridad',
            'monto' => 75000,
        ],
        [
            'id' => 5,
            'nombre' => 'Desarrollo de Aplicación Móvil',
            'fecha_inicio' => '2025-11-01',
            'estado' => 'pendiente',
            'responsable' => 'Equipo de Desarrollo Móvil',
            'monto' => 120000,
        ],
        [
            'id' => 6,
            'nombre' => 'Optimización de Base de Datos',
            'fecha_inicio' => '2025-12-01',
            'estado' => 'en_progreso',
            'responsable' => 'Equipo de Base de Datos',
            'monto' => 90000,
        ],
        [
            'id' => 7,
            'nombre' => 'Integración de Sistemas',
            'fecha_inicio' => '2026-01-01',
            'estado' => 'pendiente',
            'responsable' => 'Equipo de Integración',
            'monto' => 110000,
        ],
        [
            'id' => 8,
            'nombre' => 'Auditoría de Sistemas',
            'fecha_inicio' => '2026-02-01',
            'estado' => 'completado',
            'responsable' => 'Equipo de Auditoría',
            'monto' => 85000,
        ],
        [
            'id' => 9,
            'nombre' => 'Capacitación del Personal',
            'fecha_inicio' => '2026-03-01',
            'estado' => 'en_progreso',
            'responsable' => 'Equipo de Capacitación',
            'monto' => 60000,
        ],
        [
            'id' => 10,
            'nombre' => 'Desarrollo de Plataforma Web',
            'fecha_inicio' => '2026-04-01',
            'estado' => 'pendiente',
            'responsable' => 'Equipo de Desarrollo Web',
            'monto' => 130000,
        ],
    ];

    /**
     * Obtiene todos los proyectos.
     *
     * @return array
     */
    public function getAllProjects(): array
    {
        return self::$projects;
    }

    /**
     * Obtiene un proyecto por su ID.
     *
     * @param int $id
     * @return array|null
     */
    public function getProjectById(int $id): ?array
    {
        foreach (self::$projects as $project) {
            if ($project['id'] === $id) {
                return $project;
            }
        }
        return null; // Retorna null si no se encuentra el proyecto
    }

    /**
     * Crea un nuevo proyecto.
     *
     * @param array $data
     * @return array
     */
    public function createProject(array $data): array
    {
        // Simulamos un ID autoincremental
        $lastId = end(self::$projects)['id'] ?? 0;
        $newProject = [
            'id' => $lastId + 1,
            'nombre' => $data['nombre'],
            'fecha_inicio' => $data['fecha_inicio'],
            'estado' => $data['estado'],
            'responsable' => $data['responsable'],
            'monto' => $data['monto'],
        ];
        self::$projects[] = $newProject;
        return $newProject;
    }

    /**
     * Actualiza un proyecto existente por su ID.
     *
     * @param int $id
     * @param array $data
     * @return array|null
     */
    public function updateProject(int $id, array $data): ?array
    {
        foreach (self::$projects as $key => $project) {
            if ($project['id'] === $id) {
                // Actualizamos los campos del proyecto con los datos proporcionados 
                self::$projects[$key] = array_merge($project, $data);
                return self::$projects[$key];
            }
        }
        return null; // Retorna null si no se encuentra el proyecto
    }

    /**
     * Elimina un proyecto por su ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteProject(int $id): bool
    {
        foreach (self::$projects as $key => $project) {
            if ($project['id'] === $id) {
                // Eliminamos el proyecto del array
                unset(self::$projects[$key]);
                // Reindexamos el array para mantener la consistencia
                self::$projects = array_values(self::$projects);
                return true;
            }
        }
        return false; // Retorna false si no se encuentra el proyecto
    }
}
