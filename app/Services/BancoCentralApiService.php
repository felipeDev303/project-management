<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BancoCentralApiService
{
    protected string $baseUrl = 'https://si3.bcentral.cl/SieteRestWS/SieteRestWS.ashx';
    protected ?string $user;
    protected ?string $pass;

    // El código de la serie es:
    const UF_SERIES_ID = 'F073.UFF.PRE.Z.D';

    public function __construct()
    {
        $this->user = config('services.bcentral.user');
        $this->pass = config('services.bcentral.pass');
    }

    /**
     * Obtiene el valor de la UF para el día actual.
     * Usa caché para evitar peticiones repetidas.
     */
    public function getUfValue(): ?string
    {
        $today = Carbon::today()->format('Y-m-d');
        $cacheKey = "uf_value_{$today}";

        // Caché por 24 horas para evitar múltiples llamadas
        return Cache::remember($cacheKey, 1440, function () use ($today) {
            
            if (!$this->user || !$this->pass) {
                return null;
            }

            try {
                $response = Http::timeout(10)->get($this->baseUrl, [
                    'user'       => $this->user,
                    'pass'       => $this->pass,
                    'function'   => 'GetSeries',
                    'timeseries' => self::UF_SERIES_ID,
                    'firstdate'  => $today,
                    'lastdate'   => $today,
                ]);

                if ($response->successful() && isset($response->json()['Series']['Obs'][0]['value'])) {
                    return $response->json()['Series']['Obs'][0]['value'];
                }
            } catch (\Exception $e) {
                // Log del error pero no interrumpir la aplicación
                Log::warning('Error al obtener valor UF: ' . $e->getMessage());
            }

            return null;
        });
    }

    /**
     * Obtiene información completa de la UF incluyendo fecha y metadatos.
     */
    public function getUfCompleteInfo(): array
    {
        $today = Carbon::today()->format('Y-m-d');
        $cacheKey = "uf_complete_info_{$today}";

        return Cache::remember($cacheKey, 1440, function () use ($today) {
            
            if (!$this->user || !$this->pass) {
                return [
                    'value' => null,
                    'date' => $today,
                    'error' => 'Credenciales no configuradas'
                ];
            }

            try {
                $response = Http::timeout(10)->get($this->baseUrl, [
                    'user'       => $this->user,
                    'pass'       => $this->pass,
                    'function'   => 'GetSeries',
                    'timeseries' => self::UF_SERIES_ID,
                    'firstdate'  => $today,
                    'lastdate'   => $today,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    
                    if (isset($data['Series']['Obs'][0]['value'])) {
                        return [
                            'value' => $data['Series']['Obs'][0]['value'],
                            'date' => $data['Series']['Obs'][0]['indexDateString'] ?? $today,
                            'unit' => 'Pesos',
                            'frequency' => 'Diaria',
                            'source' => 'Banco Central de Chile',
                            'last_update' => Carbon::now()->format('d.M.Y'),
                            'series_id' => self::UF_SERIES_ID,
                            'error' => null
                        ];
                    }
                }
            } catch (\Exception $e) {
                Log::warning('Error al obtener información completa UF: ' . $e->getMessage());
                return [
                    'value' => null,
                    'date' => $today,
                    'error' => $e->getMessage()
                ];
            }

            return [
                'value' => null,
                'date' => $today,
                'error' => 'No se pudo obtener información'
            ];
        });
    }
}