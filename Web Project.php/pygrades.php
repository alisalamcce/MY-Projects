<html>
    <head>
    <link rel="stylesheet" href="adminS.css">

    </head>

    <body>
    <?php
        include 'back.php';
        ?>

<center>
<form action="pygrades.php" method="post">
	<h1> Psychology Exam /120</h1>
        <table>
            <tr>
            <td>ID of Student: </td>
            <td><input type="number" name="ID" size="20" required></td>
            </tr>

            <tr>
            <td>Psychology:  </td>
            <td><input type="number" name="psy" size="20" required></td>
            </tr>
            <tr>
             <td><input type="submit" name="add" value="Add"></td>
             <td><input type="reset" name="Reset"  value="Reset"></td>
            </tr>
        </table>
</form>
            
<?php
include 'config.php';

if (isset($_POST['add']))
{
extract($_POST);

mysqli_query($con, "INSERT INTO grades(`StudentID`, `psy`) 
 VALUES ($ID, $psy)");
echo '<span style="color:white;font-size:30px;">Grade updated for student of ID:'.$ID.' </span>';

 }
?>
</center>
  </body>

  </html>