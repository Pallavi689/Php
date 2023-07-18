<?php
$url_s_id = $_GET['id'] ;
$data = mysqli_connect("localhost","root","","news") or die("not connect");
$sql= "DELETE FROM user WHERE user_id = '{$url_s_id}'";
$result=mysqli_query($data,$sql) or die("query not set");
header("Location: http://localhost/news/admin/user.php");
?>