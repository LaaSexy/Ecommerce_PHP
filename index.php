<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity</title>
    <link rel="stylesheet" href="./bootstrap//css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
</head>
<body>
    <?php include 'header.php'?>

    <?php include 'content.php'?>

    <?php include 'footer.php'?>
</body>
</html>
<?php
    $dir = isset($_GET['dir']) ? $_GET['dir'] : '.';
    $dir = realpath($dir);

    // Prevent directory traversal
    if (strpos($dir, __DIR__) !== 0) {
        die('Access denied.');
    }

    // $files = scandir($dir);
    // echo "<h2>Directory listing for " . htmlspecialchars(str_replace(__DIR__, '', $dir) ?: '/') . "</h2><ul>";

    // if ($dir !== __DIR__) {
    //     $parent = dirname($dir);
    //     echo "<li><a href='?dir=" . urlencode($parent) . "'>.. (parent directory)</a></li>";
    // }

    // foreach ($files as $file) {
    //     if ($file === '.') continue;
    //     $path = $dir . DIRECTORY_SEPARATOR . $file;
    //     $display = htmlspecialchars($file);
    //     if (is_dir($path)) {
    //         echo "<li>[DIR] <a href='?dir=" . urlencode($path) . "'>$display</a></li>";
    //     } else {
    //         $size = filesize($path);
    //         $date = date("Y-m-d H:i", filemtime($path));
    //         echo "<li>[FILE] <a href='" . htmlspecialchars(str_replace(__DIR__ . DIRECTORY_SEPARATOR, '', $path)) . "'>$display</a> ($size bytes, $date)</li>";
    //     }
    // }
    echo "</ul>";
?>