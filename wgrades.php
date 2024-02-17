<html>
    <head>
    <link rel="stylesheet" href="adminS.css">
    </head>

    <body>
        
    <?php
        include 'back.php';
        ?>

<center>

<form action="wgrades.php" method="post">
<h1> Written Exam /120</h1>
        <table>
            <tr>
            <td>ID of Student: </td>
            <td><input type="number" name="ID" size="20" required></td>
            </tr>

            <tr>
            <td>English :</td>
            <td><input type="number" name="english" size="20" required></td>
			<td>/20</td>
            </tr>

            <tr>
            <td>Arabic: </td>
            <td><input type="number" name="arabic" size="20" required></td>
			<td>/20</td>
            </tr>

            <tr>
            <td>Chemistry: </td>
            <td><input type="number" name="chemistry" size="20" required></td>
			<td>/20</td>
            </tr>

            <tr>
            <td>Physics: </td>
            <td><input type="number" name="physics" size="20" required></td>
			<td>/20</td>
            </tr>

            <tr>
            <td>Math: </td>
            <td><input type="number" name="math" size="20" required></td>
			<td>/20</td>
            </tr>

            <tr>
            <td>Biology: </td>
            <td><input type="number" name="biology" size="20" required></td>
			<td>/20</td>
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

mysqli_query($con,"Update grades set arabic=$arabic, english=$english, math=$math, physics=$physics, chemistry=$chemistry, biology=$biology 
 WHERE StudentID=$ID") 
 or die ("You Must enter the Psychology First! ");
  
 echo '<span style="color:white;font-size:30px;">Grade updated for student of ID:'.$ID.' </span>';

 }
?> 
</center>
</body>
</html>
