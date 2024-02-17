<?php
session_start();

include 'config.php';
$id=$_SESSION['SID'];
$sql="SELECT eyes, ears, BMI 
FROM grades WHERE StudentID=$id";
$result=mysqli_query($con, $sql) 
or die("Can't View Grades");

?>

<html>
    <head>
    <link rel="stylesheet" href="adminS.css">
    </head>
    <body>
<center>
    <table border="1"  >

    <tr>
        <th>Eyes</th>
        <th>Ears</th>
        <th>BMI</th>
        
      
    </tr>

    

    <?php
while ($Row = mysqli_fetch_row($result))
        {
            echo "<tr><td>{$Row[0]}</td>";
            echo "<td>{$Row[1]}</td>";
            echo "<td>{$Row[2]}</td><tr>";
            
        }  
 ?>

</table>

</center>

    </body>
</html>