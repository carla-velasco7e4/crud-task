<?php

namespace Controller;

require_once("./Entity/Type.php");

class TypeController
{
    //CREATE
    //loads create form
    public static function create($type)
    {
        include '../views/type/new.php';
    }

    //saves data
    public static function store()
    {
        if(empty($_POST['save']))
            throw new Exception('No data recieved');
        $newType = new \Entity\Type();
        $newType->setTitle($_POST['title']);
        $_SESSION["types"][] = serialize($newType);
        include '../views/success.php';
    }


    // UPDATE

    // redirects to the update formular
    public static function edit(int $id = 0)
    {
        if (!$id)
            throw new Exception("Id not included");
        $type = self::getById($id);
        if(!$type)
            throw new Exception("The type doesn't exist $id.");
        include '../views/type/update.php';
    }

    // makes the update
    public static function update()
    {
        if (empty($_POST['save']))
            throw new Exception('No data');
        $id = intval($_POST['id']);
        $type = self::getById($id);
        if(!$type)
            throw new Exception("The type doesn't exist $id.");
        $type->setTitle($_POST['title']);
        $_SESSION["types"][] = serialize($type);
    }


    //DELETE
    //loads delete form
    public function delete(int $id = 0) {
        if(!$id)
            throw new Exception("No data");
        $type = self::getById($id);
        if(!type)
            throw new Exception("The type doesn't exist $id");
        include '../views/type/delete.php';
    }

    //makes the delete action
    public function destroy() {
        if(empty($_POST['delete']))
            throw new Exception('No confirm was sended.');
        $id = intval($_POST['id']);
        foreach ($_SESSION["types"] as $key => $item) {
            if ($item['id'] == $id) {
                unset($_SESSION["types"][$key]);
                break;
            }
        }
        include '../views/success.php';
    }

    public static function getById($id) {
        if (empty($id))
            return null;
        foreach ($_SESSION["types"] as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }
}