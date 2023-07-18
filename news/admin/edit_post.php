<?php include 'header.php' ; 
  // if user update details of another user so wrong
  if($_SESSION['role'] == 0){
   $data = mysqli_connect("localhost","root","","news");
   $post = $_GET['id'];
   $sql2= "SELECT author FROM post WHERE post_id = {$post} ";
   $result2 = mysqli_query($data,$sql2) or die("query failed");
   $row2 = mysqli_fetch_assoc($result2);
   if($row2['author'] != $_SESSION['userid']){
    header("location: http://localhost/news/admin/post.php");
   }
  }elseif($_SESSION['role'] == 1){
    $data = mysqli_connect("localhost","root","","news");
    $post = $_GET['id'];
    $sql2= "SELECT author FROM post WHERE post_id = {$post} ";
    $result2 = mysqli_query($data,$sql2) or die("query failed");
    $row2 = mysqli_fetch_assoc($result2);
    if($row2['author'] != $_SESSION['userid']){
     header("location: http://localhost/news/admin/post.php");
    }}
?>

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
            margin-top:100px;
        }
    </style>    
</head>
    <body>

    <?php
   $data = mysqli_connect("localhost","root","","news");
   $post = $_GET['id'];
   $sql= "SELECT * FROM post LEFT JOIN category ON post.category = category.category_id 
   LEFT JOIN user ON post.author = user.user_id WHERE post.post_id = {$post} ";
   
   $result = mysqli_query($data,$sql) or die("query failed");
   if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
       
  
  ?>
    <u><h2 class = "h">EDIT POST</h2></u>
    <div class = "box">
    <!-- enctype="multipart/form-date" = is used when we get a image input by user -->
    <form class = "fo"  action="sql_update_post.php" method = "POST"  enctype = "multipart/form-data">
  <br>

  <br>
  
    <div class="form-group ">
      <label for="inputEmail4" >Title</label>
      <input type="hidden" class="form-control" id="inputEmail4"  name = 'id'  value = "<?php echo $row['post_id']; ?>" required/>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Title" name = 'title'  value = "<?php echo $row['title']; ?>" required/>
    </div>

   
    <label for="inputAddress2" >Category</label>
    <select class="form-control" name = 'category' required>
  <option disabled>select category</option>
  <?php
  
   $data = mysqli_connect("localhost","root","","news");
   $sql1 = "SELECT * FROM category";
   $result1 = mysqli_query($data,$sql1) or die("query failed");
   if(mysqli_num_rows($result1)){
    while($row1 = mysqli_fetch_assoc($result1)){
        // if condiation for select fill value
         if($row['category'] == $row1['category_id']){
           $selected ="selected";
         }else
         {
            $selected ="";
         }
        echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
    }
   }
  ?>
</select>
  <!-- update category so the post seaction increase and decreasa according to user changes(chech any chages or not)  thats why create hidden -->
   <input type="hidden" name="old_category" value="<?php echo $row['category'];?>"> 


  <div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1"  name = "description"  required>
    <?php echo $row['d_escription']; ?>     
</textarea>
  </div>
 
  <input type="file" name ="image" ><br>
  <!-- image show -->
    <img src="image/<?php echo $row['post_img']; ?>" height ="150px" >
    <!-- if user not upload new image -->
    <input type="hidden" name ="old-image" value ="<?php echo $row['post_img']; ?>" >
    
  <div class="input-group mb-3">
</div>
  <button type="submit" name = "post" class="btn btn-primary form-group col-md-12">UPDATE</button><br><br>
</form>
</div>
<?php 
 }
}else{
    echo "result not found";
}
?>

    </body>
</html>