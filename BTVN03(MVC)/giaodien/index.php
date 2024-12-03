<?php
require_once('../controller/Controller.php');

$controller = new ProductController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action === 'add') {
    $controller->add();
} elseif ($action === 'edit' && $id !== null) {
    $controller->edit($id);
} elseif ($action === 'delete' && $id !== null) {
    $controller->delete($id);
} else {
    $controller->index();
}
