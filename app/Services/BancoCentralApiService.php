<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class BancoCentralApiService
{
    protected string $baseUrl = 'https://si3.bcentral.cl/SieteRestWS/SieteRestWS.ashx';
    protected ?string $user;
    protected ?string $pass;

    // El ID de la serie de tiempo para la UF diaria
    const UF_SERIES_ID = 'F073.TCO.PRE.Z.D';

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

        // Guarda el resultado en caché por 24 horas (1440 minutos).
        // La función solo se ejecutará si el valor no está en caché.
        return Cache::remember($cacheKey, 1440, function () use ($today) {
            
            if (!$this->user || !$this->pass) {
                // Si no hay credenciales en .env, no podemos continuar.
                return null;
            }

            $response = Http::get($this->baseUrl, [
                'user'       => $this->user,
                'pass'       => $this->pass,
                'function'   => 'GetSeries',
                'timeseries' => self::UF_SERIES_ID,
                'firstdate'  => $today,
                'lastdate'   => $today,
            ]);

            // Verifica si la petición fue exitosa y si la respuesta tiene el formato esperado
            if ($response->successful() && isset($response->json()['Series']['Obs'][0]['value'])) {
                return $response->json()['Series']['Obs'][0]['value'];
            }

            return null; // Devuelve null si la API falla o no hay datos
        });
    }
}