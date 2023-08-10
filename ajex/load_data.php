 // include a file ajex_load.php
<!-- After running the program, see the load button and a custom table. when a load button is clicked so you can see a dynamic table  -->
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
  
  <tr>
    <td>1</td>
    <td>row data</td>
  </tr>
</table>
<script type = 'text/javascript' src="jquery.js"> </script>
<!-- show table  -->
<script type = 'text/javascript'>
    $(document).ready(function(){
    $("#load-data").on('click',function(e){
      $.ajax({
        url: "ajex.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    });
    
    });
</script>
</body>
</html>
