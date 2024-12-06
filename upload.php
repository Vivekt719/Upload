<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file upload exists
    if (!isset($_FILES["fileToUpload"])) {
        echo "No file uploaded or file size exceeds the server limit.";
        exit;
    }

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    if ($_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file size
        if ($_FILES["fileToUpload"]["size"] > 30000000) { // 30 MB
            echo "File size exceeds the 30MB limit.";
            $uploadOk = 0;
        }

        // Allow specific file types
        $allowed_types = ["mp3", "wmv", "gif", "jpg", "png", "mp4", "pdf", "mov"];
        if (!in_array($fileType, $allowed_types)) {
            echo "Invalid file type. Allowed types: MP3, WMV, GIF, JPG, PNG, MP4, PDF, MOV.";
            $uploadOk = 0;
        }

        // Upload file
        if ($uploadOk && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["fileToUpload"]["name"]);
            $filesize = $_FILES["fileToUpload"]["size"];
            $filepath = $target_file;

            $sql = "INSERT INTO files (filename, filesize, filetype, filepath) 
                    VALUES ('$filename', '$filesize', '$fileType', '$filepath')";
            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully.";
            } else {
                echo "Database error: " . $conn->error;
            }
        } else {
            echo "Error uploading the file.";
        }
    } else {
        switch ($_FILES["fileToUpload"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "The uploaded file exceeds the maximum file size limit.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded.";
                break;
            default:
                echo "An unknown error occurred.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<h2>Upload File</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>
<a href="display.php">View Uploaded Files</a>
</body>
</html>
