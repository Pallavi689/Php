//A serialize is a function that is used to send all the data in one line in Ajax
<!-- Why use this? because in a ( data 'in ajax: send as a object ) if we have a lot of data then the object method becomes complex That's why using serialize function to reduce the complexity of the program  -->
<!-- create save.php  -->
<?php
// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $data = mysqli_connect('localhost','root','','ajex');
// $sql = "INSERT INTO student ( first_name, last_name) VALUES ('{$fname}', '{$lname}')";
// if(mysqli_query($data,$sql)){
//     echo "yes {$fname} {$lname}" ;
// }else{
//     echo "no {$fname} {$lname}" ;
// }

?>



<!--main  -->
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" id = "form_data">
        <label for="">name</label>
        <input type="text" name ="fname">
        <label for="">last name</label>
        <input type="text" name ="lname">
        <input type="submit" name ="submit" id="submit" value ="save">
    </form>
    
    <div  role="alert" id = 'response'>
  
    </div>
    <script type = 'text/javascript' src="jquery.js"></script>
    <script>
        $(document).ready(function(){
         $('#submit').click(function(e){
            e.preventDefault();
            //  $('#response').html($('#form_data').serialize());
            $.ajax({
                url : "save.php",
                type : "POST",
                data : $("#form_data").serialize(),

                //beforesend:function is used to show loading before submit 
                beforesend:function(){
                    $("#response").html('loading data');
                }
                success : function(data){
                    $("#form_data").trigger('reset');
                  $('#response').html(data);   

                  // set a time after 4s bellow message is remove automatic 
                  setTimeout(function(){
                   $('#response').fadeOut("slow"); 
                  }, 4000);
                 }
            });
         });
        });
    </script>
</body>
</html>
