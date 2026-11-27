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
     * Розраховує вартість підписки абонента на тарифний пакет.
     *
     * @param  int  $months  термін підписки у місяцях
     * @param  float  $monthlyFee  вартість місяця підписки (грн)
     * @return float вартість підписки (грн)
     */
    public function calculateSubscriptionCost(int $months, float $monthlyFee): float
    {
        $this->logger->log("Розрахунок вартості підписки: {$months} міс × {$monthlyFee} грн/міс");

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
    public function applyDiscount(float $price, float $discount): float
    {
        $this->logger->log("Спроба застосувати знижку {$discount}% до ціни {$price} грн");

        if ($discount < 0 || $discount > 100) {
            throw new Exception('Неприпустиме значення знижки!');
        }

        return $price - ($price * ($discount / 100));
    }
}
