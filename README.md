# Sistema de Gestión de Tareas y Usuarios - API

Esta es una aplicación básica construida con Laravel 9 que proporciona una API RESTful para gestionar usuarios y sus tareas.

---

## Requisitos

- PHP >= 8.0
- Composer
- Un servidor de base de datos (ej. MySQL, MariaDB)

---

## Instalación

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/tu-usuario/tu-repositorio.git](https://github.com/tu-usuario/tu-repositorio.git)
    cd tu-repositorio
    ```

2.  **Instalar dependencias:**
    ```bash
    composer install
    ```

3.  **Configurar el entorno:**
    Copia el archivo `.env.example` a `.env`.
    ```bash
    cp .env.example .env
    ```
    Luego, abre el archivo `.env` y configura tus variables de entorno, especialmente la conexión a la base de datos y el `API_TOKEN`.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_DATABASE=gestion_tareas
    DB_USERNAME=root
    DB_PASSWORD=

    API_TOKEN=ABC987
    ```

4.  **Generar la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```

5.  **Ejecutar las migraciones y poblar la base de datos:**
    Asegúrate de haber creado una base de datos vacía con el nombre que especificaste en `.env`. Este comando creará las tablas y las llenará con datos de prueba.
    ```bash
    php artisan migrate:fresh --seed
    ```

---

## Iniciar el Servidor

Para iniciar el servidor de desarrollo de Laravel, ejecuta:
```bash
php artisan serve