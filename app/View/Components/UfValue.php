<?php

namespace App\View\Components;

use App\Services\BancoCentralApiService; // Importamos nuestro servicio
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UfValue extends Component
{
    public ?string $value; // Propiedad pública que estará disponible en la vista del componente

    /**
     * Crea una nueva instancia del componente.
     * Inyectamos nuestro servicio para usarlo.
     */
    public function __construct(BancoCentralApiService $bancoCentralApi)
    {
        $this->value = $bancoCentralApi->getUfValue();
    }

    /**
     * Obtiene la vista que representa el componente.
     */
    public function render(): View|Closure|string
    {
        return view('components.uf-value');
    }
}