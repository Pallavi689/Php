<?php include 'header.php' ; ?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <style>
            
        </style>

    </head>
    <body>
        <?php
        $data = mysqli_connect("localhost","root","","news");
         if(isset($_GET['id'])){
            $url_id = $_GET['id'];
          }
        //  $sql1="SELECT * FROM post JOIN user ON post.author = user.user_id WHERE post.author = {$url_id}";
        $sql1="SELECT * FROM user  WHERE user_id = {$url_id}";
         $result1 = mysqli_query($data,$sql1) or die("query not set");
         $row1 = mysqli_fetch_assoc($result1);

        ?>
    <h2 class="text-muted" style="text-align:center;"><?php echo $row1['first_name']." ".$row1['last_name']; ?></h2>
    <hr class="hr hr-blurry" style="width:80%"/>
    <?php
      
     
      $sql = "SELECT * FROM post
       LEFT JOIN category ON post.category = category.category_id
       LEFT JOIN user ON post.author= user.user_id
       WHERE post.author = {$url_id}
       ORDER BY post.post_id DESC";
      $result =  mysqli_query($data,$sql) or die("Query failed");
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
     ?>
     
    <div class="card mb-3 bg-light" style="width: 800px; margin:auto; margin-top:20px;">
    
   
  <div class="row no-gutters bg-light">
   
    
    <div class="col-md-4 row no-gutters bg-light " style="margin:auto;" >
    <a href="single.php?id=<?php echo $row['post_id']; ?>  "><img src="admin/image/<?php echo $row['post_img'] ;?>" class="card-img"  ></a>
    </div>
    <div class="col-md-8 card ">
      <div class="card-body">
       <a href="single.php?id=<?php echo $row['post_id']; ?>" style="text-decoration: none ;"><h5 class="card-title text-muted" ><?php echo $row['title'];?></h5></a>
       <hr class="hr hr-blurry" />
       <a href="category.php?id=<?php echo $row['category_id']; ?>"><p class="text-muted"><?php echo $row['category_name']?></p></a>
       <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
 <?php echo $row['first_name']." ".$row['last_name'];?>  </p>
 <hr class="hr hr-blurry" />
       <!-- substr(string,starting,ending) reduce the para -->

        <p class="card-text "><?php echo substr($row['d_escription'],0,150)."...." ;?></p>

        <hr class="hr hr-blurry" />
        <p class="card-text"><small class="text-muted"><?php echo $row['post_date'] ;?> 
            <a href="single.php?id=<?php echo $row['post_id']; ?> "><button type="button" class="btn btn-secondary btn-sm" style="float:right;">Read more</button></a></small></p>
       
      </div>
    </div>
  
  </div>

</div>

<?php 
    }
  }else{
    echo '<h2>no record found</h2>';
  }
  ?>
  
    </body>
</html>