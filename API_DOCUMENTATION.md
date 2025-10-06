# TALLER LARAVEL API - Sistema de Gestión de Libros

Este proyecto es una API REST desarrollada con Laravel para la gestión de una biblioteca de libros, implementando todas las operaciones CRUD (Create, Read, Update, Delete).

## 📋 Características Implementadas

### 1. ✅ Migración de Base de Datos
- Tabla `books` con las siguientes columnas (exactamente como se especifica en el diagrama):
  - `id_book` (bigint, primary key, auto-increment)
  - `book_name` (varchar, required)
  - `book_author_name` (varchar, required)  
  - `book_price` (double, required)
  - `book_stock` (integer, required)
  - `book_status` (boolean, required)

### 2. ✅ Modelo Eloquent
- Modelo `Book` con propiedad `$fillable` definida
- Cast automático de tipos de datos
- Trait `HasFactory` para trabajar con factories

### 3. ✅ Controlador API Resource
- `BookController` con los 5 métodos básicos:
  - `index()` - Listar todos los libros
  - `store()` - Crear un nuevo libro
  - `show()` - Mostrar un libro específico  
  - `update()` - Actualizar un libro existente
  - `destroy()` - Eliminar un libro

### 4. ✅ Form Requests
- `StoreBookRequest` - Validación para crear libros
- `UpdateBookRequest` - Validación para actualizar libros
- Reglas de validación personalizadas con mensajes en español

### 5. ✅ Rutas API Resource  
- Rutas registradas en `routes/api.php`
- Utilizando `Route::apiResource('books', BookController::class)`

### 6. ✅ Factory
- `BookFactory` para generar datos falsos/dummy
- Utiliza Faker para crear datos realistas

### 7. ✅ Seeder
- `BookSeeder` que utiliza el factory para crear 20 libros de ejemplo
- Registrado en `DatabaseSeeder` para ejecución automática

## 🚀 Instalación y Configuración

### Requisitos
- PHP 8.1+
- PostgreSQL
- Composer

### Pasos de instalación

1. **Clonar el repositorio**
   ```bash
   git clone [url-del-repositorio]
   cd TALLER-LARAVEL-API
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar base de datos**
   Editar el archivo `.env` con las siguientes credenciales:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=laravel
   DB_USERNAME=postgres
   DB_PASSWORD=950430
   ```

4. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

5. **Poblar la base de datos con datos de ejemplo**
   ```bash
   php artisan db:seed --class=BookSeeder
   ```

6. **Iniciar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```

## 📚 Documentación de la API

### Base URL
```
http://127.0.0.1:8000/api
```

### Endpoints Disponibles

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET    | `/books` | Obtener todos los libros |
| POST   | `/books` | Crear un nuevo libro |
| GET    | `/books/{id}` | Obtener un libro específico |
| PUT/PATCH | `/books/{id}` | Actualizar un libro |
| DELETE | `/books/{id}` | Eliminar un libro |

### Ejemplos de Uso

#### 1. Obtener todos los libros
```bash
curl -X GET http://127.0.0.1:8000/api/books
```

#### 2. Crear un nuevo libro
```bash
curl -X POST http://127.0.0.1:8000/api/books \
  -H "Content-Type: application/json" \
  -d '{
    "book_name": "El Quijote de La Mancha",
    "book_author_name": "Miguel de Cervantes",
    "book_price": 25.99,
    "book_stock": 15,
    "book_status": true
  }'
```

#### 3. Obtener un libro específico
```bash
curl -X GET http://127.0.0.1:8000/api/books/1
```

#### 4. Actualizar un libro
```bash
curl -X PUT http://127.0.0.1:8000/api/books/1 \
  -H "Content-Type: application/json" \
  -d '{
    "book_name": "Don Quijote de La Mancha - Edición Especial",
    "book_price": 29.99,
    "book_stock": 20
  }'
```

#### 5. Eliminar un libro
```bash
curl -X DELETE http://127.0.0.1:8000/api/books/1
```

## 📝 Reglas de Validación

### Para crear un libro (POST):
- `book_name`: Obligatorio, máximo 255 caracteres
- `book_author_name`: Obligatorio, máximo 255 caracteres
- `book_price`: Obligatorio, numérico, mínimo 0
- `book_stock`: Obligatorio, entero, mínimo 0
- `book_status`: Obligatorio, booleano

### Para actualizar un libro (PUT/PATCH):
- `book_name`: Opcional, máximo 255 caracteres
- `book_author_name`: Opcional, máximo 255 caracteres
- `book_price`: Opcional, numérico, mínimo 0
- `book_stock`: Opcional, entero, mínimo 0
- `book_status`: Opcional, booleano

## 🗃️ Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   └── BookController.php
│   └── Requests/
│       ├── StoreBookRequest.php
│       └── UpdateBookRequest.php
└── Models/
    └── Book.php

database/
├── factories/
│   └── BookFactory.php
├── migrations/
│   └── 2025_09_29_012139_create_books_table.php
└── seeders/
    ├── BookSeeder.php
    └── DatabaseSeeder.php

routes/
└── api.php
```

## 🧪 Datos de Ejemplo

El proyecto incluye un seeder que crea automáticamente 20 libros con datos falsos pero realistas, incluyendo:
- Títulos generados automáticamente
- Nombres de autores ficticios
- ISBNs únicos de 13 dígitos
- Precios entre $9.99 y $999.99
- Stock entre 0 y 100 unidades
- Fechas de publicación de los últimos 20 años
- Editoriales ficticias
- Idiomas variados (es, en, fr, de, pt)
- Páginas entre 50 y 1200
- Disponibilidad aleatoria (80% disponibles)

## ✨ Características Técnicas

- **Framework**: Laravel 11
- **Base de datos**: PostgreSQL
- **Autenticación**: Laravel Sanctum (configurado)
- **Validación**: Form Requests con reglas personalizadas
- **Respuestas**: JSON para todas las operaciones
- **Códigos HTTP**: Implementación correcta de códigos de estado
- **Factory & Seeder**: Generación automática de datos de prueba

## 🎯 Cumplimiento de Requisitos

✅ **1. Migración de tabla con restricciones de tipos de datos**  
✅ **2. Modelo Eloquent con $fillable definido**  
✅ **3. Controlador API Resource con 5 métodos básicos**  
✅ **4. Form Requests para validación de creación y actualización**  
✅ **5. Rutas apiResource para operaciones CRUD**  
✅ **6. Factory para datos falsos/dummy**  
✅ **7. Seeder implementado para llamado del factory**  

## 🔧 Comandos Útiles

```bash
# Ver todas las rutas
php artisan route:list

# Ver solo rutas de API
php artisan route:list --path=api

# Ejecutar migraciones
php artisan migrate

# Ejecutar seeders
php artisan db:seed

# Ejecutar solo BookSeeder
php artisan db:seed --class=BookSeeder

# Generar nueva clave de aplicación
php artisan key:generate

# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

---

**Desarrollo completado siguiendo exactamente las instrucciones del taller Laravel API.**