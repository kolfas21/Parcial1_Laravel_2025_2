# API REST - Sistema de Gestión de Libros y Categorías# TALLER LARAVEL API - Sistema de Gestión de Libros



Este proyecto es una API REST desarrollada con Laravel para la gestión de una biblioteca de libros con categorías, implementando todas las operaciones CRUD (Create, Read, Update, Delete) y relaciones entre entidades.Este proyecto es una API REST desarrollada con Laravel para la gestión de una biblioteca de libros, implementando todas las operaciones CRUD (Create, Read, Update, Delete).



## 📋 Características Implementadas## 📋 Características Implementadas



### 1. ✅ Base de Datos Relacional### 1. ✅ Migración de Base de Datos

- **Tabla `categories`:**- Tabla `books` con las siguientes columnas (exactamente como se especifica en el diagrama):

  - `id_category` (bigint, primary key, auto-increment)  - `id_book` (bigint, primary key, auto-increment)

  - `category_name` (varchar, required)  - `book_name` (varchar, required)

  - `category_description` (text, required)    - `book_author_name` (varchar, required)  

  - `category_priority` (integer, required)  - `book_price` (double, required)

  - `category_status` (boolean, required)  - `book_stock` (integer, required)

  - `book_status` (boolean, required)

- **Tabla `books`:**

  - `id_book` (bigint, primary key, auto-increment)### 2. ✅ Modelo Eloquent

  - `book_name` (varchar, required)- Modelo `Book` con propiedad `$fillable` definida

  - `book_author_name` (varchar, required)  - Cast automático de tipos de datos

  - `book_price` (double, required)- Trait `HasFactory` para trabajar con factories

  - `book_stock` (integer, required)

  - `book_status` (boolean, required)### 3. ✅ Controlador API Resource

  - `category_id` (bigint, foreign key nullable)- `BookController` con los 5 métodos básicos:

  - `barcode` (varchar, nullable)  - `index()` - Listar todos los libros

  - `store()` - Crear un nuevo libro

**Relación:** Una categoría puede tener muchos libros (1:N). Los libros pueden existir sin categoría.  - `show()` - Mostrar un libro específico  

  - `update()` - Actualizar un libro existente

### 2. ✅ Modelos Eloquent  - `destroy()` - Eliminar un libro

- **Modelo `Category`** con relación `hasMany(Book)`

- **Modelo `Book`** con relación `belongsTo(Category)`### 4. ✅ Form Requests

- Cast automático de tipos de datos (boolean, double)- `StoreBookRequest` - Validación para crear libros

- Trait `HasFactory` para trabajar con factories- `UpdateBookRequest` - Validación para actualizar libros

- Reglas de validación personalizadas con mensajes en español

### 3. ✅ Controladores API Resource

- **`CategoryController`** con CRUD completo + método personalizado### 5. ✅ Rutas API Resource  

- **`BookController`** con CRUD completo + eager loading de categoría- Rutas registradas en `routes/api.php`

- Respuestas JSON con códigos HTTP apropiados- Utilizando `Route::apiResource('books', BookController::class)`



### 4. ✅ Form Requests### 6. ✅ Factory

- `StoreCategoryRequest` / `UpdateCategoryRequest`- `BookFactory` para generar datos falsos/dummy

- `StoreBookRequest` / `UpdateBookRequest`- Utiliza Faker para crear datos realistas

- Validación de relaciones (foreign key exists)

- Mensajes de error personalizados en español### 7. ✅ Seeder

- `BookSeeder` que utiliza el factory para crear 20 libros de ejemplo

### 5. ✅ Rutas API Resource  - Registrado en `DatabaseSeeder` para ejecución automática

- Rutas para categorías y libros

- Ruta personalizada para categorías activas con sus libros## 🚀 Instalación y Configuración

- Registradas en `routes/api.php`

### Requisitos

### 6. ✅ Factories- PHP 8.1+

- `CategoryFactory` - Genera categorías con datos realistas- PostgreSQL

- `BookFactory` - Genera libros con códigos de barras EAN-13- Composer



