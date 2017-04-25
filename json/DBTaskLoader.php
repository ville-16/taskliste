<?php

require_once "task.php";
require_once "DB.php";

header("Content-type:application/json; charset=UTF-8");

class DBTaskLoader {

    private $tasks;
    private $statement;
    private $task;
    public function getTasks() {

        $this->statement = DB::get()->prepare("SELECT * FROM task WHERE id BETWEEN :start AND :end");

//ausführen mit PDO::FETCH_NUM
        $this->statement->execute(array(':start'=> 0, ':end'=>543));
        $this->tasks = $this->statement->fetchAll(PDO::FETCH_ASSOC);


        return $this->tasks;
    }

    public function getTask($id) {
        $this->statement = DB::get()->prepare("SELECT * FROM task WHERE id = :id");
        $this->statement->execute(array(':id'=> $id));
        $this->task = $this->statement->fetchAll(PDO::FETCH_ASSOC);
        return $this->task[0];
    }

}