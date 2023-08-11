//Create an update.php file and write that line of the code
<!-- where open a form and write what you need to change -->
<?php
// $id = $_POST['id'];
// $cons = mysqli_connect("localhost","root","","ajax");
// $sql = "SELECT * FROM student WHERE std_id = {$id}";
// $result = mysqli_query($cons,$sql) or die("not connected");
// $output = "";
// if(mysqli_num_rows($result) > 0){

//     while($row=mysqli_fetch_assoc($result)){
//         $output = "
//         <tr>
//         <td>First name</td>
//         <td><input type='text' id='edit_fname' value = '{$row["first_name"]}'>
//         <input type='hidden' id='s_id' value = '{$row["std_id"]}'> </td>
//        </tr>
//        <tr>
//         <td>last name</td>
//         <td><input type='text' id='edit_lname'  value = '{$row["last_name"]}'> </td>
//        </tr>
//        <tr>
//         <td></td>
//         <td><input type='submit' id='edit_submit' value='save'> </td>
//        </tr>";
//     }
   
    
//     mysqli_close($cons);
//     echo $output;
// }else{
//     echo '<h1>not sata connect</h1>';
// }
 
?>

<!-- Create an update_ajax.php file and write that line of the code -->
<!-- update data in database  -->

<?php
// $id_s = $_POST['id'];
// $fname = $_POST['f_name'];
// $lname = $_POST['l_name'];
// $data = mysqli_connect('localhost','root','','ajex');
// $sql = "UPDATE student SET first_name = '{$fname}', last_name = '{$lname}' WHERE std_id = {$id_s}";
// if(mysqli_query($data,$sql)){
//     echo 1;
// }else{
//     echo 0;
// }
?>

<!-- final page -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #table-data{
  border: 1px solid black;
}
#up{
  background: rgba(0,0,0,0.7);
  position: fixed;
  left: 0;
  top:0;
  width:100%;
  height:100%;
  z-index : 100;
  display: none;

}
#upp{
  background:#fff;
  width:20%;
 
  position: relative;
  top:15%;
  left:calc(50%-15%);
  padding:5px;
  border-radius:4px;
  margin:auto;
  

}
#close_btn{
  background:red;
  color:white;
  width:30px;
  height:30px;
  line-height:30px;
  text-align:center;
  border-radius:50%;
  position:absolute;
  top:-15px;
  right: -15px;
  cursor: pointer;
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
<div id = "up">
  <div id = "upp">
   <h1>Edit</h1>
   <table  width="100%">
     <tr>
      <td>First name</td>
      <td><input type="text" id="edit_fname"></td>
     </tr>
     <tr>
      <td>last name</td>
      <td><input type="text" id="edit_lname"></td>
     </tr>
     <tr>
      <td></td>
      <td><input type="submit" id="edit_submit" value="save"></td>
     </tr>
   </table>
   <button id="close_btn">X</button>
  </div>
</div>
<script type = 'text/javascript' src="jquery.js"> </script>
<!-- show table  -->
<script type = 'text/javascript'>
    $(document).ready(function(){
      function load(){
   
      $.ajax({
        url: "ajex.php",
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
      url : "insert.php ",
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
   

    $(document).on("click",".edit_but",function(){
     $("#up").show();
     var s_name = $(this).data('eid');
     $.ajax({
      url: "update.php",
      type : "POST",
      data :{id : s_name},
      success : function(data){
           $("#upp table").html(data);
      }
     })
    });
    
    $("#close_btn").on("click",function(){
      $("#up").hide();
    });

    $(document).on("click","#edit_submit",function(){
      var sid = $("#s_id").val();
      var fname = $("#edit_fname").val();
      var lname = $("#edit_lname").val();

      $.ajax({
        url:"update_ajax.php",
        type : "POST",
        data : {id : sid , f_name : fname , l_name : lname},
        success:function(data){
          if(data == 1){
          $("#up").hide();
          load();
          }
        }

      })
    })
    });
</script>
</body>
</html>
