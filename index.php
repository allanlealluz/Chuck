<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Severent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<nav>
<a href="index.php">Home</a>
<a href="login.php">Please log in</a>
<a href="register.php">Register</a>
</nav>
<body>

<h1>Chuck Severent</h1>
<p>This is a website about Chuck Severent</p>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
require_once "db_function.php";
$db = new DB();
$con = $db->getConnection();
?>
</body>
</html>