<?php
session_start();

include 'config.php';


// Check if the user is logged in as User
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'User') {
    echo "<script>alert('Access denied. You must be a user to access this page.'); window.location.href = 'login.php';</script>";
    exit(); // Stop further execution after the redirect
}

// Fetch file content
$stmt = $pdo->prepare("SELECT content FROM file_data WHERE id = 1");
$stmt->execute();
$file = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View Page</title>
    <style>
        /* Resetting default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Header styles */
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        /* Content container styles */
        .content-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 70%;
            margin: 0 auto;
        }

        /* Preformatted text styles */
        pre {
            background-color: #f7f7f7;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 16px;
        }

        /* Link styling */
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .content-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h1>User - View File Content</h1>
    <div class="content-container">
        <pre><?= htmlspecialchars($file['content']) ?></pre> <!-- Display file content in a readable format -->
        <a href="admin_page.php">Edit Content</a>
    </div>
</body>
</html>
