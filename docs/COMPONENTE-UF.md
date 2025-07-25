# Componente UF - Documentación

## 📋 **Descripción**

El componente `UfValue` es un componente reutilizable de Laravel que consume la API del Banco Central de Chile para obtener el valor actual de la Unidad de Fomento (UF).

## 🚀 **Características**

-   ✅ Consumo de API externa del Banco Central de Chile
-   ✅ Caché automático de 24 horas para optimizar rendimiento
-   ✅ Diseño responsive con Bootstrap 5
-   ✅ Manejo de errores cuando la API no está disponible
-   ✅ Fácil integración en cualquier vista Blade

## 🛠️ **Uso**

Para usar el componente en cualquier vista Blade, simplemente incluye:

```blade
<x-uf-value />
```

## 📁 **Estructura de Archivos**

```
app/
├── Services/
│   └── BancoCentralApiService.php    # Servicio para consumir la API
└── View/
    └── Components/
        └── UfValue.php               # Clase del componente

resources/
└── views/
    └── components/
        └── uf-value.blade.php        # Vista del componente
```

## ⚙️ **Configuración**

El componente requiere las siguientes variables de entorno en tu archivo `.env`:

```env
BCENTRAL_API_USER=tu_usuario_api
BCENTRAL_API_PASS=tu_contraseña_api
```

## 🔧 **Funcionalidades Técnicas**

### Servicio BancoCentralApiService

-   **Método**: `getUfValue()`
-   **Caché**: 24 horas (1440 minutos)
-   **API**: `https://si3.bcentral.cl/SieteRestWS/SieteRestWS.ashx`
-   **Serie**: `F073.TCO.PRE.Z.D` (UF diaria)

### Componente UfValue

-   **Clase**: `App\View\Components\UfValue`
-   **Vista**: `components.uf-value`
-   **Inyección de dependencias**: Recibe `BancoCentralApiService`

## 📱 **Ejemplos de Uso**

### En la navegación:

```blade
<nav class="navbar">
    <div class="navbar-nav">
        <x-uf-value />
    </div>
</nav>
```

### En una tarjeta:

```blade
<div class="card">
    <div class="card-body">
        <h5>Información Financiera</h5>
        <x-uf-value />
    </div>
</div>
```

### En un footer:

```blade
<footer class="bg-light p-3">
    <div class="text-center">
        <x-uf-value />
    </div>
</footer>
```

## 🎨 **Diseño**

El componente incluye:

-   🪙 Icono de monedas (FontAwesome)
-   🟦 Texto "UF:" en color azul
-   🟢 Badge verde con el valor formateado
-   📱 Diseño responsive con Bootstrap

## ⚠️ **Manejo de Errores**

-   Si no hay credenciales configuradas: retorna `null`
-   Si la API no responde: retorna `null`
-   Si no hay valor disponible: muestra "No disponible"

## 🔄 **Caché**

-   **Duración**: 24 horas
-   **Clave**: `uf_value_{fecha_actual}`
-   **Renovación**: Automática después de 24 horas

## 🧪 **Pruebas**

Puedes probar el componente visitando: `/test-uf`

## 📈 **Mejoras Futuras**

-   [ ] Agregar más series del Banco Central (Dólar, Euro, etc.)
-   [ ] Configuración de tiempo de caché personalizable
-   [ ] Modo de prueba con valores simulados
-   [ ] Histórico de valores UF
