<?php

function hashFunction($key, $size)
{
    // Utilizamos el último número de $key como valor hash
    return $key % $size;
}

function insertIntoHashTable($table, $key, $value, $size)
{
    $index = hashFunction($key, $size);

    // Aplicamos la prueba cuadrática para manejar colisiones
    $i = 1;
    while ($table[$index] !== null) {
        $index = ($index + $i * $i) % $size;
        $i++;
    }

    // Insertamos el valor en la posición encontrada
    $table[$index] = $value;

    return $table;
}

// Creamos una tabla hash de tamaño 8
$hashTable = array_fill(0, 8, null);

// Valores dados
$values = [147, 237, 121, 724, 100];

// Insertamos los valores en la tabla hash
foreach ($values as $value) {
    $hashTable = insertIntoHashTable($hashTable, $value, $value, 8);
}

// Mostramos la tabla hash
echo "<pre>";
print_r($hashTable);
echo "</pre>";
?>
