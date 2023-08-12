// saperated by another file search.php
<?php
// search
// $search_data = $_POST['search_'];
// $data = mysqli_connect('localhost','root','','ajex');
// $sql = "SELECT * FROM student WHERE first_name LIKE '%{$search_data}%' OR last_name LIKE '%{$search_data}%'";
// $result = mysqli_query($data,$sql) or die("not connected");
// $output = "";
// if(mysqli_num_rows($result) > 0){
//     $output= '<table >
//     <tr>
//     <th>id</th>
//     <th>name</th>
//     <th> delete </th>
//     <th> Update </th>
//     </tr>';
//     while($row=mysqli_fetch_assoc($result)){
//         $output .= "<tr><td>{$row['std_id']}</td><td>{$row['first_name']} {$row['last_name']}</td><td><button class='del_but' data-id='{$row['std_id']}'>Delete</button></td><td><button class='edit_but' data-eid='{$row['std_id']}'>Update</button></td></tr>";
//     }
//     $output .='</table>';
    
//     mysqli_close($data);
//     echo $output;
// }else{
//     echo '<h1>not sata connect</h1>';
// }

?>

<!-- // final file -->
<!-- including some previous file -->


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
#table_data{
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
 
    <div>
      <label>Search : </label>
      <input type="text" id="search" autocomplete="off">
    </div>
    <br><br>

    <table id ="table-data">
 
  
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

      });
    });

    $("#search").on("keyup",function(){
      var search_data = $(this).val();
   
      $.ajax({
         url : "search.php",
         type : "POST",
         data : { search_ : search_data},
         success : function(data){
           $("#table-data").html(data);
         }
      });
    });
    });
</script>
</body>
</html>
