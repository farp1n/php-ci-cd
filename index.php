<?php

declare(strict_types=1);

use Faker\Factory;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/app/Services/EntityService.php';
require_once __DIR__.'/app/Services/DataProcessor.php';

$faker = Factory::create();

$prices = [];
for ($i = 0; $i < 10; $i++) {
    $prices[] = $faker->randomFloat(2, 20, 200);
}

$minThreshold = 50.0;

$filteredPrices = array_filter($prices, function (float $price) use ($minThreshold): bool {
    return $price > $minThreshold;
});

echo '<h2>Тарифи оренди (>$minThreshold грн/год)</h2><ul>';
foreach ($filteredPrices as $price) {
    echo '<li>'.number_format($price, 2, '.', ' ').' грн/год</li>';
}
echo '</ul>';

$minutes = 30;
$ratePerMin = 3.5;
echo '<p>Вартість поїздки ('.$minutes.' хв × '.$ratePerMin.' грн/хв): '
    .number_format(calculateRideCost($minutes, $ratePerMin), 2, '.', ' ').' грн</p>';

try {
    applyDiscount(1000.0, 150.0);
} catch (Exception $e) {
    echo '<p>Помилка: '.htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8').'</p>';
} finally {
    echo '<p>Спроба розрахунку знижки завершена.</p>';
}

echo '<h2>Тести DataProcessor</h2>';
echo '<ul>';
echo '<li>minDigit(1234076) = '.minDigit(1234076).'</li>';
echo '<li>minDigit(77777) = '.minDigit(77777).'</li>';
echo '<li>swapFirstAndLastWord("самокат екологічний швидкий") = '
    .swapFirstAndLastWord('самокат екологічний швидкий').'</li>';
echo '<li>digitsFirstThenLetters("scooter4u2fast9") = '
    .digitsFirstThenLetters('scooter4u2fast9').'</li>';
echo '</ul>';
