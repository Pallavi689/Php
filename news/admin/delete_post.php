<?php
$data = mysqli_connect("localhost","root","","news") or die("not connect");
$url_s_id = $_GET['id'] ;
//cat id because if delete so n-1
$category_id =$_GET['cat'];
//delete photo in folder
$sql1= "SELECT * FROM post WHERE post_id = '{$url_s_id}';";
$result1=mysqli_query($data,$sql1) or die("query not set : select");
$row = mysqli_fetch_assoc($result1);
// this function is used to delete file in a folder by giving path
unlink("image/".$row['post_img']);

$sql= "DELETE FROM post WHERE post_id = '{$url_s_id}';";
$sql.="UPDATE category SET post=post -1 WHERE category_id = {$category_id}";
$result=mysqli_multi_query($data,$sql) or die("query not set");
header("Location: http://localhost/news/admin/post.php");
?>