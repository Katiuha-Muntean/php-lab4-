<?php

// Чтение данных из файла
$filePath = __DIR__ . '/../../storage/orders.json';
$books = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

// Фильтрация по жанру
$filteredBooks = [];

if (isset($_GET['tags']) && $_GET['tags']) {
    $genreFilter = $_GET['tags'];
    foreach ($books as $book) {
        if (isset($book['tags']) && in_array($genreFilter, $book['tags'])) {
            $filteredBooks[] = $book;
        }
    }
} else {
    $filteredBooks = $books;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Магазин мебели</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    <h2>Магазин мебели</h2>

    <!-- Форма фильтрации -->
    <form method="GET" action="">
        <label for="tags">Выберите тип мебели:</label>
        <select name="tags" id="tags">
            <option value="">Все</option>
            <option value="стол" <?= isset($_GET['tags']) && $_GET['tags'] == 'стол' ? 'selected' : '' ?>>стол</option>
            <option value="стул" <?= isset($_GET['tags']) && $_GET['tags'] == 'стул' ? 'selected' : '' ?>>стул</option>
            <option value="кровать" <?= isset($_GET['tags']) && $_GET['tags'] == 'кровать' ? 'selected' : '' ?>>кровать</option>
            <option value="диван" <?= isset($_GET['tags']) && $_GET['tags'] == 'диван' ? 'selected' : '' ?>>диван</option>
            <option value="шкаф" <?= isset($_GET['tags']) && $_GET['tags'] == 'шкаф' ? 'selected' : '' ?>>шкаф</option>
            <option value="кресло" <?= isset($_GET['tags']) && $_GET['tags'] == 'кресло' ? 'selected' : '' ?>>кресло</option>
        </select>
        <button type="submit">Фильтровать</button>
    </form>

    <?php if (empty($filteredBooks)): ?>
        <p>Нет мебели для отображения по выбранному типу.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($filteredBooks as $book): ?>
                <li>
                    <strong><?= htmlspecialchars($book['title']) ?></strong> - 
                    <em><?= htmlspecialchars($book['author']) ?></em><br>
                    <strong>Тип:</strong> <?= isset($book['tags']) && is_array($book['tags']) ? htmlspecialchars(implode(', ', $book['tags'])) : 'Не указан' ?><br>
                    <strong>Описание:</strong> <?= htmlspecialchars($book['description']) ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="create.php">Добавить заказ</a>

</body>
</html>
