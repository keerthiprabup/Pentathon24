<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Analyzer - Complaints</title>
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
    .container {
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
    input[type="email"],
    textarea {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        margin-bottom: 20px;
    }
    input[type="email"] {
        width: calc(100% - 22px);
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
</style>
</head>
<body>
<div class="container">
    <h1>Image Analyzer - File a Complaint</h1>
    <form action="complaints.php" method="post">
        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" placeholder="Your email address" required style="width: calc(100% - 22px); height: 40px;"><br>
        <label for="complaint">Describe your complaint:</label><br>
        <textarea id="complaint" name="complaint" rows="6" placeholder="Type your complaint here..." required style="width: calc(100% - 22px);"></textarea><br>
        <input type="submit" value="Submit Complaint">
    </form>
</div>
<div class="footer">
    &copy; 2024 Image Analyzer. All rights reserved.
</div>
</body>
</html>

