<?php
include 'db/connection.php';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM songs WHERE title LIKE '%$search%' OR artist LIKE '%$search%' ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Opulent Music - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Opulent Music</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search songs..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>
    <div class="song-list">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="song-item">
                <h3><?php echo $row['title']; ?> - <?php echo $row['artist']; ?></h3>
                <audio controls>
                    <source src="uploads/<?php echo $row['file_path']; ?>" type="audio/mpeg">
                </audio>
                <a href="uploads/<?php echo $row['file_path']; ?>" download>Download</a> |
                <a href="lyrics.php?id=<?php echo $row['id']; ?>">View Lyrics</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
