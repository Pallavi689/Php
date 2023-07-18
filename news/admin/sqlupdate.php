<?php
  $u_id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $uname = $_POST['uname'];
  $role = $_POST['role'];

  $data = mysqli_connect("localhost","root","","news");
  
 $sql= "UPDATE user SET first_name = '{$fname}',last_name = '{$lname}',username = '{$uname}',r_ole = '{$role}' WHERE user_id = '{$u_id}'";
 $result = mysqli_query($data,$sql) or die("failed");
 header("location: http://localhost/news/admin/user.php");
?>