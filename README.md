
# T2-24-(70) - DESARROLLO DE SOFTWARE WEB I

Este es un proyecto en PHP, FrameWork Laravel, conexion a bd MySQL


## Lenguajes


[![PHP ](https://img.shields.io/badge/php-7.3-blue?style=for-the-badge&logo=php&logoColor=blue&logoSize=auto
)](https://www.php.net/manual/es/index.php) 

[![Laravel](https://img.shields.io/badge/Laravel-11-red?style=for-the-badge&logo=laravel&logoColor=red&logoSize=auto
)](https://laravel.com/docs/8.x/releases)

## Autores

- [@CaroVeero](https://github.com/CaroVeero)
- [@DanielaDroguett](https://github.com/DanielaDroguett)
- [@patriciomelor](https://github.com/patriciomelor)


## Documentación

[Requerimientos - *Pendiente*]()


## Frontend

- [Parte Front - *Pendiente*]()

## BackEnd

- [Parte Back - *Pendiente*]()
## Used By

Este Repositorio esta creado para evaluaciones de:

- Instituto Profecional San Sebastian
- Profesor Sebastian Cabezas

# Proyecto Laravel

## Requisitos Previos

- **PHP** >= 7.3
- **Composer**
- **Node.js** con **npm**
- **SQLite**

## Instrucciones para macOS

1. **Instalar Homebrew (si no lo tienes ya instalado)**:
    ```bash
    /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
    ```

2. **Instalar PHP, Composer, y Node.js**:
    ```bash
    brew install php composer node
    ```

3. **Clonar el repositorio**:
    ```bash
    git clone https://github.com/patriciomelor/T2-70-DSW-I.git
    cd Proyecto-Linces
    ```

4. **Instalar dependencias de Composer**:
    ```bash
    composer install
    ```

5. **Instalar dependencias de Node.js**:
    ```bash
    npm install
    ```

6. **Configurar el entorno**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

7. **Configurar SQLite**:
    - Asegúrate de que la variable `DB_CONNECTION=sqlite` esté en el archivo `.env`.
    - Crear el archivo de base de datos:
      ```bash
      touch database/database.sqlite
      ```

8. **Migrar la base de datos**:
    ```bash
    php artisan migrate
    ```

9. **Compilar los activos frontend**:
    ```bash
    npm run dev
    ```

10. **Levantar el servidor de desarrollo**:
    ```bash
    php artisan serve
    ```

11. **Abrir el proyecto en el navegador**:
    - Visita `http://localhost:8000`

## Instrucciones para Windows

1. **Instalar Chocolatey (si no lo tienes ya instalado)**:
    - Abre PowerShell como administrador y ejecuta:
      ```powershell
      Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
      ```

2. **Instalar PHP, Composer, y Node.js**:
    ```powershell
    choco install php composer nodejs
    ```

3. **Clonar el repositorio**:
    ```powershell
    git clone https://github.com/patriciomelor/T2-70-DSW-I.git
    cd Proyecto-Linces
    ```

4. **Instalar dependencias de Composer**:
    ```powershell
    composer install
    ```

5. **Instalar dependencias de Node.js**:
    ```powershell
    npm install
    ```

6. **Configurar el entorno**:
    ```powershell
    copy .env.example .env
    php artisan key:generate
    ```

7. **Configurar SQLite**:
    - Asegúrate de que la variable `DB_CONNECTION=sqlite` esté en el archivo `.env`.
    - Crear el archivo de base de datos:
      ```powershell
      ni database/database.sqlite -Force
      ```

8. **Migrar la base de datos**:
    ```powershell
    php artisan migrate
    ```

9. **Compilar los activos frontend**:
    ```powershell
    npm run dev
    ```

10. **Levantar el servidor de desarrollo**:
    ```powershell
    php artisan serve
    ```

11. **Abrir el proyecto en el navegador**:
    - Visita `http://localhost:8000`

## Notas adicionales

- Asegúrate de que el archivo `.env` contenga la configuración correcta para `DB_CONNECTION=sqlite`.
- Si encuentras problemas de permisos, ajusta los permisos del archivo `database.sqlite` según sea necesario.


## Licencia

Este proyecto está bajo la licencia XYZ.
