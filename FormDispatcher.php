<?php
session_start();

use Controller\TypeController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['c'])) {
        $lowercaseInput = strtolower($_GET['c']);
        $className = ucfirst($lowercaseInput) . 'Controller';

        if (class_exists($className) && method_exists($className, $_GET['m'])) {

            if ($_GET['m'] == 'create') {

                $className::create();
            }
            if ($_GET['m'] == 'delete') {
                $className::delete();
            }
            if ($_GET['m'] == 'update') {
                $className::create();
            }
            if ($_GET['m'] == 'read') {
                $className::read();
            }

        }
    }
}