### 7. ✅ Seeders### Pasos de instalación

- `CategorySeeder` - Crea 10 categorías

- `BookSeeder` - Crea 20 libros con categorías asignadas1. **Clonar el repositorio**

- Orden de ejecución respetando dependencias (categorías primero)   ```bash

   git clone [url-del-repositorio]

## 🚀 Instalación y Configuración   cd TALLER-LARAVEL-API

   ```

### Requisitos

- PHP >= 8.22. **Instalar dependencias**

- PostgreSQL >= 12   ```bash

- Composer   composer install

   ```

### Pasos de instalación

3. **Configurar base de datos**

1. **Clonar el repositorio**   Editar el archivo `.env` con las siguientes credenciales:

   ```bash   ```env

   git clone [url-del-repositorio]   DB_CONNECTION=pgsql

   cd Parcial1_Laravel   DB_HOST=127.0.0.1

   ```   DB_PORT=5432

   DB_DATABASE=laravel

2. **Instalar dependencias**   DB_USERNAME=postgres

   ```bash   DB_PASSWORD=950430

   composer install   ```

   ```

4. **Ejecutar migraciones**

3. **Configurar variables de entorno**   ```bash

   ```bash   php artisan migrate

   cp .env.example .env   ```

   php artisan key:generate

   ```5. **Poblar la base de datos con datos de ejemplo**

   ```bash

4. **Configurar base de datos**   php artisan db:seed --class=BookSeeder

   Editar el archivo `.env`:   ```

   ```env

   DB_CONNECTION=pgsql6. **Iniciar el servidor de desarrollo**

   DB_HOST=127.0.0.1   ```bash

   DB_PORT=5432   php artisan serve

   DB_DATABASE=laravel   ```

   DB_USERNAME=postgres

   DB_PASSWORD=tu_contraseña## 📚 Documentación de la API

   ```

### Base URL

5. **Ejecutar migraciones**```

   ```bashhttp://127.0.0.1:8000/api

   php artisan migrate```

   ```

### Endpoints Disponibles

6. **Poblar la base de datos con datos de ejemplo**

   ```bash| Método | Endpoint | Descripción |

   php artisan db:seed|--------|----------|-------------|

   ```| GET    | `/books` | Obtener todos los libros |

| POST   | `/books` | Crear un nuevo libro |

7. **Iniciar el servidor de desarrollo**| GET    | `/books/{id}` | Obtener un libro específico |

   ```bash| PUT/PATCH | `/books/{id}` | Actualizar un libro |

   php artisan serve| DELETE | `/books/{id}` | Eliminar un libro |

   ```

### Ejemplos de Uso

## 📚 Documentación de la API

#### 1. Obtener todos los libros

### Base URL```bash

```curl -X GET http://127.0.0.1:8000/api/books

http://127.0.0.1:8000/api```

```

#### 2. Crear un nuevo libro

### Endpoints Disponibles```bash

curl -X POST http://127.0.0.1:8000/api/books \

#### Categorías  -H "Content-Type: application/json" \

  -d '{

| Método | Endpoint | Descripción |    "book_name": "El Quijote de La Mancha",

|--------|----------|-------------|    "book_author_name": "Miguel de Cervantes",

| GET    | `/categories` | Listar todas las categorías |    "book_price": 25.99,

| POST   | `/categories` | Crear nueva categoría |    "book_stock": 15,

| GET    | `/categories/{id}` | Ver detalle de categoría |    "book_status": true

| PUT/PATCH | `/categories/{id}` | Actualizar categoría |  }'

| DELETE | `/categories/{id}` | Eliminar categoría |```

| GET    | `/categories/active/with-books` | Listar categorías activas con sus libros |

#### 3. Obtener un libro específico

#### Libros```bash

curl -X GET http://127.0.0.1:8000/api/books/1

| Método | Endpoint | Descripción |```

|--------|----------|-------------|

| GET    | `/books` | Listar todos los libros |#### 4. Actualizar un libro

| POST   | `/books` | Crear nuevo libro |```bash

