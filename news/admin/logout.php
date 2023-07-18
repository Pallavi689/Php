<?php
// back to the login page all the session delete
$data = mysqli_connect("localhost","root","","naws");
session_start();
session_unset();
session_destroy();
header("location: http://localhost/news/admin/");
?>