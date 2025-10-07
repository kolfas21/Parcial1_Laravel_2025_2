# Laravel API - Parcial 1

API REST desarrollada con Laravel 12 para gestión de libros y categorías.

## 📋 Requisitos

- PHP >= 8.2
- PostgreSQL >= 12
- Composer
- Extensiones PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, pgsql

## 🚀 Instalación

### 1. Clonar el repositorio
```bash
git clone <url-del-repositorio>
cd Parcial1_Laravel
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar variables de entorno
```bash
# Copiar el archivo de ejemplo
cp .env.example .env

# Generar APP_KEY
php artisan key:generate
```

### 4. Configurar base de datos en `.env`
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=tu_contraseña
```

### 5. Ejecutar migraciones y seeders
```bash
# Crear tablas en la base de datos
php artisan migrate

# Poblar con datos de prueba (10 categorías y 20 libros)
php artisan db:seed
```

### 6. Iniciar servidor de desarrollo
```bash
php artisan serve
```

La API estará disponible en: `http://localhost:8000`

## 📚 Estructura de la Base de Datos

### Tabla: `categories`
- `id_category` (PK): Identificador único
- `category_name`: Nombre de la categoría
- `category_description`: Descripción detallada
- `category_priority`: Prioridad (1-10)
- `category_status`: Estado activo/inactivo (boolean)

### Tabla: `books`
- `id_book` (PK): Identificador único
- `book_name`: Nombre del libro
- `book_author_name`: Nombre del autor
- `book_price`: Precio (double)
- `book_stock`: Cantidad en stock (integer)
- `book_status`: Estado disponible/no disponible (boolean)
- `category_id` (FK): Relación con categorías
- `barcode`: Código de barras (EAN-13)

**Relación:** Una categoría puede tener muchos libros (1:N)

## 🔌 Endpoints de la API

### Categorías

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/api/categories` | Listar todas las categorías |
| POST | `/api/categories` | Crear nueva categoría |
| GET | `/api/categories/{id}` | Ver detalle de categoría |
| PUT/PATCH | `/api/categories/{id}` | Actualizar categoría |
| DELETE | `/api/categories/{id}` | Eliminar categoría |
| GET | `/api/categories/active/with-books` | Listar categorías activas con sus libros |

### Libros

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/api/books` | Listar todos los libros |
| POST | `/api/books` | Crear nuevo libro |
| GET | `/api/books/{id}` | Ver detalle de libro (incluye categoría) |
| PUT/PATCH | `/api/books/{id}` | Actualizar libro |
| DELETE | `/api/books/{id}` | Eliminar libro |

## 📝 Ejemplos de Uso

### Crear una categoría
```bash
POST /api/categories
Content-Type: application/json

{
    "category_name": "Ciencia Ficción",
    "category_description": "Libros de ciencia ficción y fantasía",
    "category_priority": 5,
    "category_status": true
}
```

### Crear un libro
```bash
POST /api/books
Content-Type: application/json

{
    "book_name": "Dune",
    "book_author_name": "Frank Herbert",
    "book_price": 25.99,
    "book_stock": 15,
    "book_status": true,
    "category_id": 1,
    "barcode": "9780441172719"
}
```

### Ver categorías activas con sus libros
```bash
GET /api/categories/active/with-books
```

## ✅ Validaciones

### Categorías (Crear)
- `category_name`: Requerido, string, máximo 255 caracteres
- `category_description`: Requerido, string
- `category_priority`: Requerido, entero, mínimo 0
- `category_status`: Requerido, booleano

### Libros (Crear)
- `book_name`: Requerido, string, máximo 255 caracteres
- `book_author_name`: Requerido, string, máximo 255 caracteres
- `book_price`: Requerido, numérico, mínimo 0
- `book_stock`: Requerido, entero, mínimo 0
- `book_status`: Requerido, booleano
- `category_id`: Opcional, debe existir en la tabla categories
- `barcode`: Opcional, string, máximo 255 caracteres

## 🔧 Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear

# Refrescar base de datos (elimina todos los datos)
php artisan migrate:fresh --seed

# Ver rutas disponibles
php artisan route:list

# Ejecutar tests
php artisan test
```

## 📖 Documentación Adicional

Consulta el archivo `API_DOCUMENTATION.md` para documentación detallada de todos los endpoints.

## 🛠️ Tecnologías Utilizadas

- Laravel 12
- PHP 8.2
- PostgreSQL
- Laravel Sanctum (autenticación API)
- Faker (generación de datos de prueba)

## 👨‍💻 Desarrollo

Este proyecto utiliza:
- **Form Requests** para validaciones
- **Eloquent ORM** para relaciones de base de datos
- **Factories** y **Seeders** para datos de prueba
- **API Resources** para controladores RESTful

## 📄 Licencia

MIT License