| GET    | `/books/{id}` | Ver detalle de libro (incluye categoría) |curl -X PUT http://127.0.0.1:8000/api/books/1 \

| PUT/PATCH | `/books/{id}` | Actualizar libro |  -H "Content-Type: application/json" \

| DELETE | `/books/{id}` | Eliminar libro |  -d '{

    "book_name": "Don Quijote de La Mancha - Edición Especial",

### Ejemplos de Uso    "book_price": 29.99,

    "book_stock": 20

#### 1. Listar todas las categorías  }'

```bash```

GET http://127.0.0.1:8000/api/categories

```#### 5. Eliminar un libro

```bash

**Respuesta:**curl -X DELETE http://127.0.0.1:8000/api/books/1

```json```

[

  {## 📝 Reglas de Validación

    "id_category": 1,

    "category_name": "Ciencia Ficción",### Para crear un libro (POST):

    "category_description": "Libros de ciencia ficción y fantasía",- `book_name`: Obligatorio, máximo 255 caracteres

    "category_priority": 8,- `book_author_name`: Obligatorio, máximo 255 caracteres

    "category_status": true- `book_price`: Obligatorio, numérico, mínimo 0

  }- `book_stock`: Obligatorio, entero, mínimo 0

]- `book_status`: Obligatorio, booleano

```

### Para actualizar un libro (PUT/PATCH):

#### 2. Crear una nueva categoría- `book_name`: Opcional, máximo 255 caracteres

```bash- `book_author_name`: Opcional, máximo 255 caracteres

POST http://127.0.0.1:8000/api/categories- `book_price`: Opcional, numérico, mínimo 0

Content-Type: application/json- `book_stock`: Opcional, entero, mínimo 0

- `book_status`: Opcional, booleano

