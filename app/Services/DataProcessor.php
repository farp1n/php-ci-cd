<?php

declare(strict_types=1);

/**
 * Допоміжні функції обробки даних (Варіант №17, таблиці 3.2–3.4).
 */

/**
 * Повертає мінімальну цифру натурального числа.
 *
 * @param  int  $number  натуральне число
 * @return int найменша цифра числа
 */
function minDigit(int $number): int
{
    $digits = array_map('intval', str_split((string) $number));

    return min($digits);
}

/**
 * Міняє місцями перше та останнє слово у рядку.
 *
 * @param  string  $text  вхідний рядок зі словами
 * @return string рядок із поміненими місцями першим і останнім словами
 */
function swapFirstAndLastWord(string $text): string
{
    $words = explode(' ', trim($text));
    $count = count($words);

    if ($count < 2) {
        return $text;
    }

    $first = $words[0];
    $words[0] = $words[$count - 1];
    $words[$count - 1] = $first;

    return implode(' ', $words);
}

/**
 * Впорядковує символи рядка: спочатку цифри, потім літери.
 *
 * @param  string  $input  рядок із цифр та літер
 * @return string впорядкований рядок (цифри на початку, літери в кінці)
 */
function digitsFirstThenLetters(string $input): string
{
    preg_match_all('/\d/', $input, $digits);
    preg_match_all('/\p{L}/u', $input, $letters);

    return implode('', $digits[0]).implode('', $letters[0]);
}
