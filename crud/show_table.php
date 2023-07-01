// using thais code we can show our database table in our html file

<html>
<body>
    <style>
        table, th, td {
        border: 1px solid black;
       }
    </style>
<?php
//localhost = i use phpmyadmin baically it is a server name
//crud = database name 
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
    <td>course </td>
    <td> update </td>
    <!-- <td>class </td> -->
  </tr>
  <?php
  while($row = mysqli_fetch_assoc($result)){
  ?>
  
  <tr>
    <td><?php echo $row['s_id'];?></td>
    <td><?php echo $row['s_name'];?></td>
    <td><?php echo $row['ro_no'];?></td>
    <td><?php echo $row['s_address'];?></td>
    <td><?php echo $row['phone'];?></td>
    <td><?php echo $row['course'];?></td>
    
    <!-- update.php?id= this line is used to pass id(in a url) for update the info of the student by giving student id -->
    <td><a href="create_data.php"><button >add </button></a>
      <a href="update.php?id=<?php echo $row['s_id'];?>"><button >edit </button></a> 
    <a href="delete.php?id=<?php echo $row['s_id'];?>"> <button> delete</button></a></td>
  </tr>
  <?php } ?>
</table>
<?php }else{
    echo "no record";
} ?>

</body>
</html>
