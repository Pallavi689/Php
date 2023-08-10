<?php
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$data = mysqli_connect('localhost','root','','ajex');
$sql = "INSERT INTO student ( first_name, last_name) VALUES ('{$fname}', '{$lname}')";
if(mysqli_query($data,$sql) > 0){
    echo 1;
}else{
    echo 0;
}
?>
