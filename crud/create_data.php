
<html>

    
        <head></head>
<body>
    <form method ="post" action ="save.php">
        name : <input type="text" name = "name"><br><br>
        roll number : <input type="text" name = "ro_no"><br><br>
        address : <textarea name="address" id="" cols="30" rows="10"></textarea><br><br>
        
        phone : <input type="text" name= "phone"><br><br>
        
        course :<select name="course">
        
        <option name="op">select class</option>
        <?php
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