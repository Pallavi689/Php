// pass throw the action in update.php form
<?php 
 $s_idd = $_POST['sid'];
 $s_name = $_POST['name'];
 $s_address = $_POST['address'];
 $s_phone = $_POST['phone'];
 $s_course = $_POST['course'];
 $s_rono = $_POST['ro_no'];

$data = mysqli_connect("localhost","root","","crud") or die("not connect");
$sql = " UPDATE student SET s_name = '{$s_name}',ro_no = '{$s_rono}', s_address = '{$s_address}' , phone = '{$s_phone}',course = '{$s_course}' WHERE s_id = '{$s_idd}'";
$result=mysqli_query($data,$sql) or die("query not set");
header("Location: http://localhost/crud/show_table.php");
?>
