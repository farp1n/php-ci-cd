<?php

declare(strict_types=1);

$transportTypes = [
    'Електросамокат',
    'Електровелосипед',
    'Електроскутер',
    'Моноколесо',
    'Сигвей',
];
sort($transportTypes);

$scooter = [
    'id' => 1,
    'model' => 'Xiaomi Mi Electric Scooter 4',
    'rate_per_min' => 3.50,
    'available' => true,
    'battery_level' => 87,
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Сутності мікромобільності</title>
</head>
<body>
    <h2>Типи транспорту</h2>
    <ul>
        <?php foreach ($transportTypes as $type) { ?>
            <li><?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8') ?></li>
        <?php } ?>
    </ul>

    <h2>Самокат (об'єкт)</h2>
    <ul>
        <?php foreach ($scooter as $key => $value) { ?>
            <li><strong><?= htmlspecialchars((string) $key, ENT_QUOTES, 'UTF-8') ?>:</strong>
                <?= htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') ?></li>
        <?php } ?>
    </ul>
</body>
</html>
