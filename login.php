<?php
session_start();
include 'header.html';
?>
<html>

<head>
    <style>

        body{
        background-image: url("image/camo.png");
        }
		
		#log{
			background-color: olive;
			padding: 10px;
			margin: 10px;
			color: white;
			margin-left: 600px;
			margin-right: 600px;
		}
		td{
			font-size:20px;
		}

        </style>
</head>


<body>
<center>
  <div id="log">
<h1>
Login as Admin:
</h1>

<form action="Login.php"  method="post">
<table>
        <tr>
            <td> ID: </td>
            <td><input type="number" name="AID" size="20" required></td>
        </tr>
  
<tr>
<td><label for="Name">Password:</label></td>
<td><input type="password" name="Password" size="20" id="pass" required ></td>
</tr>
<tr>
<td><button type="submit"  name="loginA" size="20">Login </button></td>
</tr>
</table>
</form>

<?php

include 'config.php';
if (isset($_POST['loginA']))
{
extract($_POST);


 $sql="SELECT * FROM admin WHERE AID='$AID' and Password='$Password'";
            $result = mysqli_query($con,$sql)
                or die( mysqli_error($con));
                
                
             $login = array();
             while($row =mysqli_fetch_assoc($result))
             $login[] = $row;

 
           $count = mysqli_num_rows($result);

           if($count==0){
               echo "ID or password are incorrect !!";
           }

           else{
            $_SESSION['AID']=$AID;
             header('Location: adminpage.php');
           }
  
          }
        ?>
</div>



<div id="log">
<h1>Login as Student:</h1>
        <form action="Login.php"  method="post">
<table>
        <tr>
            <td> ID:</td>
            <td><input type="number" name="SID" size="20" required></td>
        </tr>
  
<tr>
<td><label for="Name">Password:</label></td>
<td><input type="password" name="password" size="20" id="pass" required ></td>
</tr>
<tr>
<td><button type="submit"  name="login" size="20">Login </button></td>
</tr>
</table>
</form>
<!--  -->
<?php


if (isset($_POST['login']))
{
extract($_POST);


 $sql="SELECT * FROM student WHERE SID='$SID' and password='$password'";
            $result = mysqli_query($con,$sql)
                or die( mysqli_error($con));
                
                
             $login = array();
             while($row =mysqli_fetch_assoc($result))
             $login[] = $row;

 
           $count = mysqli_num_rows($result);

           if($count==0){
               echo "ID or password are incorrect !!";
           }

           else{
            $_SESSION['SID']=$SID;
             header('Location: studentpage.php');
           }
  
          }
        ?>
</div>

      </center>

        </body>
        </html>