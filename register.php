<?php
require "dbcon.php";

// Form Validation starts
if(isset($_POST['btnsubmit']))
{
if($_POST['Username']=="Username")
{
 echo "<script>alert('Enter username');document.location='registerform.php'</script>";
  exit();
}


if($_POST['Password']=='Password')
{
 echo "<script>alert('Enter password');document.location='registerform.php'</script>";
 exit();
}


if($_POST['Confirm-password']=='Password')
{
 echo "<script>alert('Enter confirm password');document.location='registerform.php'</script>";
 exit();
}
	
//Form Validation ends	
	
	$username =$_POST['Username']; //getting username from submitted form
	$password=$_POST['Password']; //getting password from submitted form
	

$query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");  //select query to check whether username alreadu exists or not

$count=mysqli_num_rows($query);

if ($count>0) {
echo '<p style="text-align:center;font-size:22px;color:red;margin-top:40px;">Sorry Username  <span style="color:#000;">'.$username. '</span> Already Exists !!</p>';
header( "refresh:2; url=registerform.php");
}  // if username already exists, display error message.



else
if($_POST['Password']==$_POST['Confirm-password'])
{
$username=$_POST['Username'];
$password=$_POST['Password'];
$query="insert into users(username,password) values('$username','$password')";
$run=$con->query($query);
echo '<p style="text-align:center;font-size:22px;color:green;margin-top:40px;">Successfully Registered !!</p>';
header( "refresh:2; url=home.php");
} // if the form fields PASSWORD and CONFIRM PASSWORD were not same, display error message.


else
if($_POST['Password']!=$_POST['Confirm-password'])
{
echo '<p style="text-align:center;font-size:22px;color:red;margin-top:40px;">Please Enter the same password in both the fields.</p>';
header( "refresh:3; url=registerform.php");
} // if all the errors are cleared or there is no error, register the user details in database. display success message.




}
?>
