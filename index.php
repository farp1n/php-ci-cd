<?php

declare(strict_types=1);

use Faker\Factory;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/app/Services/EntityService.php';
require_once __DIR__.'/app/Services/DataProcessor.php';

$faker = Factory::create();

$packagePrices = [];
for ($i = 0; $i < 10; $i++) {
    $packagePrices[] = $faker->randomFloat(2, 50, 500);
}

$minThreshold = 100.0;

$filteredPrices = array_filter($packagePrices, function (float $price) use ($minThreshold): bool {
    return $price > $minThreshold;
});

echo '<h2>Тарифні пакети (ціна > $minThreshold грн/міс)</h2><ul>';
foreach ($filteredPrices as $price) {
    echo '<li>'.number_format($price, 2, '.', ' ').' грн/міс</li>';
}
echo '</ul>';

$months = 12;
$monthlyFee = 150.0;
echo '<p>Вартість підписки ('.$months.' міс × '.$monthlyFee.' грн/міс): '
    .number_format(calculateSubscriptionCost($months, $monthlyFee), 2, '.', ' ').' грн</p>';

try {
    applyDiscount(1200.0, 150.0);
} catch (Exception $e) {
    echo '<p>Помилка: '.htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8').'</p>';
} finally {
    echo '<p>Спроба розрахунку знижки завершена.</p>';
}

echo '<p>Знижка 20% від 1200 грн: '.number_format(applyDiscount(1200.0, 20.0), 2, '.', ' ').' грн</p>';

echo '<h2>Тести DataProcessor</h2>';
echo '<ul>';
echo '<li>minDigit(1234076) = '.minDigit(1234076).'</li>';
echo '<li>minDigit(77777) = '.minDigit(77777).'</li>';
echo '<li>swapFirstAndLastWord("абонент тарифний пакет акція") = '
    .swapFirstAndLastWord('абонент тарифний пакет акція').'</li>';
echo '<li>digitsFirstThenLetters("package2024plus9") = '
    .digitsFirstThenLetters('package2024plus9').'</li>';
echo '</ul>';
