<html>

    <head>
    <link rel="stylesheet">
	<style>
	
        body{
        background-image: url("image/camo.png");
        }
		td{

			color: white;
			font-weight: bold;
			font-size:30px;
		}
		
		h1{
			color:white;
			font-size:50px;
		}
		input[type=submit], input[type=reset] {
			background-color: olive;
			color: white;
			padding: 16px 32px;
			cursor: pointer;
			font-size:20px;
			}
		input[type=text],input[type=file],input[type=password] {
			background-color: white;
			color: black;
			padding: 1px 5px;
			font-size:17px;
			}

        </style>
    </head>

    <body>
    <?php
        include 'config.php';
        include 'header.html';
    ?>

  
    <center>
        <div id="formCon">

        <h1>Application form</h1>
        <form action="apply.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
            <td>First Name:</td>
            <td><input type="text" name="name" size="20" required></td>
            </tr>

            <tr>
            <td>Father's name:</td>
            <td><input type="text" name="Fname" size="20" required></td>
            </tr>

            <tr>
            <td>Last name:</td>
            <td><input type="text" name="Lname" size="20" required></td>
            </tr>

            <tr>
            <td>Mother's name:</td>
            <td><input type="text" name="Mname" size="20" required></td>
            </tr>

            <tr>
            <td>Date of Birth:</td>
            <td><input type="date" name="Dob" size="20" required></td>
            </tr>

            <tr>
            <td>Phone number:</td>
            <td><input type="number" name="Phone" size="20" required maxlength="8"></td>
            </tr>

            <tr>
            <td>Gender:</td>
            <td> <input type="radio" name="Gender" value="male" required>
            <label for="male">Male</label>
            <input type="radio"  name="Gender" value="female">
            <label for="female">Female</label></td>
            </tr>

            <tr>
            <td>Residence:</td>
            <td><input type="text" name="Residence" size="50" required></td>
            </tr>

            <tr>
            <td>Blood Type:</td>
            <td>
            <input type="text" name="BType" size="5" required >
            <input type="radio" id="positive" name="blood" value="positive" required>
            <label for="positive">+ve</label>
            <input type="radio" id="negative" name="blood" value="negative" required>
            <label for="negative">-ve</label>
            </td></tr>

            <tr>
            <td>Type:</td>
            <td>
            
            <input type="radio" id="army" name="Type" value="army">
            <label for="army">Army</label><br>
            <input type="radio" id="navy" name="Type" value="navy">
            <label for="navy">Navy</label><br>
            <input type="radio" id="Airforce" name="Type" value="AirForce">
            <label for="Airforce">Air force</label><br>
            <input type="radio" id="Internal" name="Type" value="InternalSecurityForce">
            <label for="Internal">Internal Security Forces</label><br>
            <input type="radio" id="General" name="Type" value="GeneralalSecurityForce">
            <label for="General">General Security Forces</label><br>
            <input type="radio" id="customs" name="Type" value="CustomsSecurityForce">
            <label for="customs">Customs Security Forces</label><br>
            <input type="radio" id="Goverment" name="Type" value="GovermentSecurityForce">
            <label for="Goverment">Goverment Security Forces</label><br>
            </td></tr>
            
            <tr>
             <td>
             <label for="mazhab">Mazhab:</label>
            </td>
            <td>
            <select name="mazhab" id="mazhab" style="font-size:20px">
             <option value="Muslim">Muslim</option>
             <option value="masihi">Christian</option>
             <option value="Durzi">Druz</option>
            </select>
            </td>
            </tr>

			<tr>
                <td>Profile Picture:</td>
                <td>
                <input type="file" name="IDImg" required>
                </td>
            </tr>


            <tr>
                <td>Baccalaureate degree:</td>
                <td>
                <input type="file" name="backImg" required>
                </td>
            </tr>

            <tr>
            <td>Password: </td>
            <td><input type="password" name="password" size="20" required></td>
            </tr>
            

            <tr>
             <td><input type="submit" name="apply" value="Apply"></td>
             <td><input type="reset" name="Reset"  value="Reset"></td>
            </tr>

            </form>
         </table>
        </div>
    </center>

    <?php
if (isset($_POST['apply']))
{
extract($_POST);
$IDimg =$_FILES["IDImg"]["name"];
$target_dir1 = "IDimage/";
$target_file1 = $target_dir1 . basename($IDimg);

$Cimg= $_FILES["backImg"]["name"];
$target_dir = "Cimage/";
$target_file = $target_dir . basename($Cimg);

move_uploaded_file($_FILES["IDImg"]["tmp_name"], $target_file1);
move_uploaded_file($_FILES["backImg"]["tmp_name"], $target_file);

$bt= $BType . $blood;
$bdI = mysqli_query($con, "INSERT INTO student(`password`, `name`, `Fname`, `Lname`, `Mname`, `Gender`, `Dob`, `Phone`, `Residence`, `Btype`, `Type`, `mazhab`, `backImg`, `IDImg`)
VALUES('$password', '$name', '$Fname', '$Lname', '$Mname', '$Gender', '$Dob', '$Phone', '$Residence', '$bt', '$Type', '$mazhab', '$Cimg', '$IDimg')");

 $sql1="SELECT SID  FROM student Order by SID DESC LIMIT 1 ";
 $message=mysqli_query($con, $sql1);
 $row=mysqli_fetch_array($message);
 $s="Your ID is : ".$row['SID'] .", Save it inorder to use it to login.";
echo "<script type='text/javascript'>alert('$s');</script>";


 mysqli_close($con);
}
 ?>

 
    </body>
</html>