<?php
/**
 * Created by PhpStorm.
 * User: evapamfil
 * Date: 15/11/2018
 * Time: 14:31
 */

namespace App\Storage;

use App\Storage\Contracts\TaskStorageInterface;
use App\Models\Task;
use PDO;

class MySqlDatabaseStorage implements TaskStorageInterface {


    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function store(Task $task){


    }

    public function update(Task $task){

    }
    public function get($id){

        $this->id = $id;

        $query = $this->pdo->query('SELECT * FROM tasks WHERE id =' . $id);
        $getid = $query->fetchObject();

        return  print_r($getid);
    }
    public function all(){
        $query = $this->pdo->query('SELECT * FROM tasks');
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($tasks as $t) {
            $query = $this->pdo->query('SELECT * FROM tasks WHERE id = ' . $t->id);
        }
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $task = $query->fetch();

        return $task;
    }

}