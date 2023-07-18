<?php

 $data = mysqli_connect("localhost","root","","news");
      if(isset($_FILES['image'])){
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        // explode is used to break tha word '.' and end() use to give last word after break
        $f_ext = explode('.',$file_name);
        $file_ext = end($f_ext);
        $extensions = array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions) === false){
            $errors[]= 'this extensions file not allowed , please choose a jpg,jpeg and png file';
        }
        if($file_size > 3145728){
            $errors[]= 'file size must be 3MB or lower'; 
        }
       // if file name is same so solve problem using date include
       $image_name =  time()."-".basename($file_name);
       $target = "image/".$image_name;
       $new_name = $image_name;
        if(empty($errors) == true){
            //file upload where 'image' is a folder name 
            // move_uploaded_file($file_tmp,"image/".$file_name);
            move_uploaded_file($file_tmp,$target);
        }else{
            print_r($errors);
            die();
        }
    //     echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

      }

    
     $title =  mysqli_real_escape_string($data,$_POST['title']);
     $category =  mysqli_real_escape_string($data,$_POST[ 'category']);
    $description =  mysqli_real_escape_string($data,$_POST['description']);
    //curent date
    $date =  date("d M Y");
   
    //home.php save role on that file so we will simply get the userif which is save in session it return id neumaric value thats why we are not useing '' 
    session_start();
    $author = $_SESSION ["userid"] ;
    $sql= "INSERT INTO post (title,d_escription,category,post_date,author,post_img) VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$new_name}'); ";
    
    // concatinate valuses and update category
    $sql .="UPDATE category SET post = post + 1 WHERE category_id = {$category};";
    //mysqli_multi_query() user when run more then one sql 
   if(mysqli_multi_query($data,$sql))
   {
    header("location: http://localhost/news/admin/post.php");

   } else{
    echo "query failed";
   }


    ?>