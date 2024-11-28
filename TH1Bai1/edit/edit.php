<?php
$dataFile = '../data/flowers.json';
$flowers = json_decode(file_get_contents($dataFile), true);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $flower = null;
    foreach ($flowers as $f) {
        if ($f['id'] == $id) {
            $flower = $f;
            break;
        }
    }
    if (!$flower) {
        header('Location: ../admin/admin.php');
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($flowers as &$f) {
        if ($f['id'] == $id) {
            $f['name'] = $_POST['name'];
            $f['description'] = $_POST['description'];
            if (isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
                $newImage = "images/" . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $newImage);
                $f['image'] = $newImage;
            }
            break;
        }
    }
    file_put_contents($dataFile, json_encode($flowers, JSON_PRETTY_PRINT));
    header('Location: ../admin/admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Hoa</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Sửa Thông Tin Hoa</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Tên Hoa:</label>
        <input type="text" name="name" id="name" value="<?php echo $flower['name']; ?>" required><br>
        <label for="description">Mô Tả:</label>
        <textarea name="description" id="description" required><?php echo $flower['description']; ?></textarea><br>
        <label for="current-image">Hình Ảnh Hiện Tại:</label><br>
        <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>" style="width: 200px;"><br><br>
        <label for="image">Thay Ảnh (nếu muốn):</label>
        <input type="file" name="image" id="image"><br><br>
        <button type="submit">Lưu Thay Đổi</button>
        <a href="../admin/admin.php">Hủy</a>
    </form>
</body>
</html>
