-- Verificar estructura de la tabla books
SELECT 
    column_name, 
    data_type, 
    character_maximum_length,
    is_nullable
FROM information_schema.columns 
WHERE table_name = 'books'
ORDER BY ordinal_position;
