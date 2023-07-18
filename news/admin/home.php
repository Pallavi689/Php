<html>
    <head>
      <title>Login</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    </head>
    <body>
    <div class="container">
  <section id="content">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method = 'POST'>
      <h1>Login Form</h1>
      <div>
        <input type="text" placeholder="Username" required="" id="username" name = "username" />
      </div>
      <div>
        <input type="password" placeholder="Password" required="" id="password"  name = "password"/>
      </div>
      <div>
        <input type="submit" value="Login" name = "login" />
        <a href="forget.php">Lost your password?</a>
        <a href="add_user.php">Register</a>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div>
<?php

if(isset($_POST['login'])){
  $data = mysqli_connect("localhost","root","","news");

  $username = mysqli_real_escape_string($data,$_POST["username"]);
  $password = mysqli_real_escape_string($data,$_POST["password"]);
  $sql= "SELECT user_id,username, r_ole FROM user WHERE username = '{$username}' AND p_assword = '{$password}'";
  $result = mysqli_query($data,$sql) or die("query failed");
  if(mysqli_num_rows($result) > 0){
    
    while ($row = mysqli_fetch_assoc($result)){
      //create session and that is imp for required a login use on a header.php
        session_start();
       
        $_SESSION["username"]= $row['username'];
       $_SESSION ["userid"] = $row['user_id'];
       $_SESSION ["role"] = $row['r_ole'];
       header("location: http://localhost/news/admin/post.php");
    }
   

  }
  else{
    echo '<script>alert("wrong password or username")</script>';
  
  }

 }
?>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>