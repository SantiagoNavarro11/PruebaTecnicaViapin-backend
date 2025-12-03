🚀 MANUAL DE INSTALACIÓN PASO A PASO DEL BACKEND (LARAVEL)
Este manual te guiará por la instalación completa del servicio API REST. Sigue el orden de los pasos exactamente como se presentan.

1. Verificación de Requisitos (Antes de Empezar)
Asegúrate de que tienes instalados estos programas en tu sistema:

Git: Para clonar el repositorio.

XAMPP (o similar): Para tener el servidor PHP y MySQL.

Composer: Para instalar las librerías de Laravel.

Node.js y npm: Para las herramientas de desarrollo complementarias.

2. Configuración y Ejecución del Proyecto
PASO 1: Clonar el Repositorio
Primero, necesitamos descargar el código y ubicarlo en una carpeta de trabajo.

En tu terminal (CMD, PowerShell, o Git Bash):

Bash

# 1. Navega a la carpeta donde guardarás el proyecto (puedes usar C:\xampp\htdocs\ si lo prefieres" ahi lo tengo alojado yo")
cd C:/tu/carpeta/de/proyectos

# 2. Clona el repositorio. Esto creará la carpeta 'PruebaTecnicaViapin'
git clone https://github.com/SantiagoNavarro11/PruebaTecnicaViapin-backend.git

# 3. Entra a la subcarpeta del backend
cd PruebaTecnicaViapin/backend-laravel
PASO 2: Instalar Librerías y Dependencias
Ahora que estás dentro de la carpeta del proyecto, ejecuta los comandos de instalación.

En la terminal, dentro de la carpeta backend-laravel:

Bash

# Instala las librerías principales de PHP (Laravel, etc.)
composer install

# Instala las dependencias de Node.js (si son necesarias para el scaffolding de Laravel)
npm install
PASO 3: Configurar el Archivo de Entorno
Debemos crear el archivo .env que contiene la configuración local.

En la terminal, dentro de la carpeta backend-laravel:

Bash

# Copia el archivo de configuración de ejemplo
cp .env.example .env

# Genera la clave de seguridad única para la aplicación
php artisan key:generate
PASO 4: Crear la Base de Datos y Conectar
La base de datos debe existir antes de que el código pueda interactuar con ella.

Abre tu gestor de MySQL (ej. phpMyAdmin, DBeaver, o Workbench).

Crea una base de datos vacía con el nombre exacto: viapin_users.

Abre el archivo .env en tu editor de código.

Busca la sección DB_ y asegúrate de que los valores sean correctos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=viapin_users  # <--- ¡Importante!
DB_USERNAME=root          # <--- Tu usuario de MySQL
DB_PASSWORD=              # <--- Tu contraseña de MySQL
PASO 5: Inicializar la Base de Datos
Este es el comando final que prepara la base de datos, creando la estructura y los datos de prueba.

En la terminal, dentro de la carpeta backend-laravel:

Bash

# Ejecuta las migraciones (crea tablas) y los seeders (carga datos iniciales)
php artisan migrate --seed
PASO 6: Iniciar el Servidor API
El último paso es levantar el servicio de Laravel.

En la terminal, dentro de la carpeta backend-laravel:

Bash

# Inicia el servidor de desarrollo
php artisan serve
✅ FINALIZADO:

La API está corriendo. La URL base para el Frontend de Angular es: http://127.0.0.1:8000
