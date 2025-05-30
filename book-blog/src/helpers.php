<?php

/**
 * Валидация данных формы заказа мебели.
 */
function validateOrderForm($customerName, $furnitureType, $material, $dimensions)
{
    $errors = [];

    if (empty($customerName)) {
        $errors[] = 'Имя заказчика не может быть пустым.';
    }

    if (empty($furnitureType)) {
        $errors[] = 'Тип мебели обязателен.';
    }

    if (empty($material)) {
        $errors[] = 'Материал не указан.';
    }

    if (empty($dimensions)) {
        $errors[] = 'Габариты должны быть указаны.';
    }

    return $errors;
}

/**
 * Сохраняет массив данных в JSON-файл.
 */
function saveDataToFile($filePath, $data)
{
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents($filePath, $json);
}
?>
