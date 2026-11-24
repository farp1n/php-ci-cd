<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\LoggerInterface;
use Exception;
use InvalidArgumentException;

class EntityService
{
    public function __construct(
        private LoggerInterface $logger,
    ) {}

    /**
     * Розраховує вартість поїздки на самокаті.
     *
     * @param  int  $minutes  тривалість поїздки у хвилинах
     * @param  float  $ratePerMin  тариф за хвилину (грн)
     * @return float вартість поїздки (грн)
     */
    public function calculateRideCost(int $minutes, float $ratePerMin): float
    {
        $this->logger->log("Розрахунок вартості поїздки: {$minutes} хв × {$ratePerMin} грн/хв");

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
    public function applyDiscount(float $price, float $discount): float
    {
        $this->logger->log("Спроба застосувати знижку {$discount}% до ціни {$price} грн");

        if ($discount < 0 || $discount > 100) {
            throw new Exception('Неприпустиме значення знижки!');
        }

        return $price - ($price * ($discount / 100));
    }
}
