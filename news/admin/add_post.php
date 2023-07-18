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
            text-align:center;
        }
    </style>    
</head>
    <body>

   
    <u><h2 class = "h">ADD POST</h2></u>
    <div class = "box">
    <!-- enctype="multipart/form-date" = is used when we get a image input by user -->
    <form class = "fo"  action="save_post.php" method = "POST"  enctype = "multipart/form-data">
  <br>

  <br>
  
    <div class="form-group ">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Title" name = 'title' required>
    </div>

   
    <label for="inputAddress2" >Category</label>
    <select class="form-control" name = 'category' required>
  <option disabled>select category</option>
  <?php
   $data = mysqli_connect("localhost","root","","news");
   $sql1 = "SELECT * FROM category";
   $result1 = mysqli_query($data,$sql1) or die("query failed");
   if(mysqli_num_rows($result1)){
    while($row = mysqli_fetch_assoc($result1)){
        echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
    }
   }
  ?>
</select>
    
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "description" required></textarea>
  </div>

  

  <!-- <div class="form-row"> -->
    <!-- <div class="form-group col-md-6">
      <label for="inputState">Date</label>
      <input type="date" class="form-control" id="inputZip" name = 'date'>
    </div> -->

    <!-- <div class="form-group ">
      <label for="inputZip">Author</label>
      <input type="text" class="form-control" id="inputZip" placeholder="Author" name = "author" required>
    </div> -->
  <!-- </div> -->

  
  
 
 
  <input type="file" name ="image">
    
  <div class="input-group mb-3">
</div>
  <button type="submit" name = "post" class="btn btn-primary form-group col-md-12">POST</button><br><br>
</form>
</div>

    </body>
</html>