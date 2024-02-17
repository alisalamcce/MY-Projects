<html>

<head>
<link rel="stylesheet" href="adminS.css">
</head>

<body>
<center>
<?php

include 'config.php';

include 'logout.php';

$sql="SELECT * FROM grades";
$result=mysqli_query($con, $sql);
while ($row1 = mysqli_fetch_array($result))
{
    $sumWritten= $row1['arabic']+$row1['english']+$row1['math']+$row1['physics']+$row1['chemistry']+$row1['biology'];
    $sumPhysical= $row1['running']+$row1['pushups']+$row1['pullups'];
    $sumMedical= $row1['eyes']+$row1['ears']+$row1['BMI'];
    $sumSYCHO=$row1['psy'];
    $sumTotal= $sumWritten+$sumPhysical+$sumMedical+$sumSYCHO;
    $t=$row1['StudentID'];
   mysqli_query($con,"INSERT INTO totalresult(`ID`, `Tgrades`) VALUES($t,$sumTotal)");
   
}

 
$sql = "SELECT * FROM  totalresult Order by Tgrades DESC";
 $result1 = $con->query($sql);

 if ($result1->num_rows > 0) {
    echo "<table border = 12pt id=\"vg\">
    <tr align=center>
    <th>Student ID</th>
    <th>Total grades </th>
    <th>Rank</th>

		</tr>";
$rank=0;
  // output data of each row
  while($row = $result1->fetch_assoc()) {
   echo "<tr align=center><td>".$row['ID']."</td><td>".$row['Tgrades']."</td><td>".++$rank."</tr>";
}
 echo "</table>";
 } 
 else {
 echo "0 results";
 }
 ?>
</center>
</body>
</html>