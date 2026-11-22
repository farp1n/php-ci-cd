# PHP CI/CD Lab

[![PHP CI](https://github.com/farp1n/php-ci-cd/actions/workflows/php-ci.yml/badge.svg)](https://github.com/farp1n/php-ci-cd/actions/workflows/php-ci.yml)

Навчальний проєкт для лабораторної роботи №1 з веб-програмування: керування версіями (Git, GitHub) та налаштування CI/CD-пайплайну на GitHub Actions для PHP-проєкту.

## Мета

- закріпити роботу з Git та GitHub (гілки, Pull Request, code review);
- налаштувати безперервну інтеграцію (CI) за допомогою GitHub Actions;
- автоматично перевіряти стиль коду (Laravel Pint) та запускати юніт-тести (PHPUnit).

## Структура репозиторію

- `app/Services/Calculator.php` — клас-калькулятор з методами `add` та `subtract`;
- `tests/Unit/CalculatorTest.php` — юніт-тести на PHPUnit;
- `.github/workflows/php-ci.yml` — CI-пайплайн GitHub Actions;
- `.github/PULL_REQUEST_TEMPLATE.md` — шаблон Pull Request;
- `.gitignore` — файли поза версійним контролем.

## Як запустити локально

```bash
composer install
./vendor/bin/pint
./vendor/bin/phpunit tests/Unit
```

## CI/CD

Пайплайн `PHP CI Application` запускається на push та pull request у `main`:

1. `actions/checkout` — отримання коду;
2. `shivammathur/setup-php` — PHP 8.2;
3. `composer install` — PHPUnit та Laravel Pint;
4. демонстрація GitHub Secrets (значення маскується як `***`);
5. `./vendor/bin/pint --test` — перевірка стилю коду;
6. `./vendor/bin/phpunit tests/Unit` — юніт-тести.
