<?php include 'header.php' ; ?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    
    <style>
      
      #table{
        width: 60%;
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
    <?php
     $date = mysqli_connect("localhost","root","","news");
     $sql = "SELECT * FROM category";
     $result = mysqli_query($data,$sql) or die ("query faield");
     if(mysqli_num_rows($result) > 0){
     ?>
    ?>
   <h1 class = "h">
    CATEGORY
   </h1>

   <!-- <h2 class = "hh">
    <a href="add_category.php"><button type="button" class="btn btn-dark ">ADD CATEGORY</button></a></h2> -->
    <table class="table table-dark" id = "table">
 
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CATEGORY</th>
      <th scope="col">POST</th>

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
    </tr>
  </thead>
  <?php
  while($row = mysqli_fetch_assoc($result)){
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['category_id']; ?></th>
      <td><?php echo $row['category_name'] ?></td>
      <td><?php echo $row['post']; ?></td>
      <!-- <td><button class="btn"><i class="fa fa-folder"></i></button></td>
      <td><button class="btn"><i class="fa fa-trash"></i></button></td> -->
    </tr>
   
  </tbody>
 
  <?php } ?>
</table><br>




  
    <!-- // <li class="page-item disabled">
    //   <a class="page-link" href="#" tabindex="-1">Previous</a>
    // </li>
    // <li class="page-item"><a class="page-link" href="#">1</a></li>
    // <li class="page-item"><a class="page-link" href="#">2</a></li>
    // <li class="page-item"><a class="page-link" href="#">3</a></li>
    // <li class="page-item">
    //   <a class="page-link" href="#">Next</a>
    // </li> -->




<?php }else{
    echo "no record";
} ?>


    </body>
</html>