<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
include 'db/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $lyrics = $_POST['lyrics'];
    $file = $_FILES['file'];
    $filename = basename($file['name']);
    $target = "uploads/" . $filename;
    if (move_uploaded_file($file['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO songs (title, artist, file_path, lyrics) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $artist, $filename, $lyrics);
        $stmt->execute();
        echo "Upload successful.";
    } else {
        echo "Upload failed.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Song</title>
</head>
<body>
    <h2>Upload New Song</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="artist" placeholder="Artist" required><br>
        <textarea name="lyrics" placeholder="Lyrics"></textarea><br>
        <input type="file" name="file" accept="audio/*" required><br>
        <button type="submit">Upload</button>
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>
