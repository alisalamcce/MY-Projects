<html>
    <head>
    <link rel="stylesheet" href="adminS.css">

    </head>

    <body>
        <?php
        include 'back.php';
        ?>

<center>
<form action="mgrades.php" method="post">
<h1> Medical Exam /120</h1>
        <table>
            <tr>
            <td>ID of Student </td>
            <td><input type="number" name="ID" size="20" required></td>
            </tr>

            <tr>
            <td>Eyes :  </td>
            <td><input type="number" name="eyes" size="20" required></td>
			<td>/40</td>
            </tr>
            <tr>

            <td>Ears :  </td>
            <td><input type="number" name="ears" size="20" required></td>
			<td>/40</td>
            </tr>

            <tr>
            <td>BMI </td>
            <td><input type="number" name="BMI" size="20" required></td>
			<td>/40</td>
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

mysqli_query($con,"Update grades set `eyes`=$eyes,`ears`=$ears,`BMI`= $BMI WHERE StudentID=$ID") 
 or die ("You Must enter the Psychology first !");
echo '<span style="color:white;font-size:30px;">Grade updated for student of ID:'.$ID.' </span>';
 }
?> 
</center>         
            </body>

            </html>                                