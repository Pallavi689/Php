// connect cteate show and sqlupdate php files
<html>
    <head>

    </head>
    <body>
        <h2>UPDATE RECORD</h2>
    <?php
    $data = mysqli_connect("localhost","root","","crud") or die("not connect");
    // $url_s_id is a variable which is take the value of user id because id pass in a url (show_table.php edit button) id is a primary key of our database get is a method
    $url_s_id = $_GET['id'] ;
    $sql = "SELECT * FROM student where s_id = {$url_s_id} ";
    $result=mysqli_query($data,$sql) or die("query not set");
    if(mysqli_num_rows($result) > 0){
        while($row=mysqli_fetch_assoc($result)){
    ?>
         <form method ="post" action ="sqlupdate.php">
            <!-- show the value by using id  in a (value block)-->
         
        <label >name:</label>
        <input type="hidden" name = "sid" value = "<?php echo $row['s_id'];?>">
        <input type="text" name = "name" value ="<?php echo $row['s_name'];?>"><br><br>
        roll number : <input type="text" name = "ro_no" value ="<?php echo $row['ro_no'];?>"><br><br>
        address : <input name="address"  value ="<?php echo $row['s_address'];?>"><br><br>
        
        phone : <input type="text" name= "phone" value ="<?php echo $row['phone'];?>"><br><br>
        <label >course :</label>
        
        <select name="course" >
        
        <option name="op" value ="<?php echo $row['course'];?>">select class</option>
        <?php
       
       $sql1 = "SELECT DISTINCT course FROM student";
       $result1=mysqli_query($data,$sql1) or die("query not set");
       while ($row1 = mysqli_fetch_assoc($result1)){
           
       ?>
        
        <option ><?php echo $row1["course"];?></option>
        <?php } ?>
        </select><br><br>
        
        <button>update</button>
</form>
<?php } }?>
    </body>
</html>
