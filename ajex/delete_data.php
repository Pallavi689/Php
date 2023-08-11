// below the line of code separate to another like file show_data.php
<?php
// show table 
// $cons = mysqli_connect("localhost","root","","ajex");
// $sql = "SELECT * FROM student";
// $result = mysqli_query($cons,$sql) or die("not connected");
// $output = "";
// if(mysqli_num_rows($result) > 0){
//     $output= '<table >
//     <tr>
//     <th>id</th>
//     <th>name</th>
//     <th> delete </th>
//     </tr>';
//     while($row=mysqli_fetch_assoc($result)){
//         $output .= "<tr><td>{$row['std_id']}</td><td>{$row['first_name']} {$row['last_name']}</td><td><button class='del_but' data-id='{$row['std_id']}'>Delete</button></td></tr>";
//     }
//     $output .='</table>';
    
//     mysqli_close($cons);
//     echo $output;
// }else{
//     echo '<h1>not sata connect</h1>';
// }
 

?>
<!--  also separated another file like delete_ajax.php  -->
<?php
// delete 
// $id_s = $_POST['data_id'];
// $data = mysqli_connect('localhost','root','','ajex');
// $sql = "DELETE FROM student WHERE std_id = {$id_s}";
// if(mysqli_query($data,$sql)){
//     echo 1;
// }else{
//     echo 0;
// }
?>


<!--  actual code for delete including show_data.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
  border: 1px solid black;
}
    </style>
</head>
<body>
 
    <table id ="table-data">
  <tr>
    <th>id</th>
    <th>name</th>
    
  </tr>
  <?php 
   $cons = mysqli_connect("localhost","root","","ajex");
   $sql = "SELECT * FROM student";
   $result = mysqli_query($cons,$sql) or die("not connected");
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
   
  ?>
  <tr>
    <td><?php echo $row['std_id']; ?></td>
    <td><?php echo $row['first_name']." ". $row['last_name']; ?></td>
    
  </tr>
  <?php 
   }}
  ?>
</table>
<script type = 'text/javascript' src="jquery.js"> </script>
<!-- show table  -->
<script type = 'text/javascript'>
    $(document).ready(function(){
      function load(){
   
      $.ajax({
        url: "show_data.php",
        type :"POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    load();
  
  
    $(document).on("click",".del_but",function(){

     var id = $(this).data('id');
     var ele = this;
     $.ajax({
      url : "delete_ajax.php ",
      type : "POST",
      data : {data_id : id},
      success : function(data){
        // alert(data);
       if(data == 1){
        alert("data is deleted");
        $(ele).closest("tr").fadeOut();
       }else{
        alert("data is not deleted")
       }
      }
     });
      
    });
    
    });
</script>
</body>
</html>
