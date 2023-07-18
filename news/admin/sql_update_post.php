<?php
$data = mysqli_connect("localhost","root","","news");
if(empty($_FILES['image']['name'])){
    // if user not change image
//    $file_name = $_POST['old-image'];//hidden ip field

$new_name = $_POST['old-image']; //same file

}else{
// image upload post in add_post.php
unlink("image/".$_POST['old-image']);
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
   $new_name =  time()."-".basename($file_name);
   $target = "image/".$new_name;
   //$new_image = $image_name;

    if(empty($errors) == true){
        //file upload where 'image' is a folder name 
        move_uploaded_file($file_tmp,$target);
    }else{
        print_r($errors);
        die();
    }
}

$sql= "UPDATE post SET title = '{$_POST['title']}' ,category ={$_POST['category']}, d_escription ='{$_POST['description']}'  , post_img ='{$new_name}' WHERE post_id = {$_POST['id']};";

// chech any changes in category 
if($_POST['old_category'] != $_POST['category']){
    $sql.="UPDATE category SET post=post - 1 WHERE category_id = {$_POST['old_category']};"; 
    $sql.="UPDATE category SET post=post + 1 WHERE category_id = {$_POST['category']}"; 
}
// $sql.="UPDATE category SET post=post -1 WHERE category_id = {$category_id}";
$result = mysqli_multi_query($data,$sql) or die ("query faild") ;
if($result){
    header("location: http://localhost/news/admin/post.php");

}
?>