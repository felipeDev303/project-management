# 🚀 Sistema de Gestión de Proyectos

Un sistema moderno y eficiente para la gestión de proyectos construido con **Laravel 11** y **Bootstrap 5**.

## ✨ Características

-   📊 **Dashboard interactivo** con estadísticas en tiempo real
-   📝 **CRUD completo** de proyectos (Crear, Leer, Actualizar, Eliminar)
-   💰 **Componente UF** integrado con datos del Banco Central de Chile
-   🎨 **Diseño responsivo** con Bootstrap 5 y paleta de colores personalizada
-   🔍 **Navegación intuitiva** con breadcrumbs y menús contextuales
-   ⚡ **Validación de formularios** en tiempo real
-   📱 **Optimizado para móviles** con diseño responsive

## 🛠️ Tecnologías

-   **Backend**: Laravel 11
-   **Frontend**: Bootstrap 5 + Font Awesome 6
-   **Base de datos**: MySQL
-   **Build tool**: Vite
-   **PHP**: 8.2+

## 🚀 Instalación Rápida

```bash
# Clonar repositorio
git clone [url-del-repo]
cd project-management

# Instalar dependencias
composer install
npm install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Configurar base de datos
php artisan migrate

# Compilar assets
npm run build

# Servir aplicación
php artisan serve
```

## 📋 Configuración

### Base de Datos

Configura tu archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_management
DB_USERNAME=root
DB_PASSWORD=
```

### Servicio UF (Opcional)

Para habilitar el componente UF, configura:

```env
UF_API_URL=https://api.bankapi.cl/v1/public
```

## 🎯 Uso

### Dashboard

-   Accede a `/dashboard` para ver estadísticas generales
-   Visualiza proyectos por estado (Pendientes, En Progreso, Completados)
-   Acceso rápido a funciones principales

### Gestión de Proyectos

-   **Listar**: `/projects` - Vista de todos los proyectos
-   **Crear**: `/projects/create` - Formulario de nuevo proyecto
-   **Ver**: `/projects/{id}` - Detalles del proyecto
-   **Editar**: `/projects/{id}/edit` - Modificar proyecto existente

### Componente UF

```php
<x-uf-value />
```

Muestra el valor actual de la UF con formato chileno.

## 🎨 Personalización

### Colores Personalizados

El sistema utiliza variables CSS personalizadas:

-   `--custom-primary`: Azul principal
-   `--custom-accent`: Verde acento
-   `--custom-dark`: Gris oscuro
-   `--custom-light`: Gris claro

### Componentes Reutilizables

-   `<x-layout.header />`: Navegación principal
-   `<x-layout.footer />`: Pie de página
-   `<x-layout.breadcrumbs />`: Navegación breadcrumb
-   `<x-alerts.flash-messages />`: Mensajes del sistema
-   `<x-uf-value />`: Valor UF

## 📁 Estructura del Proyecto

```
resources/
├── views/
│   ├── components/          # Componentes reutilizables
│   │   ├── layout/         # Componentes de layout
│   │   └── alerts/         # Componentes de alertas
│   ├── layouts/            # Layouts principales
│   ├── projects/           # Vistas de proyectos
│   └── dashboard.blade.php # Dashboard principal
├── css/
│   └── app.css            # Estilos personalizados
└── js/
    └── app.js             # JavaScript principal
```

## 🔧 Comandos Útiles

```bash
# Desarrollo
npm run dev          # Modo desarrollo con watch
npm run build        # Compilar para producción

# Laravel
php artisan migrate  # Ejecutar migraciones
php artisan serve    # Servidor de desarrollo
php artisan route:list # Ver todas las rutas
```

## 📈 Rendimiento

-   ✅ **Bundle optimizado**: Solo Bootstrap (sin Tailwind)
-   ✅ **CSS minificado**: Usando Vite
-   ✅ **Imágenes optimizadas**: WebP cuando sea posible
-   ✅ **Lazy loading**: Para componentes pesados

## 🤝 Contribuir

1. Fork el proyecto
2. Crea tu feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la branch (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver `LICENSE` para más detalles.

## 👥 Soporte

-   📧 Email: soporte@proyecto.com
-   🐛 Issues: [GitHub Issues](link-to-issues)
-   📖 Documentación: [Wiki del proyecto](link-to-wiki)

---

**Desarrollado con ❤️ usando Laravel y Bootstrap**

-   **Test UF (`/test-uf`):** Página de demostración del componente UF con documentación interactiva
-   **Projects (`/projects`):** CRUD completo con diseño consistente
-   **Welcome (`/`):** Página de bienvenida Laravel por defecto

---

## 6. Configuración Actual del Proyecto

### Base de Datos

-   **Motor:** MySQL a través de Laragon
-   **Tabla:** `projects` con campos: `id`, `name`, `start_date`, `status`, `responsible`, `monto`, `created_at`, `updated_at`
-   **Migraciones:** Estructura versionada con `php artisan migrate`
-   **Seeders:** Datos de prueba con `php artisan db:seed`

### Rutas Implementadas

```php
// Rutas principales
Route::get('/', function () { return view('welcome'); });
Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
Route::get('/test-uf', function () { return view('test-uf'); })->name('test-uf');

// CRUD de Proyectos
Route::resource('projects', ProjectController::class);

// API
Route::get('/api/projects', [ProjectController::class, 'api_index']);
```

### Sistema de Assets con Vite

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

### Vistas con Layout Consistente

-   `layouts/app.blade.php` - Layout principal con Bootstrap 5, FontAwesome y paleta personalizada
-   `projects/index.blade.php` - Lista con diseño corporativo
-   `projects/create.blade.php` - Formulario con validación y estilos personalizados
-   `projects/show.blade.php` - Vista detallada
-   `projects/edit.blade.php` - Formulario de edición
-   `dashboard.blade.php` - Panel administrativo
-   `test-uf.blade.php` - Demostración del componente UF

### Funcionalidades Implementadas

-   ✅ CRUD completo de proyectos con diseño corporativo
-   ✅ Sistema de paleta de colores personalizada
-   ✅ Componente UF con API del Banco Central
-   ✅ Vite para compilación moderna de assets
-   ✅ Validación de formularios con estilos consistentes
-   ✅ Respuestas JSON para API
-   ✅ Interfaz Bootstrap responsive con temas personalizados
-   ✅ Dashboard informativo
-   ✅ Página de pruebas para componentes
-   ✅ Caché automático para APIs externas
-   ✅ Mensajes flash con estilos corporativos

### URLs de Prueba

-   **Web Principal:** `http://project-management.test/`
-   **Dashboard:** `http://project-management.test/dashboard`
-   **Proyectos:** `http://project-management.test/projects`
-   **Test UF:** `http://project-management.test/test-uf`
-   **API:** `http://project-management.test/api/projects`

### Herramientas de Desarrollo

-   **Laragon:** Entorno de desarrollo local
-   **Vite:** Hot Module Replacement y compilación
-   **Artisan:** Comandos de Laravel (`php artisan serve`)
-   **Testing:** Postman, Thunder Client para APIs

---

### Comandos Útiles

```bash
# Desarrollo
php artisan serve
npm run dev

# Base de datos
php artisan migrate:fresh --seed

# Caché
php artisan cache:clear
php artisan config:clear

# Assets
npm run build
```
