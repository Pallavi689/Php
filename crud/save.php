<?php
 $s_name = $_POST['name'];
 $s_address = $_POST['address'];
 $s_phone = $_POST['phone'];
 $s_course = $_POST['course'];
 $s_rono = $_POST['ro_no'];

$data = mysqli_connect("localhost","root","","crud") or die("not connect");
$sql = "INSERT INTO student(s_name,ro_no,s_address,phone,course) VALUES ('{$s_name}','{$s_rono}','{$s_address}','{$s_phone}','{$s_course}')";
$result=mysqli_query($data,$sql) or die("query not set");
?> 