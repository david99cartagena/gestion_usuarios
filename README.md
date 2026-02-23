# 📦 Proyecto Symfony 6 – Gestión de Usuarios

Aplicación web desarrollada con **Symfony 6** y **Doctrine ORM**, con autenticación de usuarios, gestión de perfiles y roles. Incluye:

- Registro y edición de usuarios.
- Autenticación segura.
- Gestión de perfiles activos/inactivos.
- Base de datos SQL Server compatible (PDO SQLSRV).

## 🔐 Funcionalidades principales

- **Registro de usuario:** Formulario con validación de nombre, email y contraseña (mínimo 6 caracteres, mayúscula y número).
- **Edición de perfil**: Cambiar nombre, email y contraseña opcional.
- **Activación / desactivación**: Usuarios pueden desactivar su cuenta, bloqueando el acceso hasta ser reactivados por administrador.
- **Autenticación**: Symfony Security + PasswordHasher + UserChecker para validar cuentas activas.
- **Redirecciones seguras**: Usuarios autenticados son redirigidos a perfil; usuarios no autenticados al login.

## 📷 Imagenes de la Aplicacion

- ![](https://raw.githubusercontent.com/david99cartagena/gestion_usuarios/refs/heads/main/media/Screenshot_1.png)

- ![](https://raw.githubusercontent.com/david99cartagena/gestion_usuarios/refs/heads/main/media/Screenshot_2.png)

- ![](https://raw.githubusercontent.com/david99cartagena/gestion_usuarios/refs/heads/main/media/Screenshot_3.png)

- ![](https://raw.githubusercontent.com/david99cartagena/gestion_usuarios/refs/heads/main/media/Screenshot_4.png)

- ![](https://raw.githubusercontent.com/david99cartagena/gestion_usuarios/refs/heads/main/media/Screenshot_5.png)

- ![](https://raw.githubusercontent.com/david99cartagena/gestion_usuarios/refs/heads/main/media/Screenshot_6.png)

## ⚙️ Stack Tecnológico

**Backend:**

- Symfony Framework – 6.4
- PHP – 8.1+
- Doctrine ORM – 3.x
- SQL Server (PDO SQLSRV)
- Twig – motor de plantillas
- Composer – gestión de dependencias

**Frontend:**

- Bootstrap 5 – estilos y componentes
- JavaScript – interactividad mínima (toggle contraseña, confirmación con SweetAlert)

## 🗂️ Tablas principales

- **User** `(id, nombre, email, password, roles, isActive)`

## 📁 Estructura del Proyecto

```
/gestion_usuarios
├── .env                 # Configuración principal de entorno (variables globales)
├── .env.dev             # Variables para entorno de desarrollo
├── .env.test            # Variables para pruebas
├── .env.example         # Ejemplo de configuración para compartir
├── .gitignore           # Archivos y carpetas a ignorar en Git
├── composer.json        # Dependencias de PHP y scripts de Symfony
├── composer.lock        # Registro exacto de versiones instaladas
├── compose.yaml         # Configuración de Docker/servicios (si aplica)
├── compose.override.yaml  # Override para Docker
├── phpunit.xml.dist     # Configuración para pruebas unitarias con PHPUnit
├── symfony.lock         # Registro de paquetes Symfony instalados
├── README.md            # Documentación general del proyecto
├── importmap.php        # Configuración de importmap para JS (Hotwire, Turbo, Stimulus)

├── assets               # Archivos de frontend: JS, CSS, controladores Stimulus
│   ├── app.js
│   ├── bootstrap.js
│   ├── controllers.json
│   ├── controllers
│   │   └── hello_controller.js   # Ejemplo de controlador JS de Stimulus
│   ├── styles
│   │   └── app.css               # CSS principal del proyecto
│   └── vendor                    # Librerías JS externas
│       ├── @hotwired
│       │   ├── stimulus
│       │   │   └── stimulus.index.js
│       │   └── turbo
│       │       └── turbo.index.js
│       └── installed.php         # Registro de dependencias JS instaladas

├── bin
│   ├── console         # Comando principal de Symfony CLI
│   └── phpunit         # Ejecutable PHPUnit para pruebas

├── config                 # Configuración de Symfony
│   ├── bundles.php        # Registro de bundles usados en la aplicación
│   ├── packages           # Configuración por paquete/bundle
│   │   ├── doctrine.yaml  # Configuración ORM/DB
│   │   ├── framework.yaml # Configuración del core de Symfony
│   │   ├── security.yaml  # Seguridad y roles
│   │   ├── mailer.yaml    # Configuración de envío de correos
│   │   ├── twig.yaml      # Configuración de plantillas
│   │   └── ...           # Otros paquetes: monolog, messenger, etc.
│   ├── preload.php       # Scripts cargados antes de Symfony
│   ├── routes            # Rutas agrupadas por funcionalidad
│   │   ├── framework.yaml
│   │   ├── security.yaml
│   │   └── web_profiler.yaml
│   └── services.yaml     # Servicios/Dependencias inyectables

├── migrations           # Archivos de migración de base de datos
│   ├── .gitignore
│   └── Version20260221033107.php

├── public
│   └── index.php         # Punto de entrada principal de la aplicación (web)

├── src                  # Código principal de la aplicación (PHP)
│   ├── Controller        # Controladores: manejan rutas y lógica de peticiones
│   │   ├── HomeController.php
│   │   ├── ProfileController.php
│   │   ├── RegistrationController.php
│   │   └── SecurityController.php
│   ├── DataFixtures      # Datos de prueba o iniciales para la base de datos
│   │   ├── AppFixtures.php
│   │   └── UserFixtures.php
│   ├── Entity            # Clases de entidades de Doctrine (modelos de BD)
│   │   └── User.php
│   ├── Form              # Formularios de Symfony
│   │   └── ProfileFormType.php
│   ├── Kernel.php        # Clase principal de la aplicación Symfony
│   ├── Repository        # Repositorios para consultas personalizadas de Doctrine
│   │   └── UserRepository.php
│   └── Security          # Clases relacionadas con autenticación y seguridad
│       ├── LoginFormAuthenticator.php
│       └── UserChecker.php

├── templates            # Plantillas Twig (vistas)
│   ├── base.html.twig    # Plantilla base (layout principal)
│   ├── home
│   │   └── index.html.twig
│   ├── profile
│   │   ├── form.html.twig
│   │   └── index.html.twig
│   ├── registration
│   │   └── register.html.twig
│   └── security
│       └── login.html.twig

├── tests                # Pruebas unitarias / funcionales
│   └── bootstrap.php

├── translations        # Archivos de traducción
│   └── .gitignore
```

## 🖥️ Cómo empezar en Windows (modo local)

### ✅ Requisitos Previos

Asegúrate de tener instalado lo siguiente en tu entorno Windows:

- [XAMPP](https://www.apachefriends.org/index.html) – Para tener php localmente.
- [Composer](https://getcomposer.org/) – Para gestionar dependencias PHP.
- [Git](https://git-scm.com/) – Para clonar el repositorio.
- [Visual Studio Code](https://code.visualstudio.com/) (opcional) – Editor de código recomendado.
- [Postman](https://www.postman.com/downloads/) – Para probar los endpoints de la API.
- [SQL Server Management Studio](https://learn.microsoft.com/es-es/ssms/install/install) – Para tener inreface visual de la base de datos.
- [SQL Server](https://www.microsoft.com/es-es/sql-server/sql-server-downloads) – Base de datos.
- [MySQL](https://www.mysql.com/downloads/) – (Opcional) Para la base de datos.

### 🛠️ Pasos para instalar y correr el proyecto

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/david99cartagena/gestion_usuarios.git

   ```

   ```bash
   cd gestion_usuarios
   ```

2. **Copiar el archivo de entorno `.env.example` a `.env`:**

   ```bash
   cp .env.example .env
   ```

   _Ejemplo de .env_

   ```env
   DATABASE_URL="sqlsrv://usuario:password@localhost:1433/nombre_db?charset=UTF-8"
   ```

3. **Instalar las dependencias de Laravel:**

   ```bash
   composer install
   ```

4. **Generar la clave de aplicación (Symfony secret):**

   ```bash
   php bin/console secrets:generate-keys
   ```

5. **Ejecutar migraciones para crear las tablas:**

   ```bash
   php bin/console doctrine:migrations:migrate
   ```

6. **Cargar datos de prueba (fixtures):**

   ```bash
   php bin/console doctrine:fixtures:load
   ```

   _Esto creará:_
   - Usuario de prueba: david@test.com / password: 123456
   - Roles de usuario
   - Otros datos opcionales según fixtures

7. **Levantar el servidor local de Symfony:**

   ```bash
   symfony server:start
   ```

   - La API estará disponible en:  
     `http://127.0.0.1:8000` o `http://localhost:8000/`
