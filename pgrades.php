<html>
    <head>
    <link rel="stylesheet" href="adminS.css">

    </head>

    <body>
    <?php
        include 'back.php';
        ?>
<center>
<form action="pgrades.php" method="post">
	<h1> Physical Exam /120</h1>
        <table>
            <tr>
            <td>ID of Student:</td>
            <td><input type="number" name="ID" size="20" required></td>
            </tr>

            <tr>
            <td>Running :  </td>
            <td><input type="number" name="running" size="20" required></td>
			<td>/40</td>
            </tr>

            <tr>
            <td>Pushups : </td>
            <td><input type="number" name="pushups" size="20" required></td>
			<td>/40</td>
            </tr>

            <tr>
            <td>Pullups :  </td>
            <td><input type="number" name="pullups" size="20" required></td>
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

mysqli_query($con,"Update grades set `running`=$running,`pushups`=$pushups,`pullups`= $pullups WHERE StudentID=$ID") 
 or die ("You Must enter the Psychology first !");
 
 echo '<span style="color:white;font-size:30px;">Grade updated for student of ID:'.$ID.' </span>';

 }
?> 
</center>
            </body>

            </html>