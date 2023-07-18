<?php include 'header.php' ; ?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <style>
        .box{
            margin-top:10px;
            width:50%;
            margin : auto;
            background: #ebebeb; 
            
        }
        .fo{
            width: 70%;
            margin : auto;
        }
        .h{
            margin-top:130px;
            text-align:center;
        }
    </style>    
</head>
    <body>
    <?php
    if(isset($_POST['add'])){
      $data = mysqli_connect("localhost","root","","news");
      $cat = mysqli_real_escape_string($data,$_POST['category']);
      $sql = "SELECT category_name FROM category WHERE category_name = '{$cat}'";
      $result = mysqli_query($data,$sql) or die ("query faield");
      if(mysqli_num_rows($result)>0){
        echo   " category alrady exist";
      }else{
        echo "INSERT INTO category(category_name) values('{$cat}')";
        die();
        if(mysqli_query($data,$sql1)){
          header("location: http://localhost/news/admin/category.php");
        } else{
            echo "query failed" ;
          }
      }
    }
    ?>
   
    <u><h2 class = "h">ADD CATEGORY</h2></u>
    <div class = "box">
    
    <form class = "fo"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST"  >
  <br>

  <br>
  
    <div class="form-group ">
      <label for="inputEmail4">category </label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Category" name = 'category' required>
    </div>

   

  <button type="submit" name = "post" class="btn btn-primary form-group col-md-12" name = 'add'>ADD</button><br><br>
</form>
</div>

    </body>
</html>