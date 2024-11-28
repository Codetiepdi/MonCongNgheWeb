<?php
$dataFile = '../data/flowers.json';
$flowers = json_decode(file_get_contents($dataFile), true);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $flowers = array_filter($flowers, function ($flower) use ($id) {
        return $flower['id'] != $id;
    });
    file_put_contents($dataFile, json_encode(array_values($flowers), JSON_PRETTY_PRINT));
    header('Location: ../admin/admin.php');
    exit;
}
?>
