// creating a form which take a user input and save our database 
<html>

    
        <head></head>
<body>
    <form method ="post" action ="save.php"> 
<!--         see save.php file -->
        name : <input type="text" name = "name"><br><br>
        roll number : <input type="text" name = "ro_no"><br><br>
        address : <textarea name="address" id="" cols="30" rows="10"></textarea><br><br>
        
        phone : <input type="text" name= "phone"><br><br>
        
        course :<select name="course">
        
        <option name="op">select class</option>
        <?php
        // perform query operation which is save a list of  course in drop down box on a basis of dataset
        $data = mysqli_connect("localhost","root","","crud") or die("not connect");
        $sql = "SELECT DISTINCT course FROM student";
        $result=mysqli_query($data,$sql) or die("query not set");
        while ($row = mysqli_fetch_assoc($result)){
        ?>
        <option ><?php echo $row["course"];?></option>
        <?php } ?>
        </select><br><br>
        
        <button>submit</button>
</form>
</body>
    </html>
