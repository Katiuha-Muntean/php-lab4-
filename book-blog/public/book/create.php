<?php
require_once __DIR__ . '/../../src/Handlers/CreateOrderHandler.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить заказ</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    <h2>Добавить новый заказ</h2>

    <form method="POST" action="">

        <label for="title">Тип заказа:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Заказчик:</label>
        <input type="text" id="author" name="author" required><br><br>

        <label for="tags">Тип мебели:</label>
        <select name="tags" id="tags" required>
            <option value="">Выберите тип мебели</option>
            <option value="стол">стол</option>
            <option value="стул">стул</option>
            <option value="кровать">кровать</option>
            <option value="диван">диван</option>
            <option value="шкаф">шкаф</option>
            <option value="кресло">кресло</option>
        </select><br><br>

        <label for="description">Описание заказа:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <button type="submit">Добавить заказ</button>
    </form>

</body>
</html>
