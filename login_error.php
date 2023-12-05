<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Just demo for now -->
    <div>
        Session error: <?= $_SESSION['error'] ?>
    </div>
    <button>Go to <a href="./session_destroy.php">Main Page</a></button>
</body>
</html>