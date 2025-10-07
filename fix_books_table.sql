-- Script para agregar category_id y barcode a la tabla books
ALTER TABLE books ADD COLUMN IF NOT EXISTS category_id BIGINT NULL;
ALTER TABLE books ADD COLUMN IF NOT EXISTS barcode VARCHAR(255) NULL;

-- Agregar llave foránea
ALTER TABLE books ADD CONSTRAINT fk_books_category 
FOREIGN KEY (category_id) REFERENCES categories(id_category) ON DELETE SET NULL;

-- Verificar columnas
SELECT column_name, data_type 
FROM information_schema.columns 
WHERE table_name = 'books';
