<?php
session_start();

include 'config.php';
$id=$_SESSION['SID'];
$sql="SELECT running, pushups, pullups 
FROM grades WHERE StudentID=$id";
$result=mysqli_query($con, $sql) 
or die("Can't View Grades");

?>
<html>
    <head >
    <link rel="stylesheet" href="adminS.css">
    </head>
    <body>
<center>

    <table border="1">

    <tr>
        <th>Running</th>
        <th>Pushups</th>
        <th>Pullups</th>

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