<?php

namespace Controller;

use Entity\Task;

class TypeController
{
    public static function create()
    {
        return 'TypeController::create';
        var_dump("cratefunctionSTART");
        $newType = new Task();

        $newType->setTitle($attributes['title']);
        $newType->setDescription($attributes['description']);
        $newType->setStatus($attributes['status']);
        $newType->setAssignedTo($attributes['assignedTo']);
        $newType->setType($attributes['type']);

        $_SESSION["tasks"][] = $newType;
        var_dump("cratefunctionEND");
        return 'aloo';
    }

}