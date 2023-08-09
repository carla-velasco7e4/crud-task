<?php

namespace Controller;

require_once("./Entity/Task.php");

class TaskController
{
    //CREATE
    //loads create form
    public static function create($task)
    {
        include '../views/task/new.php';
    }

    //saves data
    public static function store()
    {
        if(empty($_POST['save']))
            throw new Exception('No data recieved');
        $newTask = new \Entity\Task();
        $newTask->setTitle($_POST['title']);
        $_SESSION["tasks"][] = serialize($newTask);
        include '../views/success.php';
    }


    // UPDATE

    // redirects to the update formular
    public static function edit(int $id = 0)
    {
        if (!$id)
            throw new Exception("Id not included");
        $task = self::getById($id);
        if(!$task)
            throw new Exception("The task doesn't exist $id.");
        include '../views/task/update.php';
    }

    // makes the update
    public static function update()
    {
        if (empty($_POST['save']))
            throw new Exception('No data');
        $id = intval($_POST['id']);
        $task = self::getById($id);
        if(!$task)
            throw new Exception("The task doesn't exist $id.");
        $task->setTitle($_POST['title']);
        $_SESSION["tasks"][] = serialize($task);
    }


    //DELETE
    //loads delete form
    public function delete(int $id = 0) {
        if(!$id)
            throw new Exception("No data");
        $task = self::getById($id);
        if(!task)
            throw new Exception("The task doesn't exist $id");
        include '../views/task/delete.php';
    }

    //makes the delete action
    public function destroy() {
        if(empty($_POST['delete']))
            throw new Exception('No confirm was sended.');
        $id = intval($_POST['id']);
        foreach ($_SESSION["tasks"] as $key => $item) {
            if ($item['id'] == $id) {
                unset($_SESSION["tasks"][$key]);
                break;
            }
        }
        include '../views/success.php';
    }

    public static function getById($id) {
        foreach ($_SESSION["tasks"] as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }
}