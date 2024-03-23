<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Analysis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            background-image: url('background.jpg'); /* Replace 'background.jpg' with the path to your image */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Ensure full viewport height */
        }
        .container {
            max-width: 800px;
            margin: 100px auto 50px auto; /* Add more margin to the top */
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.7); /* Add transparency to the background */
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
            margin-bottom: 20px;
            font-weight: bold;
            color: #555;
        }
        input[type="file"],
        input[type="submit"] {
            padding: 15px 30px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="file"] {
            width: calc(100% - 42px);
            margin: 0 auto 20px auto;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            color: #fff; /* Change footer color to white */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Image Analysis</h1>
        <form action="uploads.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select image to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
    <div class="footer">
        &copy; 2024 Image Analyzer. All rights reserved.
    </div>
</body>
</html>

