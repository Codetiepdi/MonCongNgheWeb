<?php
$dataFile = '../data/flowers.json';
$flowers = json_decode(file_get_contents($dataFile), true);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Hoa</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Danh Sách Các Loài Hoa</h1>
    <div class="grid-container">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower-card">
                <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
                <h3><?php echo $flower['name']; ?></h3>
                <p><?php echo $flower['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
