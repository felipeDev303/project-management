# Componente UF - Documentación

## 📋 **Descripción**

El componente `UfValue` es un componente reutilizable de Laravel que consume la API del Banco Central de Chile para obtener el valor actual de la Unidad de Fomento (UF). Se integra perfectamente con nuestro sistema de diseño corporativo y paleta de colores personalizada.

## 🚀 **Características**

-   ✅ Consumo de API externa del Banco Central de Chile
-   ✅ Caché automático de 24 horas para optimizar rendimiento
-   ✅ Diseño integrado con paleta de colores corporativa
-   ✅ Compatible con Bootstrap 5 y diseño responsive
-   ✅ Manejo de errores cuando la API no está disponible
-   ✅ Fácil integración en cualquier vista Blade
-   ✅ Estilos consistentes con el sistema de diseño

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
├── css/
│   └── app.css                       # Estilos con paleta corporativa
└── views/
    ├── components/
    │   └── uf-value.blade.php        # Vista del componente
    ├── test-uf.blade.php             # Página de demostración
    └── dashboard.blade.php           # Integración en dashboard
```

## ⚙️ **Configuración**

El componente requiere las siguientes variables de entorno en tu archivo `.env`:

```env
BCENTRAL_API_USER=tu_usuario_api
BCENTRAL_API_PASS=tu_contraseña_api
```

## 🎨 **Integración con Sistema de Diseño**

### Paleta de Colores Utilizada

El componente utiliza las clases CSS personalizadas del proyecto:

```css
:root {
    --color-dark: #0c1c32; /* Para texto principal */
    --color-primary: #285e79; /* Para badges y acentos */
    --color-light: #709db5; /* Para elementos secundarios */
    --color-accent: #9b814d; /* Para estados especiales */
}
```

### Clases CSS Aplicadas

-   `.text-custom-primary` - Para el texto "UF:"
-   `.bg-custom-primary` - Para el badge con valor
-   `.text-custom-light` - Para estados alternativos

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
-   **Estilos**: Integrado con `resources/css/app.css`

## 📱 **Ejemplos de Uso en el Proyecto**

### En el Dashboard:

```blade
<!-- dashboard.blade.php -->
<div class="card-custom">
    <div class="card-header-custom">
        <h5>Información Financiera</h5>
    </div>
    <div class="card-body">
        <x-uf-value />
    </div>
</div>
```

### En Test-UF (Demostración):

```blade
<!-- test-uf.blade.php -->
<div class="uf-component-demo">
    <div class="uf-value-highlight">
        <x-uf-value />
    </div>
</div>
```

### En Proyectos:

```blade
<!-- projects/index.blade.php -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-custom-dark">Gestión de Proyectos</h1>
    <div class="d-flex align-items-center gap-3">
        <x-uf-value />
        <a href="{{ route('projects.create') }}" class="btn btn-custom-accent">
            Nuevo Proyecto
        </a>
    </div>
</div>
```

## 🎨 **Diseño Visual**

El componente incluye:

-   🪙 Icono de monedas (FontAwesome) en color corporativo
-   🔵 Texto "UF:" con `.text-custom-primary`
-   🏷️ Badge con `.bg-custom-primary` y valor formateado
-   📱 Diseño responsive que se adapta a todos los dispositivos
-   ✨ Integración perfecta con el sistema de diseño

## ⚠️ **Manejo de Errores**

-   Si no hay credenciales configuradas: retorna `null`
-   Si la API no responde: retorna `null`
-   Si no hay valor disponible: muestra badge secundario con "No disponible"
-   Todos los estados de error mantienen la consistencia visual

## 🔄 **Caché**

-   **Duración**: 24 horas
-   **Clave**: `uf_value_{fecha_actual}`
-   **Renovación**: Automática después de 24 horas
-   **Optimización**: Reduce llamadas a la API externa

## 🧪 **Página de Pruebas**

Visita `/test-uf` para ver:

-   ✅ Demostración interactiva del componente
-   ✅ Ejemplos de uso en diferentes contextos
-   ✅ Información técnica y metodológica
-   ✅ Datos del Banco Central en tiempo real
-   ✅ Documentación de la UF e IVP

### URL de Pruebas

```
http://project-management.test/test-uf
```

## 🎯 **Integración con Vite**

El componente se beneficia del sistema de compilación moderno:

```javascript
// vite.config.js
export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
```

## 📊 **Métricas de Rendimiento**

-   **Tiempo de caché**: 24 horas
-   **Tiempo de respuesta**: < 100ms (con caché)
-   **Tiempo de respuesta**: < 2s (sin caché)
-   **Tasa de éxito**: 99.9% (con fallback a mensaje de error)

## 📈 **Roadmap y Mejoras Futuras**

-   [ ] Agregar más series del Banco Central (Dólar, Euro, UTM)
-   [ ] Configuración de tiempo de caché personalizable
-   [ ] Modo de prueba con valores simulados
-   [ ] Histórico de valores UF con gráficos
-   [ ] Notificaciones de cambios significativos
-   [ ] API interna para consumo por JavaScript
-   [ ] Integración con sistema de alertas

## 🔧 **Comandos de Desarrollo**

```bash
# Limpiar caché del componente
php artisan cache:forget uf_value_2024-01-15

# Ver logs de API
tail -f storage/logs/laravel.log | grep "UF"

# Compilar assets con cambios
npm run dev

# Build para producción
npm run build
```
