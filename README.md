# Gestor de Proyectos con Laravel

Este es el repositorio oficial para el proyecto de modernización del Sistema de Gestión de Proyectos, desarrollado con el framework Laravel 11. Este documento sirve como una guía central para entender la arquitectura, los patrones de diseño y el flujo de trabajo del proyecto.

## Índice

1.  [El Modelo Mental de Laravel: La Filosofía del Artesano de Software](#1-el-modelo-mental-de-laravel-la-filosofía-del-artesano-de-software)
2.  [El Ciclo de Vida de una Petición (Request Lifecycle) en Este Proyecto](#2-el-ciclo-de-vida-de-una-petición-request-lifecycle-en-este-proyecto)
3.  [Arquitectura de Nuestro Gestor de Proyectos](#3-arquitectura-de-nuestro-gestor-de-proyectos)
4.  [Patrones de Diseño Aplicados](#4-patrones-de-diseño-aplicados)
    -   [MVC (Modelo-Vista-Controlador): El Pilar Principal](#mvc-modelo-vista-controlador-el-pilar-principal)
    -   [Características Técnicas Implementadas](#características-técnicas-implementadas)
5.  [Configuración Actual del Proyecto](#5-configuración-actual-del-proyecto)

---

### 1. El Modelo Mental de Laravel: La Filosofía del Artesano de Software

Antes de escribir una sola línea de código, es crucial entender la filosofía detrás de Laravel. Laravel no es solo un conjunto de herramientas; es un framework "opinado" que promueve la idea de que **el desarrollo web debe ser una experiencia creativa y placentera**.

El modelo mental es el de un **artesano de software**. Un artesano no solo construye algo funcional, sino que también se enorgullece de la elegancia, la claridad y la calidad de su trabajo.

-   **Código Expresivo y Elegante:** La sintaxis de Laravel está diseñada para ser legible y casi poética. El objetivo es que el código se explique por sí mismo, facilitando el trabajo en equipo y el mantenimiento a largo plazo.
-   **"Con Baterías Incluidas":** Laravel nos proporciona soluciones listas para usar para las tareas más comunes (autenticación, enrutamiento, caché, colas). Esto nos permite, como equipo, centrarnos en la **lógica de negocio** (qué hace único a nuestro gestor de proyectos) en lugar de reinventar la rueda.
-   **Productividad y Felicidad del Desarrollador:** Herramientas como Artisan (la línea de comandos), Tinker (la consola interactiva) y la estructura de proyecto predefinida están diseñadas para eliminar la fricción y hacer que el desarrollo sea rápido y satisfactorio.

Adoptar este modelo mental significa que, en este proyecto, no solo buscamos que funcione, sino que nos esforzamos por escribir código del que estemos orgullosos.

### 2. El Ciclo de Vida de una Petición (Request Lifecycle) en Este Proyecto

Entender cómo Laravel maneja una solicitud es fundamental para saber dónde colocar nuestro código y cómo depurar problemas. Imaginemos el viaje de una petición para ver la lista de todos los proyectos:

1.  **Entrada del Usuario:** Un usuario escribe `http://project-management.test/projects` en su navegador.
2.  **Punto de Entrada Único (`public/index.php`):** La petición llega al único punto de entrada de la aplicación. Este archivo carga el framework.
3.  **El Kernel HTTP (`app/Http/Kernel.php`):** El "corazón" de la aplicación recibe la petición. La pasa a través de una serie de "filtros" o **Middleware** globales (como verificar si hay una sesión activa).
4.  **El Router (`routes/web.php`):** El Router examina la URL `/projects` y el método `GET`. Encuentra una coincidencia en nuestro archivo de rutas y determina que debe llamar al método `index()` del `ProjectController`.
5.  **El Controlador (`ProjectController`):** El método `index()` toma el control. Su trabajo es orquestar la respuesta y interactuar directamente con el modelo.
6.  **El Modelo (`Project`):** El controlador utiliza directamente el modelo Eloquent `Project` para obtener los datos de la base de datos mediante `Project::all()`, siguiendo el patrón MVC clásico de Laravel.
7.  **La Vista (`projects/index.blade.php`):** Una vez que el controlador tiene la lista de proyectos, se la pasa a la vista Blade. La vista se encarga de generar el HTML, iterando sobre los datos y construyendo la tabla de proyectos.
8.  **Respuesta al Usuario:** La vista renderizada se convierte en un objeto `Response` y viaja de vuelta por el mismo camino, entregándose finalmente al navegador del usuario, que la muestra como una página web.

Este flujo claro y predecible es la base de toda la interacción en nuestra aplicación.

### 3. Arquitectura de Nuestro Gestor de Proyectos

Nuestra aplicación sigue la arquitectura MVC clásica de Laravel, centrada en el principio de **Separación de Responsabilidades** con un flujo directo entre controlador y modelo.

```
  Usuario
     ↓
+-------------------------------------------------+
|   Navegador Web                                 |
+-------------------------------------------------+
     ↓         ↑
+-------------------------------------------------+
|   Servidor Web (Apache/Nginx en Laragon)        |
+-------------------------------------------------+
     ↓         ↑
+-------------------------------------------------+
|   Laravel Framework                             |
|                                                 |
|   +-----------+     +------------+              |
|   |   Router  | → | Middleware | → | Controller |
|   | (web.php) |     | (auth, etc)|   | (Project)  |
|   +-----------+     +------------+   +-----+----+
|                                            |
|   +-----------+     +------------+   +-----↓----+
|   |   Vista   | ← |   Modelo     | ← |   Base de  |
|   | (Blade)   |     | (Eloquent) |   |   Datos    |
|   +-----------+     +------------+   +----------+
|                                                 |
+-------------------------------------------------+
```

-   **Router (`routes/web.php`):** Define todas las URLs válidas de la aplicación usando `Route::resource()` para crear automáticamente todas las rutas CRUD.
-   **Middleware:** Actúan como guardias de seguridad entre la ruta y el controlador. Incluye protección CSRF y manejo de sesiones.
-   **Controller (`app/Http/Controllers/ProjectController.php`):** Maneja la lógica de la aplicación e interactúa directamente con el modelo Eloquent. Incluye validación de datos y manejo de respuestas JSON/HTML.
-   **Model (`app/Models/Project.php`):** Representa la entidad Project usando Eloquent ORM. Maneja la interacción con la base de datos de forma directa y elegante.
-   **View (`resources/views/projects/*.blade.php`):** Vistas Bootstrap responsivas para listar, crear, mostrar y editar proyectos.
-   **Database:** Base de datos MySQL con migraciones para crear la estructura de la tabla `projects`.

### 4. Patrones de Diseño Aplicados

Laravel utiliza intensivamente patrones de diseño para lograr su arquitectura flexible y elegante.

#### MVC (Modelo-Vista-Controlador): El Pilar Principal

Este es el patrón arquitectónico central de nuestra aplicación, implementado de forma directa y clásica.

-   **Modelo (`Project.php`):** Representa un proyecto usando Eloquent ORM. Contiene los datos (`id`, `name`, `start_date`, `status`, `responsible`, `monto`) y maneja automáticamente la interacción con la base de datos MySQL.
-   **Vista (`projects/*.blade.php`):** Interfaces de usuario Bootstrap responsivas. Incluye vistas para listar (`index`), crear (`create`), mostrar (`show`) y editar (`edit`) proyectos con validación visual de errores.
-   **Controlador (`ProjectController.php`):** Maneja las peticiones HTTP, valida datos, interactúa directamente con el modelo Eloquent y decide qué vista renderizar. Incluye soporte tanto para respuestas HTML como JSON.

#### Características Técnicas Implementadas

-   **Rutas Resource:** Usamos `Route::resource('projects', ProjectController::class)` que automáticamente crea todas las rutas CRUD estándar.
-   **Validación de Formularios:** Validación directa en el controlador con reglas específicas para cada campo.
-   **Eloquent ORM:** Interacción directa con la base de datos sin capas adicionales, siguiendo las mejores prácticas de Laravel.
-   **Migrations y Seeders:** Estructura de base de datos versionada y datos de prueba para desarrollo.

---

## 5. Configuración Actual del Proyecto

### Base de Datos

-   **Motor:** MySQL a través de Laragon
-   **Tabla:** `projects` con campos: `id`, `name`, `start_date`, `status`, `responsible`, `monto`, `created_at`, `updated_at`
-   **Migraciones:** Estructura versionada con `php artisan migrate`
-   **Seeders:** Datos de prueba con `php artisan db:seed`

### Rutas Implementadas

```php
// Todas las rutas CRUD automáticas
Route::resource('projects', ProjectController::class);

// Ruta API adicional
Route::get('/api/projects', [ProjectController::class, 'api_index']);
```

### Vistas Bootstrap

-   `layouts/app.blade.php` - Layout principal con Bootstrap 5 y FontAwesome
-   `projects/index.blade.php` - Lista de proyectos con tabla responsive
-   `projects/create.blade.php` - Formulario de creación con validación
-   `projects/show.blade.php` - Vista detallada de proyecto
-   `projects/edit.blade.php` - Formulario de edición

### Funcionalidades

-   ✅ CRUD completo de proyectos
-   ✅ Validación de formularios
-   ✅ Respuestas JSON para API
-   ✅ Interfaz Bootstrap responsive
-   ✅ Mensajes flash de éxito/error
-   ✅ Confirmaciones de eliminación

### Testing

Las rutas pueden probarse con:

-   **Web:** `http://project-management.test/projects`
-   **API:** `http://project-management.test/api/projects`
-   **Herramientas:** Postman, Thunder Client

---
