<?php
// Start the PHP session
session_start();

// Initialize the $complaint variable
$complaint = '';

// Check if complaint is submitted
if (isset($_POST['complaint'])) {
    $complaint = $_POST['complaint'];
}

// Default value for the redirect variable
$redirect = false;

// Check if the redirect variable is set via POST from index.php
if (isset($_POST['redirect']) && $_POST['redirect'] === 'true') {
    $redirect = true;
}

// If redirect variable is true, redirect to subdomain
if ($redirect) {
    header("Location: http://myimageprocessor.com/image/main.php");
    exit;
}
?>

<<!DOCTYPE html>
<html>
<head>
    <title>Image Analyzer - Complaints</title>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self';">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('background.jpg'); /* Add your background image URL here */
            background-size: cover; /* Ensure the background image covers the entire screen */
            background-position: center; /* Center the background image */
            height: 100vh;
            color: #333;
        }
        .wrapper {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Add transparency to the background */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4caf50;
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        textarea,
        input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            margin-bottom: 20px;
        }
        input[type="email"] {
            margin-bottom: 20px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #fff; /* Change footer color to white */
        }
        .output-box {
            background-color: #888;
            color: #fff;
            border-radius: 4px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            font-size: 20px; 
            font-weight: bold; 
        }
        .output-box1 {
            background-color: #888;
            color: #fff;
            border-radius: 4px;
            padding: 10px;
            margin-top: 20px;
            text-align: left;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Image Analyzer - Complaints</h1>
        <?php if (!empty($complaint)): ?>
            <div class="output-box">
                <p>Complaint Submitted:</p>
                <div class="output-box1">
                    <p><?php echo $complaint; ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="footer">
        &copy; 2024 Image Analyzer. All rights reserved.
    </div>
</body>
</html>
