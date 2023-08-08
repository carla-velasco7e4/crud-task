<?php

namespace Controller;

use Entity\Task;
class TypeController
{
    public static function create()
    {
        return 'TypeController::create';
        $newType = new Task();

        $newType->setTitle($attributes['title']);
        $newType->setDescription($attributes['description']);
        $newType->setStatus($attributes['status']);
        $newType->setAssignedTo($attributes['assignedTo']);
        $newType->setType($attributes['type']);

        $_SESSION["tasks"][] = $newType;
        return 'aloo';
    }
    public static function delete()
    {
        return 'delete';
    }

    public static function update()
    {
        return 'update';
    }
}