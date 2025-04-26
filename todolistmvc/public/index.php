<?php

require_once '../app/config/config.php';
require_once '../app/controller/TodoController.php';
require_once '../app/model/Todo.php';

// Simple Routing
$action = $_GET['action'] ?? 'index';

$controller = new TodoController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Page not found";
}
