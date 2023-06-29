<html>
<body>
    <style>
        table, th, td {
        border: 1px solid black;
       }
    </style>
<?php
$data = mysqli_connect("localhost","root","","crud") or die("not connect");
$sql = "SELECT * FROM student";
$result=mysqli_query($data,$sql) or die("query not set");
if(mysqli_num_rows($result) > 0){
?>
<table>
  <tr>
    <td>id</td>
    <td>name</td>
    <td>roll no.</td>
    <td>address</td>
    <td>phone no.</td>
  </tr>
  <?php
  while($row = mysqli_fetch_assoc($result)){
  ?>
  
  <tr>
    <td><?php echo $row['s_id'];?></td>
    <td><?php echo $row['s_name'];?></td>
    <td><?php echo $row['ro_no'];?></td>
    <td><?php echo $row['address'];?></td>
    <td><?php echo $row['phone'];?></td>
  </tr>
  <?php } ?>
</table>
<?php }else{
    echo "no record";
} ?>
</body>
</html>