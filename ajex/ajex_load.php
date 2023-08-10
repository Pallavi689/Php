<?php
show table 
$cons = mysqli_connect("localhost","root","","ajex");
$sql = "SELECT * FROM student";
$result = mysqli_query($cons,$sql) or die("not connected");
$output = "";
if(mysqli_num_rows($result) > 0){
    $output= '<table >
    <tr>
    <th>id</th>
    <th>name</th>
    
    </tr>';
    while($row=mysqli_fetch_assoc($result)){
        $output .= "<tr><td>{$row['std_id']}</td><td>{$row['first_name']} {$row['last_name']}</td></tr>";
    }
    $output .='</table>';
    
    mysqli_close($cons);
    echo $output;
}else{
    echo '<h1>not sata connect</h1>';
}
 

?>
