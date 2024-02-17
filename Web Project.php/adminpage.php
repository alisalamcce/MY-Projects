<?php 
session_start();
include 'config.php';
$id=$_SESSION['AID'];

$sql="SELECT Name FROM admin WHERE AID=$id";
$result=mysqli_query($con, $sql);
 $row=mysqli_fetch_array($result);

?>

<html>
    <head>
    <link rel="stylesheet" href="adminS.css">
    </head>
    <body>
        <div id="aheader">
         <h1> <?php echo "Welcome back ".$row['Name'] ?>
        </h1>
        </div>
<center>

<a href="addgrades.php"> Add grades </a><br><br>
<a href="viewgrades.php"> View All Students </a><br><br>
<a id="l" href="HomePage.php">Logout</a><br>

</center>
</body>
</html>