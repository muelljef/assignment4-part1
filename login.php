<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<form action="content1.php" method="post">
<div>
<label>Username:</label>
<input name="username">
</div>
<div>
<button type="submit">Login</button>
</div>
</form>
</body>
</html>';
?>