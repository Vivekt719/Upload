<?php
include 'database.php';

$sql = "SELECT * FROM files";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<body>
<h2>Uploaded Files</h2>
<a href="upload.php">Upload New File</a>
<br><br>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<a href='file.php?id=" . $row["id"] . "'>" . htmlspecialchars($row["filename"]) . "</a><br>";
    }
} else {
    echo "No files uploaded.";
}
$conn->close();
?>
</body>
</html>
