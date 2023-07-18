<!-- create dinamic title -->
<?php
//use to chek server 
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

//without basename
// echo $_SERVER['PHP_SELF'];

//with base name return only file name
$page= basename($_SERVER['PHP_SELF']);

switch($page){
case "single.php":
  if(isset($_GET['id'])){
    $data_title = mysqli_connect("localhost","root","","news");
       $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
       $result_title =  mysqli_query($data_title,$sql_title) or die("title Query failed");
       $row_title = mysqli_fetch_assoc($result_title);
       $page_title = $row_title['title']." News";
  }else{
      $page_title="no post";
  }
  break;
  case "category.php":
    if(isset($_GET['id'])){
      $data_title = mysqli_connect("localhost","root","","news");
         $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['id']}";
         $result_title =  mysqli_query($data_title,$sql_title) or die("category Query failed");
         $row_title = mysqli_fetch_assoc($result_title);
         $page_title = $row_title['category_name'] ." News";
    }else{
        $page_title="no category";
    } 
    break;
  case "author.php":
      if(isset($_GET['id'])){
        $data_title = mysqli_connect("localhost","root","","news");
           $sql_title = "SELECT * FROM user  WHERE user_id = {$_GET['id']}";
           $result_title =  mysqli_query($data_title,$sql_title) or die("category Query failed");
           $row_title = mysqli_fetch_assoc($result_title);
           $page_title ="News by : ". $row_title['first_name']." ".$row_title['last_name'] ;
      }else{
          $page_title="no category";
      } 
    break;
    case "search.php":
      if(isset($_GET['search'])){
           $page_title = $_GET['search'];
      }else{
          $page_title="no search";
      } 
    break;  
  default:
  $page_title="News web";

break;
}
?>
<html>
    <head>
      <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    </head>
    <body>
    <?php
       $data = mysqli_connect("localhost","root","","news");
      //  $url_id = $_GET['id'];
       $sql = "SELECT * FROM category WHERE post > 0";
       $result =  mysqli_query($data,$sql) or die("Query failed");
       if(mysqli_num_rows($result) > 0){
      ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
    <ul class="nav justify-content-center  ">
    <li class="navbar-nav mr-auto ml-4">
        <a class="nav-link " href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <?php

        while($row = mysqli_fetch_assoc($result)){
          
      ?>
    <li class="navbar-nav mr-auto ml-4">
        <a class="nav-link " href="category.php?id=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?><span class="sr-only">(current)</span></a>
      </li>
      <?php } ?>
      <li class="navbar-nav mr-auto ml-4">
        <a class="nav-link " href="admin/">Login<span class="sr-only">(current)</span></a>
      </li>
</ul>

</nav>
<?php } ?><br>

 <form class="form-inline" method="get" action="search.php">
    
    <div style= "margin:auto;" col-md-6>
      <input type="text" name="search" class="form-control" placeholder="Search">
    <button type="submit" class="btn btn-outline-success">Search</button>
   
   
      </div>
    </form>
    
    <!-- <input type="text" name="search" class="form-control" placeholder="Search roll no..">
    
  </form> -->
    
    </body>
</html>