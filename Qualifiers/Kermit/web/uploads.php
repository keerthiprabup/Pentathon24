<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f0ad4e; /* Table header background color */
            color: #fff; /* Table header text color */
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #fff; /* Change footer color to white */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Image Upload</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
            $target_dir = "/var/www/html/uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    $file_name = basename($target_file);
                    $sanitised = preg_replace('/[^a-zA-Z0-9|]+/', '', $file_name);
                    $exiftoolPath = '/opt/exiftool-12.37/exiftool';
                    $cmd = "cd /var/www/html/uploads && $exiftoolPath * > /var/www/html/metadata.txt";
                    shell_exec($cmd);   
                    $file = '/var/www/html/metadata.txt';
                    $content = file_get_contents($file);
                    $lines = explode("\n", $content);
                    echo '<table border="1">';
                    foreach ($lines as $line) {
                        $parts = explode(' : ', $line, 2);
                        if (count($parts) == 2) {
                            $key = trim($parts[0]);
                            $value = trim($parts[1]);
                            echo "<tr><th>$key</th><td>$value</td></tr>";
                        }
                    }
                    echo '</table>';
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "Invalid request.";
        }
        ?>
    </div>
    <div class="footer">
        &copy; 2024 Image Analyzer. All rights reserved.
    </div>
</body>
</html>

