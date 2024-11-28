<?php
$dataFile = '../data/flowers.json';
$flowers = json_decode(file_get_contents($dataFile), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFlower = [
        "id" => end($flowers)['id'] + 1,
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "image" => "images/" . basename($_FILES['image']['name'])
    ];
    move_uploaded_file($_FILES['image']['tmp_name'], $newFlower['image']);
    $flowers[] = $newFlower;
    file_put_contents($dataFile, json_encode($flowers, JSON_PRETTY_PRINT));
    header('Location: ../admin/admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Hoa</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Thêm Hoa Mới</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Tên Hoa:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="description">Mô Tả:</label>
        <textarea name="description" id="description" required></textarea><br>
        <label for="image">Ảnh:</label>
        <input type="file" name="image" id="image" required><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
