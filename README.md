 MANUAL DE INSTALACIÓN Y EJECUCIÓN RÁPIDA DEL BACKEND (LARAVEL)

Este manual asume que ya has clonado el repositorio y que la terminal está ubicada en la carpeta raíz del proyecto Laravel (PruebaTecnicaViapin/backend-laravel).

📋 Requisitos Mínimos

Asegúrate de tener instalados y funcionando: PHP (v8.1+), Composer, MySQL (o MariaDB) y Node.js/npm.

🛠️ Comandos Esenciales de Configuración y Ejecución

Ejecuta esta secuencia de comandos, uno por uno, en tu terminal:

PASO 1: Instalar Dependencias

Instala las librerías de Laravel y las dependencias de Node.js (necesarias para herramientas de desarrollo).

# 1. Instala las librerías principales de PHP (Laravel, etc.)
composer install

# 2. Instala las dependencias de Node.js (generalmente usadas para Vite/Mix)
npm install


PASO 2: Configurar el Entorno

Genera el archivo de configuración local y la clave de seguridad de la aplicación.

# 1. Copia el archivo de configuración de ejemplo
cp .env.example .env

# 2. Genera la clave de seguridad única (APP_KEY)
php artisan key:generate


PASO 3: Configurar y Crear la Base de Datos

Antes de continuar, debes:

Abrir tu gestor de bases de datos (phpMyAdmin, DBeaver, etc.).

Crear una base de datos vacía con el nombre exacto: viapin_users.

Abrir el archivo .env y verificar que los datos de conexión sean correctos.
EJEMPLO DEL .ENV EN ESTAS LINEAS (Asi deberia verse)

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=viapin_users

DB_USERNAME=root

DB_PASSWORD=

#Puede reemplazar por los valores que esta viendo o segun los de la maquina.

PASO 4: Inicializar la Base de Datos

Ejecuta las migraciones (crea tablas) y los seeders (carga datos iniciales o de prueba).

# Ejecuta las migraciones y los seeders
php artisan migrate (ese para la tabla)          php artisan migrate --seed (este para el contenido)


#Aqui ya debe poder mirar los datos iniciales en la base de datos y puede prender el server.

PASO 5: Iniciar el Servidor API

Levanta el servidor de desarrollo de Laravel. La API estará lista para ser consumida por el Frontend.

# Inicia el servidor de desarrollo en [http://127.0.0.1:8000](http://127.0.0.1:8000)
php artisan serve


✅ FINALIZADO:

La API RESTful está operativa en http://127.0.0.1:8000. Ya puedes iniciar el Frontend de Angular para empezar a interactuar con el CRUD.
