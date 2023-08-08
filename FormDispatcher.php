<?php
session_start();

use Controller\TypeController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['c'])) {
        $lowercaseInput = strtolower($_GET['c']);
        $className = ucfirst($lowercaseInput) . 'Controller';

        if ($_GET['m'] == 'create') {
            var_dump(Controller\TypeController::create());
        }
    }
}
