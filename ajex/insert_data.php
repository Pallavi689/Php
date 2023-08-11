//Also, download insert_ajax.php
<!-- In this code, you can insert your data into the database  -->
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
  <form id ="inputdata">
   <input type="text" id ="fname">
   <br><br>
   <input type="text" id = "lname">
   <br><br>
    <button id="submit">submit</button><br><br>
    </form>
    <table id ="table-data">
        
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
      //When you need to load data on your page
    //   function load(){
   
    //   $.ajax({
    //     url: "ajex.php",
    //     type :"POST",
    //     success : function(data){
    //       $("#table-data").html(data);
    //     }
    //   });
    // }
    
  
    $("#submit").on("click",function(e){
       e.preventDefault(); // stop the submit preporty
       var fname = $("#fname").val();
       var lname = $("#lname").val();
         if(fname == "" || lname == ""){
        alert("all field are required");
       }else{
       $.ajax({
        url : "insert_ajex.php",
        type : "POST",
        data : {first_name : fname , last_name : lname},
        success : function(data){
          if(data == 1){
            alert("data is inserted");
            //load();
          }else{
            alert("not show");
          }
        }
       });
             // reset form after submitting
              $("#inputdata").trigger("reset");
    }
    });
    
    });
</script>
</body>
</html>
