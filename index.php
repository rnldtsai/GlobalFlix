<?php
require 'config.php';
$stmt = $pdo->query("SELECT * FROM videos");
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>GlobalFlix</title>
</head>
<body>
    <h1>Welcome to GlobalFlix</h1>
    <a href="logout.php">Logout</a>
    <div class="video-list">
        <?php foreach ($videos as $video): ?>
            <div class="video-item">
                <a href="stream.php?id=<?= $video['id'] ?>">
                    <img src="<?= htmlspecialchars($video['thumbnail_path']) ?>" alt="Thumbnail" class="video-thumbnail">
                    <h3><?= htmlspecialchars($video['title']) ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
