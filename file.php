<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $fileId = intval($_GET['id']);

    $sql = "SELECT * FROM files WHERE id = $fileId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $file = $result->fetch_assoc();
        $filepath = $file['filepath'];
        $filename = $file['filename'];

        if (file_exists($filepath)) {
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=\"" . basename($filepath) . "\"");
            readfile($filepath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid file ID.";
    }
} else {
    echo "No file ID provided.";
}

$conn->close();
?>
