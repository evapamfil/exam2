<?php
/**
 * Created by PhpStorm.
 * User: evapamfil
 * Date: 15/11/2018
 * Time: 13:37
 */

namespace App\Storage\Contracts;

use App\Models\Task;

interface TaskStorageInterface
{
    public function store(Task $task);
    public function update(Task $task);
    public function get($id);
    public function all();
}