{

  "category_name": "Novela Histórica",## 🗃️ Estructura del Proyecto

  "category_description": "Novelas ambientadas en diferentes épocas históricas",

  "category_priority": 5,```

  "category_status": trueapp/

}├── Http/

```│   ├── Controllers/

│   │   └── BookController.php

**Respuesta (201 Created):**│   └── Requests/

```json│       ├── StoreBookRequest.php

{│       └── UpdateBookRequest.php

  "id_category": 11,└── Models/

  "category_name": "Novela Histórica",    └── Book.php

  "category_description": "Novelas ambientadas en diferentes épocas históricas",

  "category_priority": 5,database/

  "category_status": true├── factories/

}│   └── BookFactory.php

```├── migrations/

│   └── 2025_09_29_012139_create_books_table.php

#### 3. Obtener categorías activas con sus libros└── seeders/

```bash    ├── BookSeeder.php

GET http://127.0.0.1:8000/api/categories/active/with-books    └── DatabaseSeeder.php

```

routes/

**Respuesta:**└── api.php

```json```

[

  {## 🧪 Datos de Ejemplo

    "id_category": 1,

    "category_name": "Ciencia Ficción",El proyecto incluye un seeder que crea automáticamente 20 libros con datos falsos pero realistas, incluyendo:

    "category_description": "Libros de ciencia ficción y fantasía",- Títulos generados automáticamente

    "category_priority": 8,- Nombres de autores ficticios

    "category_status": true,- ISBNs únicos de 13 dígitos

    "books": [- Precios entre $9.99 y $999.99

      {- Stock entre 0 y 100 unidades

        "id_book": 1,- Fechas de publicación de los últimos 20 años

        "book_name": "Dune",- Editoriales ficticias

        "book_author_name": "Frank Herbert",- Idiomas variados (es, en, fr, de, pt)

        "book_price": 25.99,- Páginas entre 50 y 1200

        "book_stock": 15,- Disponibilidad aleatoria (80% disponibles)

        "book_status": true,

        "category_id": 1,## ✨ Características Técnicas

        "barcode": "9780441172719"

      }- **Framework**: Laravel 11

    ]- **Base de datos**: PostgreSQL

  }- **Autenticación**: Laravel Sanctum (configurado)

]- **Validación**: Form Requests con reglas personalizadas

```- **Respuestas**: JSON para todas las operaciones

- **Códigos HTTP**: Implementación correcta de códigos de estado

#### 4. Crear un nuevo libro- **Factory & Seeder**: Generación automática de datos de prueba

```bash

POST http://127.0.0.1:8000/api/books## 🎯 Cumplimiento de Requisitos

Content-Type: application/json

✅ **1. Migración de tabla con restricciones de tipos de datos**  

{✅ **2. Modelo Eloquent con $fillable definido**  

  "book_name": "1984",✅ **3. Controlador API Resource con 5 métodos básicos**  

  "book_author_name": "George Orwell",✅ **4. Form Requests para validación de creación y actualización**  

  "book_price": 18.50,✅ **5. Rutas apiResource para operaciones CRUD**  

  "book_stock": 25,✅ **6. Factory para datos falsos/dummy**  

  "book_status": true,✅ **7. Seeder implementado para llamado del factory**  

  "category_id": 1,

  "barcode": "9780451524935"## 🔧 Comandos Útiles

}

``````bash

# Ver todas las rutas

**Respuesta (201 Created):**php artisan route:list

```json

{# Ver solo rutas de API

  "id_book": 21,php artisan route:list --path=api

  "book_name": "1984",

  "book_author_name": "George Orwell",# Ejecutar migraciones

  "book_price": 18.50,php artisan migrate

  "book_stock": 25,

  "book_status": true,# Ejecutar seeders

  "category_id": 1,php artisan db:seed

  "barcode": "9780451524935"

}# Ejecutar solo BookSeeder

```php artisan db:seed --class=BookSeeder



#### 5. Obtener un libro con su categoría# Generar nueva clave de aplicación

```bashphp artisan key:generate

GET http://127.0.0.1:8000/api/books/1

```# Limpiar cache

php artisan cache:clear

**Respuesta:**php artisan config:clear

```jsonphp artisan route:clear

{```

  "id_book": 1,

  "book_name": "Dune",---

  "book_author_name": "Frank Herbert",

  "book_price": 25.99,**Desarrollo completado siguiendo exactamente las instrucciones del taller Laravel API.**
  "book_stock": 15,
  "book_status": true,
  "category_id": 1,
  "barcode": "9780441172719",
  "category": {
    "id_category": 1,
    "category_name": "Ciencia Ficción",
    "category_description": "Libros de ciencia ficción y fantasía",
    "category_priority": 8,
    "category_status": true
  }
}
```

#### 6. Actualizar un libro
```bash
PUT http://127.0.0.1:8000/api/books/1
Content-Type: application/json

{
  "book_price": 22.99,
  "book_stock": 30
}
```

**Respuesta (200 OK):**
```json
{
  "id_book": 1,
  "book_name": "Dune",
  "book_author_name": "Frank Herbert",
  "book_price": 22.99,
  "book_stock": 30,
  "book_status": true,
  "category_id": 1,
  "barcode": "9780441172719"
}
```

#### 7. Eliminar una categoría
```bash
DELETE http://127.0.0.1:8000/api/categories/5
```

**Respuesta (204 No Content)**

## 📝 Reglas de Validación

### Para crear una categoría (POST):
- `category_name`: Obligatorio, string, máximo 255 caracteres
- `category_description`: Obligatorio, string
- `category_priority`: Obligatorio, entero, mínimo 0
- `category_status`: Obligatorio, booleano

### Para actualizar una categoría (PUT/PATCH):
- Todos los campos son opcionales
- Mismas reglas de validación cuando se envían

### Para crear un libro (POST):
- `book_name`: Obligatorio, string, máximo 255 caracteres
- `book_author_name`: Obligatorio, string, máximo 255 caracteres
- `book_price`: Obligatorio, numérico, mínimo 0
- `book_stock`: Obligatorio, entero, mínimo 0
- `book_status`: Obligatorio, booleano
- `category_id`: Opcional, debe existir en la tabla categories
- `barcode`: Opcional, string, máximo 255 caracteres

### Para actualizar un libro (PUT/PATCH):
- Todos los campos son opcionales
- Mismas reglas de validación cuando se envían
- `category_id`: Valida que exista si se envía

## 🗃️ Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── BookController.php
│   │   └── CategoryController.php
│   └── Requests/
│       ├── StoreBookRequest.php
│       ├── UpdateBookRequest.php
│       ├── StoreCategoryRequest.php
│       └── UpdateCategoryRequest.php
└── Models/
    ├── Book.php
    └── Category.php

database/
├── factories/
│   ├── BookFactory.php
│   └── CategoryFactory.php
├── migrations/
│   ├── 2025_09_29_012139_create_books_table.php
│   ├── 2025_10_06_231210_create_categories_table.php
│   └── 2025_10_06_233020_add_category_id_and_barcode_to_books_table.php
└── seeders/
    ├── BookSeeder.php
    ├── CategorySeeder.php
    └── DatabaseSeeder.php

routes/
└── api.php
```

