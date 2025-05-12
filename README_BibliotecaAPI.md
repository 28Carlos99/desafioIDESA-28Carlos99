# 📚 Biblioteca API RESTful con Laravel

Este proyecto es una API RESTful para gestionar autores y libros en una biblioteca, con autenticación por token usando Laravel Sanctum.

---

## 🚀 Requisitos

- PHP >= 7.4
- Composer
- PostgreSQL o MySQL
- Laravel >= 8
- Postman (opcional, para testeo)

---

## 🔧 Instalación

```bash
# 1. Clonar el proyecto
git clone https://github.com/tu-usuario/biblioteca-api.git
cd biblioteca-api

# 2. Instalar dependencias
composer install

# 3. Copiar archivo de entorno
cp .env.example .env

# 4. Generar clave de aplicación
php artisan key:generate

# 5. Configurar la base de datos en .env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=biblioteca
DB_USERNAME=postgres
DB_PASSWORD=tu_password
```

---

## 🧱 Migraciones

```bash
php artisan migrate
```

> Asegurate de que la base de datos esté creada antes de correr las migraciones.

---

## ▶️ Servidor de desarrollo

```bash
php artisan serve
```

Accedé a la API desde:  
`http://127.0.0.1:8000`

---

## 🔐 Autenticación

La API utiliza **Laravel Sanctum** para autenticación por token.

### Rutas de autenticación:

- `POST /api/auth/register`
- `POST /api/auth/login`
- `POST /api/auth/logout` (requiere token)

---

## 📘 Endpoints Principales

Todos los endpoints protegidos requieren header:

```http
Authorization: Bearer {token}
```

| Recurso | Método | Endpoint                | Descripción           |
|---------|--------|--------------------------|-----------------------|
| Auth    | POST   | /api/auth/register       | Registro de usuario   |
| Auth    | POST   | /api/auth/login          | Login y obtención token |
| Auth    | POST   | /api/auth/logout         | Logout del usuario    |
| Authors | GET    | /api/authors             | Listar autores        |
| Authors | GET    | /api/authors/{id}        | Ver autor por ID      |
| Authors | POST   | /api/authors             | Crear autor           |
| Authors | PUT    | /api/authors/{id}        | Actualizar autor      |
| Authors | DELETE | /api/authors/{id}        | Eliminar autor        |
| Books   | GET    | /api/books               | Listar libros         |
| Books   | GET    | /api/books/{id}          | Ver libro por ID      |
| Books   | POST   | /api/books               | Crear libro           |
| Books   | PUT    | /api/books/{id}          | Actualizar libro      |
| Books   | DELETE | /api/books/{id}          | Eliminar libro        |

---

## 🧪 Postman Collection

1. Abrí Postman.
2. Importá el archivo:  
   `BibliotecaAPI_Full.postman_collection.json`
3. Definí la variable de entorno:  
   `{{base_url}} = http://127.0.0.1:8000`
4. Usá el token obtenido en login para los endpoints protegidos (`{{token}}`).

---

## 📝 Licencia

Este proyecto es de uso educativo o libre para pruebas. Podés adaptarlo según tus necesidades.