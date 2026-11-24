<?php

declare(strict_types=1);

/**
 * Бізнес-логіка сутності Scooter (мікромобільність):
 * розрахунок вартості поїздки та застосування знижки.
 */

/**
 * Розраховує вартість поїздки на самокаті.
 *
 * @param  int  $minutes  тривалість поїздки у хвилинах
 * @param  float  $ratePerMin  тариф за хвилину (грн)
 * @return float вартість поїздки (грн)
 */
function calculateRideCost(int $minutes, float $ratePerMin): float
{
    if ($minutes <= 0) {
        throw new InvalidArgumentException('Тривалість поїздки має бути додатною!');
    }
    if ($ratePerMin <= 0) {
        throw new InvalidArgumentException('Тариф за хвилину має бути додатним!');
    }

    return $minutes * $ratePerMin;
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
