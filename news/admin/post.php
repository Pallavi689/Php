<?php include 'header.php' ; ?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <style>
      
      #table{
        width: 80%;
        margin: auto;
         margin-top:10px;
      }
      body{
        background-color: #f2f2f2;
      }
      .h{
        margin-top:150px;
       text-align:center;
       color:  #1DBF73;
      }
      .hh{
       
       text-align:center;
       color:  #1DBF73;
       
      }
      
    </style>
</head>
    <body>
    
   <h1 class = "h">
    ALL POST

   </h1>
   
  <h2 class = "hh">
    <a href="add_post.php"><button type="button" class="btn btn-dark ">ADD POST</button></a></h2>
    <table class="table table-dark" id = "table">

    <?php
    if($_SESSION['role'] == '1'  ){
      $data = mysqli_connect("localhost","root","","news");
      $sql = "SELECT * FROM post
      LEFT JOIN category ON post.category = category.category_id
      LEFT JOIN user ON post.author= user.user_id WHERE user.r_ole = '1' AND user.user_id = {$_SESSION['userid']}
      ORDER BY post.post_id DESC";
    }elseif($_SESSION['role'] == '0'){
      $data = mysqli_connect("localhost","root","","news");
      $sql = "SELECT * FROM post
      LEFT JOIN category ON post.category = category.category_id
      LEFT JOIN user ON post.author= user.user_id WHERE user.r_ole = '0' AND user.user_id = {$_SESSION['userid']}
      ORDER BY post.post_id DESC";
    }
      $result=mysqli_query($data,$sql) or die("query not set");
      if(mysqli_num_rows($result) > 0){
  
    ?>
      
  <thead>
  
 
   </div>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Title</th>
      
      <th scope="col">Category</th>
      <th scope="col">Date</th>
      <th scope="col">Author</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <?php
  $num = 0;
  $num1 = $num + 1;
  while($row = mysqli_fetch_assoc($result)){
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $num1; ?></th>
      <td><?php echo $row['title']; ?></td>
      
      <td><?php echo $row['category_name']; ?></td>
      <td><?php echo $row['post_date']; ?></td>
      <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
      <td><a href="edit_post.php?id=<?php echo $row['post_id'];?>"><button class="btn"><i class="fa fa-folder"></i></button></a></td>
      <td><a href="delete_post.php?id=<?php echo $row['post_id'];?>&cat=<?php echo $row['category_id'];?>"><button class="btn"><i class="fa fa-trash"></i></button></a></td>
    </tr>
   
  </tbody> 
 
 <?php 
 $num1++;} ?>
</table><br>
<?php } ?>
<!-- pagination -->

  
  






    </body>
</html>