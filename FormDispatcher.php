<?php

session_start();

include_once("./Controller/TaskController.php");
include_once("./Controller/TypeController.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['c']) && isset($_POST['m'])) {
        $controllerName = 'Controller\\' . ucfirst(strtolower($_POST['c'])) . 'Controller';
        $methodName = $_POST['m'];

        if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
            $controllerName::$methodName($_POST);
        } else {
            echo "Error: Class or method not found.";
        }
    }
}
