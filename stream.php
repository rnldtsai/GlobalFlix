/* stream.php - Direct Video Link */
<?php
require 'config.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM videos WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $video = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($video && file_exists($video['file_path'])) {
        $video_url = $video['file_path'];
        echo "<html><body><h2>Playing: " . htmlspecialchars($video['title']) . "</h2>";
        echo "<video width='640' height='360' controls>
                <source src='$video_url' type='video/mp4'>
                Your browser does not support the video tag.
              </video>";
        echo "</body></html>";
    } else {
        http_response_code(404);
        echo "Video not found.";
    }
}
?>

