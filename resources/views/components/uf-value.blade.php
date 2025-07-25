<div class="uf-value d-inline-flex align-items-center">
    <i class="fas fa-coins text-warning me-2"></i>
    <span class="fw-bold text-primary">UF:</span>
    <span class="ms-2 badge bg-success fs-6">
        @if($value)
            ${{ number_format((float)$value, 2, ',', '.') }}
        @else
            <span class="badge bg-secondary">No disponible</span>
        @endif
    </span>
</div>