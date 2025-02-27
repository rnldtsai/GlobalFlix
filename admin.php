<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['video'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $video_path = 'uploads/' . basename($_FILES['video']['name']);
    move_uploaded_file($_FILES['video']['tmp_name'], $video_path);
    echo $video_path; 
    $thumbnail_path = 'uploads/thumbnails/' . pathinfo($video_path, PATHINFO_FILENAME) . '.jpg';
    shell_exec("ffmpeg -i $video_path -ss 00:00:01 -vframes 1 $thumbnail_path");
    
    $stmt = $pdo->prepare("INSERT INTO videos (title, description, file_path, thumbnail_path) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $video_path, $thumbnail_path]);
    echo "Video uploaded successfully with thumbnail.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Upload Video</title>
</head>
<body>
    <h1>Upload a New Video</h1>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="file" name="video" required><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
