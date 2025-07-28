<div class="uf-value d-inline-flex align-items-center">
    <i class="fas fa-coins text-custom-accent me-2"></i>
    <span class="fw-bold text-custom-light">UF:</span>
    @if($value)
        <span class="ms-2 badge bg-custom-dark fs-6">
            ${{ number_format((float)$value, 2, ',', '.') }}
        </span>
    @else
        <span class="ms-2 badge bg-secondary fs-6">
            No disponible
        </span>
    @endif
</div>