## 🧪 Datos de Ejemplo

El proyecto incluye seeders que crean automáticamente:
- **10 categorías** con nombres, descripciones, prioridades y estados variados
- **20 libros** con:
  - Nombres de autores ficticios
  - Precios variados
  - Stock entre 0 y 100 unidades
  - Estados aleatorios (80% activos)
  - Códigos de barras EAN-13 únicos
  - Categorías asignadas aleatoriamente

## ✨ Características Técnicas

- **Framework**: Laravel 12
- **Base de datos**: PostgreSQL
- **Autenticación**: Laravel Sanctum (configurado pero no utilizado en este proyecto)
- **Validación**: Form Requests con reglas personalizadas y mensajes en español
- **Respuestas**: JSON para todas las operaciones
- **Códigos HTTP**: Implementación correcta de códigos de estado
- **Relaciones**: Eloquent ORM con eager loading
- **Factory & Seeder**: Generación automática de datos de prueba

## 🎯 Requisitos Implementados

✅ **1. Tabla de Categorías con 4 tipos de datos diferentes**  
✅ **2. CRUD completo de Categorías con controlador API Resource**  
✅ **3. Validación con Form Requests independientes (Store/Update)**  
✅ **4. Relación 1:N entre Categorías y Libros (foreign key + barcode)**  
✅ **5. Relaciones Eloquent bidireccionales (hasMany/belongsTo)**  
✅ **6. Eager loading en método show() de libros**  
✅ **7. Factory y Seeder para Categorías con datos realistas**  
✅ **8. Método adicional: categorías activas con sus libros**  

## 🔧 Comandos Útiles

```bash
# Ver todas las rutas
php artisan route:list

# Ejecutar migraciones desde cero
php artisan migrate:fresh

# Ejecutar migraciones y seeders
php artisan migrate:fresh --seed

# Ejecutar solo seeders
php artisan db:seed

# Limpiar caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Ver detalles de una ruta específica
php artisan route:list --path=books

# Ejecutar tests
php artisan test
```

## ⚠️ Notas Importantes

1. **Orden de Seeders**: Es crítico que `CategorySeeder` se ejecute ANTES que `BookSeeder` debido a la relación de foreign key.

2. **Primary Keys Personalizadas**: Los modelos utilizan `id_category` e `id_book` en lugar del estándar `id` de Laravel.

3. **Timestamps Deshabilitados**: Los modelos no utilizan timestamps automáticos (`created_at`, `updated_at`).

4. **Foreign Key Nullable**: Los libros pueden existir sin categoría asignada (`category_id` es nullable).

5. **Ruta Personalizada**: La ruta `/categories/active/with-books` debe estar definida ANTES de `apiResource` para evitar conflictos de rutas.

## 📊 Códigos de Respuesta HTTP

| Código | Descripción | Uso |
|--------|-------------|-----|
| 200 | OK | Operación exitosa (GET, PUT, PATCH) |
| 201 | Created | Recurso creado exitosamente (POST) |
| 204 | No Content | Eliminación exitosa (DELETE) |
| 404 | Not Found | Recurso no encontrado |
| 422 | Unprocessable Entity | Errores de validación |

---

**Proyecto desarrollado siguiendo las especificaciones del Primer Parcial Laravel - API**
