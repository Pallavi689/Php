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
  <!-- show table  -->
    <button id="load-data"> load data</button>
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
    $("#load-data").on('click',function(e){
      $.ajax({
        url: "ajex.php",
        type :"POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    });}
    
    });
</script>
</body>
</html>