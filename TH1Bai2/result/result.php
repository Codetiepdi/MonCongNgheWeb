<?php
$filename = __DIR__ . '/../src/questions.txt';
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$answers = [];
foreach ($questions as $line) {
    if (strpos($line, "Đáp án:") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1));
    }
}
$score = 0;
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
    if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
        $score++;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            Bạn trả lời đúng <strong><?php echo $score; ?></strong>/<?php echo count($answers); ?> câu.
        </div>
        <div class="text-center">
            <a href="../src/index.php" class="btn btn-primary">Làm lại</a>
        </div>
    </div>
</body>
</html>
