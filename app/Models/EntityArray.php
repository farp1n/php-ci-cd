<?php

declare(strict_types=1);

$contentTypes = [
    'Стаття',
    'Акція',
    'Тарифний план',
    'Новина',
    'Оголошення',
];
sort($contentTypes);

$contentItem = [
    'id' => 1,
    'title' => 'Як активувати роумінг у подорожі',
    'type' => 'Стаття',
    'status' => 'опубліковано',
    'views' => 1250,
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Сутності системи керування контентом</title>
</head>
<body>
    <h2>Типи контенту</h2>
    <ul>
        <?php foreach ($contentTypes as $type) { ?>
            <li><?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8') ?></li>
        <?php } ?>
    </ul>

    <h2>Контент-матеріал (об'єкт)</h2>
    <ul>
        <?php foreach ($contentItem as $key => $value) { ?>
            <li><strong><?= htmlspecialchars((string) $key, ENT_QUOTES, 'UTF-8') ?>:</strong>
                <?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?></li>
        <?php } ?>
    </ul>
</body>
</html>
