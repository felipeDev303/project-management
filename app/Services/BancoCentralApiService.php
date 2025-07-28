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

    // Usar el ID correcto para UF
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
                \Log::warning('Error al obtener valor UF: ' . $e->getMessage());
            }

            return null;
        });
    }
}