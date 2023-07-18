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
      
    </style>
</head>
    <body>
    <?php
    $data = mysqli_connect("localhost","root","","news");
    $limit = 3;
   
    if(isset($_GET['page'])){
      $url_page=$_GET['page'];
    }else{
       // for first page when cant pass page number in url 
      $url_page=1;
    }
    // limit offset = 0 , limit where limit fixed and offset change according for loop present down 
    $offset =($url_page -1)*$limit;
    // query for pagination
    $sql = "SELECT * FROM user ORDER BY user_id  LIMIT {$offset},{$limit}";
    $result = mysqli_query($data,$sql) or die ("query faield");
    if(mysqli_num_rows($result) > 0){
    ?>
   <h1 class = "h">
    ALL USERS
   </h1>
    <table class="table table-dark" id = "table">

  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Full Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Role</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <?php
  // s.no increase by on serial no.
  $num1 = $offset + 1;
  while($row = mysqli_fetch_assoc($result)){
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $num1; ?></th>
      <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php 
         if($row['r_ole'] == 1){
            echo "Admin";
         }else{
            echo "User";
         } ?></td>
      <td><a href="edit_user.php?id=<?php echo $row['user_id'];?>"><button class="btn"><i class="fa fa-folder"></i></button></a></td>
      <td><a href="delete_user.php?id=<?php echo $row['user_id'];?>"><button class="btn"><i class="fa fa-trash"></i></button></a></td>
    </tr>
   
  </tbody>
 
  <?php 

$num1++;} ?>
</table><br>
<!-- pagination -->
<?php
$sql1 = "SELECT * FROM user";
$result1 = mysqli_query($data,$sql1);
if(mysqli_num_rows($result1)> 0 ){
  $total = mysqli_num_rows($result1);
  $limit = 3 ;
  $pages = ceil($total/$limit);
  echo '<nav aria-label="Page navigation example">';
  echo '<ul class="pagination justify-content-center">';
  // previous condiation
  if($url_page >>1){
  echo '  <li class="page-item ">
          <a class="page-link" href="user.php?page= '.($url_page-1).'" tabindex="-1">Previous</a>
         </li>';
  }
  // divide page in page number
  for($i=1;$i<=$pages;$i++){
    // if check and show active page as highlite
    if($i == $url_page){
      $active = "active";
    }  else{
      $active = "";
    }
    echo '<li class="page-item '.$active.'"><a class="page-link" href="user.php?page='.$i.'">'.$i.'</a></li>';
    
  }
  // next condiation
  if($total >> $url_page){
  echo '<li class="page-item">
  <a class="page-link" href="user.php?page= '.($url_page+1).'">Next</a>
  </li> ';}
   echo '</nav>';
   echo '</ul>';
  
} 
?>


  
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