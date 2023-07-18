<html>
    <head>
    <link rel="stylesheet" type="text/css" href="loginstyle.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    </head>
    <body>
    <?php
   
     $data = mysqli_connect("localhost","root","","news");
     $username = mysqli_real_escape_string($data,$_POST['username']);
    
     
     $sql = "SELECT user_id FROM user WHERE username = '{$username}'";
     
     $result = mysqli_query($data,$sql) or die("Query failed");
    
     ?>
    
   
    <div class="container">
  <section id="content">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method = 'POST'>
      <h1>username</h1>
      <div>
        <input type="text" placeholder="Username" required="" id="username" name = "username" />
      </div>
      <?php
     while($row = mysqli_fetch_assoc($result)){
     ?>
      <div>
      <a href="forget.php?id=<?php echo $row['user_id'];?>"><input type="submit" value="continue" name = "login" /></a>
       
      </div>
   <?php } ?>  
    </form><!-- form -->
    
  </section><!-- content -->
</div>

</body>
</html>