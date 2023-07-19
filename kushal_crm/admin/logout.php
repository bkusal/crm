<?php
session_start();
session_destroy();

echo "Session destroyed!";
header("Refresh:2; url=../admin/login.php");


?>
