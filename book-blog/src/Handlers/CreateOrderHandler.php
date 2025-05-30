<?php

// Инициализация переменных для полей формы
$customerName = isset($_POST['customer_name']) ? htmlspecialchars($_POST['customer_name'], ENT_QUOTES, 'UTF-8') : '';
$furnitureType = isset($_POST['furniture_type']) ? htmlspecialchars($_POST['furniture_type'], ENT_QUOTES, 'UTF-8') : '';
$material = isset($_POST['material']) ? htmlspecialchars($_POST['material'], ENT_QUOTES, 'UTF-8') : '';
$dimensions = isset($_POST['dimensions']) ? htmlspecialchars($_POST['dimensions'], ENT_QUOTES, 'UTF-8') : '';
$notes = isset($_POST['notes']) ? htmlspecialchars($_POST['notes'], ENT_QUOTES, 'UTF-8') : '';

// Обработка данных из формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../helpers.php';

    $errors = validateOrderForm($customerName, $furnitureType, $material, $dimensions);

    if (empty($errors)) {
        // Загрузка существующих заказов
        $filePath = __DIR__ . '/../../storage/orders.json';
        $orders = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        // Добавляем новый заказ
        $orders[] = [
            'customer_name' => $customerName,
            'furniture_type' => $furnitureType,
            'material' => $material,
            'dimensions' => $dimensions,
            'notes' => $notes,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        saveDataToFile($filePath, $orders);
        header('Location: /success.html');
        exit;
    }
}
?>
