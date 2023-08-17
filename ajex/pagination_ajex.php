//Create a page pagination.php

<?php
// $cons = mysqli_connect("localhost","root","","ajex");
// $limit_data = 4;
// $page = "";
// if(isset($_POST['page_no'])){
//     $page = $_POST['page_no'];
// }else{
//     $page =1;
// }
// $offset = ($page - 1)*$limit_data;
// $sql = "SELECT * FROM student LIMIT {$offset},{$limit_data}";
// $result = mysqli_query($cons,$sql) or die("not connected");
// $output = "";
// if(mysqli_num_rows($result) > 0){
//     $output .=  '<table id ="table-data">
//     <tr>
//     <th>id</th>
//     <th>name</th>
//     <th> delete </th>
//     <th> Update </th>
//     </tr>';

//     while($row=mysqli_fetch_assoc($result)){
//         $output .= "<tr><td>{$row['std_id']}</td><td>{$row['first_name']} {$row['last_name']}</td></tr>";
//     }
//     $output .='</table>';
//     $sql_data = "SELECT * FROM student";
//     $sql_result = mysqli_query($cons,$sql_data) or die("not connected");
//     $total_record = mysqli_num_rows($sql_result);
//     $total_page = ceil($total_record/$limit_data);
//     $output .= "<nav aria-label='Page navigation example' id ='pagination_page'><ul class='pagination justify-content-center'>";
//     for($i=1;$i<=$total_page;$i++){
        
//         if($i == $page){
//             $class_name = "active";
//         }else{
//             $class_name="";
//         }
//         $output .= "<li class='page-item'><a class='page-link  {$class_name}' id ='{$i}' href=''>{$i}</a></li>";
//     }
//     $output .=" </ul> </nav>";
//     mysqli_close($cons);
//     echo $output;
// }else{
//     echo '<h1>not sata connect</h1>';
// }

?>


<!--  main file -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>

        table tr td{
  border: 1px solid black;
}
#table_data{
  border: 1px solid black;
}
    </style>
</head>
<body>
<table id ="table-data"> 
</table>
<script type = 'text/javascript' src="jquery.js"> </script>
<!-- show table  -->
<script type = 'text/javascript'>
    $(document).ready(function(){
     function load_data(page){
      $.ajax({
        url : "pagination.php",
        type :"POST",
        data : {page_no : page},
        success : function(data){
          $("#table-data").html(data);
        }
      });
      
     }
     load_data();
     $(document).on("click","#pagination_page ul li a",function(e){
      e.preventDefault();
      var page_id = $(this).attr("id");
      
      load_data(page_id);
     })

    });

</script>
</body>
</html>

