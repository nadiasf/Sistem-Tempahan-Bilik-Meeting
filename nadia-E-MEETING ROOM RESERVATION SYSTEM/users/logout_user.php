<title>Log out User</title>

<?php
require'core.php';
session_destroy();
header('location:http://localhost/nad/index.php');
?>