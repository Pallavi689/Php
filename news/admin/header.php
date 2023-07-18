<?php
// this line of codes is use for check user login or not login if user not login and jump to the another page so no jump whenever not create session you cant jump another page it redirect a home login page
 $data = mysqli_connect("localhost","root","","news");
 session_start();
 if(!isset(  $_SESSION["username"])){
  header("location: http://localhost/news/admin/");
 }

 $page= basename($_SERVER['PHP_SELF']);
 switch($page){
 case "post.php":{
        $page_title ="post news";
   }
   break;
   case "category.php":{
    $page_title ="user category";
}
break;
case "user.php":{
  $page_title ="user";
}
break;
case "home.php":{
  $page_title ="Login";
}
break;
   default:
   $page_title="admin pannel";
 
 break;
      }
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title><?php echo $page_title; ?></title>
    <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
 
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
 
body {
  font-family: 'Open Sans', sans-serif;
  color: #222;
  padding-bottom: 50px;
}
span{
  color: #1DBF73;
  font-size: 50px;
}
span:hover{
  color: #fff;
  transition: 0.5s;
}
.container {
  max-width: 1200px;
  margin: 0 auto;
}
.logo{
font-size: 46px;
color: #fff'
}
.nav {
  position: fixed;
  background-color: #222;
  top: 0;
  left: 0;
  right: 0;
  height: 100px;
  transition: all 0.3s ease-in-out;
}
 
.nav .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 0;
  transition: all 0.3s ease-in-out;
}
 
.nav ul {
  display: flex;
  list-style-type: none;
  align-items: center;
  justify-content: center;
}
 
.nav a {
  color: #fff;
  text-decoration: none;
  padding: 7px 15px;
  transition: all 0.3s ease-in-out;
}
 
.nav.active {
  background-color: #fff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}
 
.nav.active a {
  color: #000;
}
 
.nav.active .container {
  padding: 10px 0;
}
 
.nav a.current,
.nav a:hover {
  color: #1DBF73;
  font-weight: bold;
}
a{
    text-decoration: none;}
  </style>
  </head>
  <body>
    <nav class="nav">
      <div class="container">
        <h3 style="color:white;">Welcome <?php echo $_SESSION['username']; ?></h3>
        <ul>
          <li><a href="post.php" class="current">Home</a></li>
          
          <li><a href="post.php">Post</a></li>
          <?php 
          if($_SESSION['role'] == '1'){ ?>
          <li><a href="category.php">Category</a></li>
          <li><a href="user.php">Users</a></li>
         <?php } ?>
          <li><a href="add_user.php">Add user</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </div>
    </nav>
 
    
    
    <script src="script.js"></script>
  </body>
</html>