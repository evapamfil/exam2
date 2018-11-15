<?php
/**
 * Created by PhpStorm.
 * User: evapamfil
 * Date: 15/11/2018
 * Time: 13:21
 */
require __DIR__ . '/../vendor/autoload.php';

use App\Models\Task;
use App\Storage\MySqlDatabaseStorage;



$task = new Task;
$task->setDescription('Aller à WebStart');
$task->setDue(new DateTime('+ 2 days'));


$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

try {
    $pdo = new PDO('mysql:host='. getenv(DATABASE_SERVER) .':'. getenv(DATABASE_PORT) .';dbname=' . getenv(DATABASE_NAME), getenv(DATABASE_USER), getenv(DATABASE_PASSWORD));
} catch (Exception $e) {
    echo 'error' . $e->getMessage();
}

$query = $pdo->query('SELECT * FROM tasks');


$tasks = $query->fetchAll(PDO::FETCH_OBJ);

foreach ($tasks as $task) {
    $query = $pdo->query('SELECT * FROM tasks WHERE id = ' . $task->id);
    $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
    $task = $query->fetch();

    //var_dump($task);

    //echo $task->getDue()->format('d/m/Y H:i');
}

$storage = new MySqlDatabaseStorage($pdo);

var_dump($storage->all());
echo $storage->get(1);