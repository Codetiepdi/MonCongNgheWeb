<?php
$dataFile = '../data/flowers.json';
$flowers = json_decode(file_get_contents($dataFile), true);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Trị Hoa</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Quản Trị Danh Sách Hoa</h1>
    <a href="../add/add.php">Thêm Hoa Mới</a>
    <table border="1">
        <thead>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $flower): ?>
                <tr>
                    <td><?php echo $flower['name']; ?></td>
                    <td><?php echo $flower['description']; ?></td>
                    <td><img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>" style="width: 100px;"></td>
                    <td>
                        <a href="../edit/edit.php?id=<?php echo $flower['id']; ?>">Sửa</a>
                        <a href="../del/delete.php?id=<?php echo $flower['id']; ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
