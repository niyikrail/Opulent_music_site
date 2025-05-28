<?php
include 'db/connection.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM songs WHERE id = $id";
$result = mysqli_query($conn, $query);
$song = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lyrics - <?php echo $song['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2><?php echo $song['title']; ?> - <?php echo $song['artist']; ?></h2>
    <pre><?php echo nl2br(htmlspecialchars($song['lyrics'])); ?></pre>
    <a href="index.php">Back to Home</a>
</body>
</html>
