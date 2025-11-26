# Sistema de Gestión Veterinaria

## Descripción
Este proyecto es un sistema de gestión para una clínica veterinaria desarrollado en Laravel. Permite la administración de usuarios (Administradores, Staff, Clientes) y la gestión de mascotas.

## Funcionalidades
- **Autenticación**: Registro, Login, Logout.
- **Gestión de Roles**:
    - **Admin**: Acceso total, gestión de usuarios y mascotas.
    - **Staff**: Gestión de mascotas.
    - **Client**: Visualización de sus propias mascotas.
- **Gestión de Usuarios**: CRUD completo de usuarios con asignación de roles.
- **Gestión de Mascotas**: Registro, edición y eliminación de mascotas (Nombre, Especie, Raza, Edad, Dueño).

## Requisitos Previos
- PHP 8.2+
- Composer
- Node.js & NPM
- Base de datos (MySQL/SQLite)

## Instalación

1. **Clonar el repositorio**
   ```bash
   git clone <url-del-repositorio>
   cd veterinaria
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Configurar entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Configura tu base de datos en el archivo `.env`.

4. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Instalar dependencias de Frontend**
   ```bash
   npm install
   npm run build
   ```

6. **Ejecutar servidor local**
   ```bash
   php artisan serve
   ```

## Usuarios de Prueba

| Rol | Email | Contraseña |
| --- | --- | --- |
| **Admin** | admin@example.com | password |
| **Staff** | staff@example.com | password |
| **Cliente** | client1@example.com | password |

## Estructura del Proyecto
- **Controladores**: `app/Http/Controllers`
- **Modelos**: `app/Models`
- **Vistas**: `resources/views`
- **Rutas**: `routes/web.php`
