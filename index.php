<?php

declare(strict_types=1);

use App\Core\Database;
use App\Core\EntityFactory;
use App\Services\ConsoleLogger;
use App\Services\EntityService;
use App\Tasks\Artist;
use App\Tasks\DepartmentHead;
use App\Tasks\EnterpriseManager;
use App\Tasks\Genre;
use App\Tasks\Laborer;
use App\Tasks\ShopSupervisor;
use App\Tasks\Worker;

require_once __DIR__.'/vendor/autoload.php';

echo '<h1>Лабораторна робота №4 — ООП патерни</h1>';

// Singleton
echo '<h2>Singleton (Database)</h2>';
$db1 = Database::getInstance();
$db2 = Database::getInstance();
echo '<p>Один і той самий екземпляр: '.($db1 === $db2 ? 'так' : 'ні').'</p>';

// Factory + AbstractEntity + JsonExportTrait
echo '<h2>Factory + наслідування + експорт JSON</h2>';
$scooter = EntityFactory::createEntity('scooter', [
    'id' => 'scooter-001',
    'createdAt' => '2026-11-24 10:00:00',
    'model' => 'Xiaomi Mi Electric Scooter 4',
    'ratePerMin' => 3.5,
    'available' => true,
    'batteryLevel' => 87,
]);
$user = EntityFactory::createEntity('user', [
    'id' => 'user-001',
    'createdAt' => '2026-11-24 10:05:00',
    'name' => 'Стас Краївський',
    'phone' => '+380671234567',
    'balance' => 250.0,
]);
echo '<p>'.$scooter->getDetails().'</p>';
echo '<p>'.$user->getDetails().'</p>';
echo '<pre>'.$scooter->exportToJson().'</pre>';

// Dependency Injection
echo '<h2>Dependency Injection (EntityService + Logger)</h2>';
$service = new EntityService(new ConsoleLogger);
$cost = $service->calculateRideCost(30, 3.5);
echo '<p>Вартість поїздки: '.number_format($cost, 2, '.', ' ').' грн</p>';
try {
    $service->applyDiscount(1000.0, 150.0);
} catch (Exception $e) {
    echo '<p>Помилка: '.$e->getMessage().'</p>';
}
echo '<p>Знижка 20% від 500 грн: '.$service->applyDiscount(500.0, 20.0).' грн</p>';

// Варіант 17 — Табл. 4.2: композиція Artist/Genre
echo '<h2>Композиція: Genre → Artist</h2>';
$genre = new Genre(1, 'Electronic');
$genre->addArtist(new Artist(1, 'Daft Punk', true, 1993));
$genre->addArtist(new Artist(2, 'The Weeknd', false, 2011));
$genre->addArtist(new Artist(1, 'Daft Punk', true, 1993)); // дублікат ігнорується
echo '<p>Жанр: '.$genre->getName().' (ID '.$genre->getGenreId().')</p><ul>';
foreach ($genre->getArtists() as $artist) {
    echo '<li>'.$artist->getDetails().'</li>';
}
echo '</ul>';
echo '<p>Пошук артиста #2: '.($genre->findArtist(2)?->getName() ?? 'не знайдено').'</p>';
echo '<p>Видалення артиста #1: '.($genre->removeArtist(1) ? 'успішно' : 'помилка').'</p>';
echo '<p>Залишилось артистів: '.count($genre->getArtists()).'</p>';

// Варіант 17 — Табл. 4.3: ієрархія працівників
echo '<h2>Ієрархія класів: працівники</h2>';
$employees = [
    new Laborer(1, 'Іван Петренко', 20000.0),
    new ShopSupervisor(2, 'Олег Коваль', 20000.0, 5000.0),
    new DepartmentHead(3, 'Марія Сидоренко', 20000.0, 5000.0, 8000.0),
    new EnterpriseManager(4, 'Андрій Бондар', 20000.0, 5000.0, 8000.0, 12000.0),
];
echo '<ul>';
foreach ($employees as $employee) {
    $role = substr(strrchr($employee::class, '\\'), 1);
    echo '<li>'.$employee->getName().' ('.$role.'): '
        .number_format($employee->calculateSalary(), 2, '.', ' ').' грн</li>';
}
echo '</ul>';

// Варіант 17 — Табл. 4.4: Worker з формулою зарплати
echo '<h2>Worker: відрядна зарплата</h2>';
$worker = new Worker(10000.0, 50.0);
echo '<p>База 10000 грн + 200 деталей × 0.05 × 50 грн = '
    .number_format($worker->calculateSalary(200), 2, '.', ' ').' грн</p>';
