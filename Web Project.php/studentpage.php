<?php
session_start();

include 'config.php';
$id=$_SESSION['SID'];
$sql="SELECT * FROM student WHERE SID=$id";
$result_set=mysqli_query($con, $sql);
 $row=mysqli_fetch_array($result_set);

 
$sql1="SELECT *  FROM grades WHERE StudentID=$id";
$result_set1=mysqli_query($con, $sql1);
 $row1=mysqli_fetch_array($result_set1);

 if (mysqli_num_rows($result_set1)!=0) {
 
 $sumWritten= $row1['arabic']+$row1['english']+$row1['math']+$row1['physics']+$row1['chemistry']+$row1['biology'];
 
 $sumPhysical= $row1['running']+$row1['pushups']+$row1['pullups'];

 $sumMedical= $row1['eyes']+$row1['ears']+$row1['BMI'];
 
 $sumSYCHO=$row1['psy'];
 $sumTotal= $sumWritten+$sumPhysical+$sumMedical+$sumSYCHO;
 }
?>
 
<html>
    <head>
          
    <link rel="stylesheet" href="adminS.css">
    </head>

    <body>
<center>	  
      <img src="IDimage/<?php echo $row['IDImg'] ?>" width="200px" height="200px"><br>

         <?php echo '<span style="color:white;font-size:30px;">'.$row['name'] . " ". $row['Fname'] . " " . $row['Lname'].'</span>'; ?><br>
         <?php echo '<span style="color:white;font-size:30px;">ID:'.$row['SID'].'</span>';?><br>
         <?php echo '<span style="color:white;font-size:30px;">'.$row['Type'].'</span>' ?><br><br>
         <a href="HomePage.php" id="logo">Logout</a>

   <h4 >0 Grade means that the grades are not published yet !</h4>
   <?php 
   if (mysqli_num_rows($result_set1)==0) {
      echo '<span style="color:white;font-size:30px;">Grades are not published yet</span>';
   } 
   else{
   ?>
   
    <table align="center" border="1" >
      <tr>
         <th>Exam</th>
         <th>Result</th>
         <th>Total Grade </th>
		 <th>Detailed Grades</th>
      </tr>

      <tr>
         <td>Written</td>
            <?php
            if ($sumWritten>59){?>
               <td>Pass</td>

           <?php }
           else {?>
               <td>Fail</td>

           <?php }
            ?>

         <td> <?php echo $sumWritten ?> </td>
		 <td> <a href="StudentWrittenGrades.php">...</td>
         
      </tr>

      <tr>
         <td>Physical</td>
            <?php
            if ($sumPhysical>59){?>
               <td>Pass</td>

           <?php }
           else {?>
               <td>Fail</td>

           <?php }
            ?>


         <td> <?php echo $sumPhysical ?> </td>
		 <td><a href="StudentPhysGrades.php">...</td>
         
      </tr>

      <tr>
         <td>Medical</td>
            <?php
            if ($sumMedical>59){?>
               <td>Pass</td>

           <?php }
           else {?>
               <td>Fail</td>

           <?php }
            ?>


         <td> <?php echo $sumMedical ?> </td>
		 <td><a href="StudentMedicalGrades.php">...</td>
         
      </tr>

      <tr>
         <td>Psychology</td>
            <?php
            if ($sumSYCHO>59){?>
               <td>pass</td>

           <?php }
           else {?>
               <td>fail</td>

           <?php }
            ?>


         <td> <?php echo $sumSYCHO ?> </td>
         
      </tr>

    </table>
	<br>

    <table border="1">
            <tr>
               <th> Total Grades</th>
               <th> Status </th>
            </tr>

            <tr>
               <td> <?php echo $sumTotal ?>

               <?php if($sumTotal>240){?>

                 <td id="acc"> Accepted </td>
               
              <?php } 
               else{
                ?>
                 <td id="rej"> Rejected </td>

                 <?php
               }
               ?>
            </tr>



    </table>
<?php } ?>
</div>
    </center>

      
    </body>
</html>