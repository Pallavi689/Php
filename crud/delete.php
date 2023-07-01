<?php
$url_s_id = $_GET['id'] ;
$data = mysqli_connect("localhost","root","","crud") or die("not connect");
$sql = "DELETE FROM student WHERE s_id = '{$url_s_id}'";
$result=mysqli_query($data,$sql) or die("query not set");
header("Location: http://localhost/crud/show_table.php");
?>