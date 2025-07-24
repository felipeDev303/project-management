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
                'name' => 'Modernización del Sistema ERP',
                'start_date' => '2025-01-15',
                'status' => 'en_progreso',
                'responsible' => 'Ana García - Líder Técnico',
                'monto' => 125000.00,
            ],
            [
                'name' => 'Desarrollo de App Mobile',
                'start_date' => '2025-02-01',
                'status' => 'pendiente',
                'responsible' => 'Carlos Rodriguez - Full Stack Developer',
                'monto' => 80000.50,
            ],
            [
                'name' => 'Migración a la Nube (AWS)',
                'start_date' => '2024-12-01',
                'status' => 'completado',
                'responsible' => 'María Fernández - DevOps Engineer',
                'monto' => 200000.00,
            ],
            [
                'name' => 'Sistema de Gestión de Inventarios',
                'start_date' => '2025-03-01',
                'status' => 'pendiente',
                'responsible' => 'Jorge Morales - Backend Developer',
                'monto' => 95000.25,
            ],
            [
                'name' => 'Portal de Autoservicio para Clientes',
                'start_date' => '2025-01-20',
                'status' => 'en_progreso',
                'responsible' => 'Laura Jiménez - Frontend Lead',
                'monto' => 150000.75,
            ],
            [
                'name' => 'Integración con APIs de Terceros',
                'start_date' => '2024-11-15',
                'status' => 'completado',
                'responsible' => 'Pedro Sánchez - Integration Specialist',
                'monto' => 60000.00,
            ],
            [
                'name' => 'Sistema de Reporting y Analytics',
                'start_date' => '2025-04-01',
                'status' => 'pendiente',
                'responsible' => 'Sandra López - Data Analyst',
                'monto' => 110000.30,
            ],
            [
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
