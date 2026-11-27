<?php

declare(strict_types=1);

/**
 * Бізнес-логіка сутності ContentItem (система керування контентом
 * мобільного оператора): розрахунок вартості підписки та знижки.
 */

/**
 * Розраховує вартість підписки абонента на тарифний пакет.
 *
 * @param  int  $months  термін підписки у місяцях
 * @param  float  $monthlyFee  вартість місяця підписки (грн)
 * @return float вартість підписки (грн)
 */
function calculateSubscriptionCost(int $months, float $monthlyFee): float
{
    if ($months <= 0) {
        throw new InvalidArgumentException('Термін підписки має бути додатним!');
    }
    if ($monthlyFee <= 0) {
        throw new InvalidArgumentException('Вартість місяця підписки має бути додатною!');
    }

    return $months * $monthlyFee;
}

/**
 * Застосовує знижку у відсотках до ціни.
 *
 * @param  float  $price  початкова ціна
 * @param  float  $discount  розмір знижки у відсотках (0–100)
 * @return float ціна після знижки
 *
 * @throws Exception якщо знижка поза допустимим діапазоном
 */
function applyDiscount(float $price, float $discount): float
{
    if ($discount < 0 || $discount > 100) {
        throw new Exception('Неприпустиме значення знижки!');
    }

    return $price - ($price * ($discount / 100));
}
