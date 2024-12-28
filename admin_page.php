<?php
session_start();

include 'config.php';


// Check if admin is logged in
if ($_SESSION['role'] !== 'Admin') {
    echo "<script>alert('Access denied. You must be a admin to access this page.'); window.location.href = 'user_page.php';</script>";
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newContent = $_POST['content'];

    // Update the file_data table
    $stmt = $pdo->prepare("UPDATE file_data SET content = :content, updated_at = NOW() WHERE id = 1");
    $stmt->execute(['content' => $newContent]);

    echo "Content updated successfully!";
}

// Fetch the current content
$stmt = $pdo->prepare("SELECT content FROM file_data WHERE id = 1");
$stmt->execute();
$fileContent = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Link to External CSS -->
    <link rel="stylesheet" href="admin.css"> <!-- Update the path if needed -->
</head>
<body>
    <h1>Admin Page</h1>
    <form method="POST" action="">
        <textarea name="content" rows="10" cols="50"><?php echo htmlspecialchars($fileContent['content']); ?></textarea>
        <br>
        <button type="submit">Update Content</button>
    </form>
</body>
</html>

