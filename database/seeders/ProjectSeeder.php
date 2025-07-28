<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'id' => 1,
                'name' => 'Sistema de Gestión de Inventario',
                'start_date' => '2024-01-15',
                'status' => 'en_progreso',
                'responsible' => 'Juan Pérez',
                'monto' => 50000.00,
            ],
            [
                'id' => 2,
                'name' => 'Aplicación Móvil de Ventas',
                'start_date' => '2024-02-01',
                'status' => 'pendiente',
                'responsible' => 'María González',
                'monto' => 75000.00,
            ],
            [
                'id' => 3,
                'name' => 'Portal Web Corporativo',
                'start_date' => '2023-12-10',
                'status' => 'completado',
                'responsible' => 'Carlos Rodríguez',
                'monto' => 30000.00,
            ],
            [
                'id' => 4,
                'name' => 'Sistema de Facturación Electrónica',
                'start_date' => '2024-03-01',
                'status' => 'pendiente',
                'responsible' => 'Ana López',
                'monto' => 120000.00,
            ],
            [
                'id' => 5,
                'name' => 'Plataforma de E-learning',
                'start_date' => '2024-01-20',
                'status' => 'en_progreso',
                'responsible' => 'Pedro Martínez',
                'monto' => 85000.00,
            ],
            [
                'id' => 6,
                'name' => 'Sistema de CRM Empresarial',
                'start_date' => '2024-04-15',
                'status' => 'pendiente',
                'responsible' => 'Laura Fernández',
                'monto' => 110000.30,
            ],
            [
                'id' => 7,
                'name' => 'Actualización de Seguridad y Compliance',
                'start_date' => '2025-01-10',
                'status' => 'en_progreso',
                'responsible' => 'Roberto Castro - Security Engineer',
                'monto' => 85000.90,
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
