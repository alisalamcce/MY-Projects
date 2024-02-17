

<?php
session_start();

include 'config.php';
$id=$_SESSION['SID'];
$sql="SELECT arabic, english, math, physics, chemistry, biology 
FROM grades WHERE StudentID=$id";
$result=mysqli_query($con, $sql) 
or die("quuuu");

?>
<html>
    <head>
    <link rel="stylesheet" href="adminS.css">
    </head>
    <body>
<center>

    <table border="1" >

    <tr>
        <th>Arabic</th>
        <th>English</th>
        <th>Math</th>
        <th>Physics</th>
        <th>Chemistry</th>
        <th>Biology</th>
    </tr>

    

    <?php
while ($Row = mysqli_fetch_row($result))
        {
            echo "<tr><td>{$Row[0]}</td>";
            echo "<td>{$Row[1]}</td>";
            echo "<td>{$Row[2]}</td>";
            echo "<td>{$Row[3]}</td>";
            echo "<td>{$Row[4]}</td>";
            echo "<td>{$Row[5]}</td></tr>";
           
        }  
 ?>

</table>

</center>
    </body>
</html>


