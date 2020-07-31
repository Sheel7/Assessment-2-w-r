<?php
session_start();

require "dbcon.php";
if(isset($_POST['btnsubmit'])) //perform following function on form submit
{
	
	$Username =$_POST['username'];
	$Password=$_POST['Password'];
	
	//selecting data from table and checking it with input values
$query=mysqli_query($con,"select username,password from users where username='$Username' and password='$Password'");


$count=mysqli_num_rows($query);
if($count==1){
$_SESSION["username"]=$_POST["username"];
echo "<script>document.location='index.php'</script>"; //success.. redirecting to index page of respective user
}
else {
echo '<p style="text-align:center;font-size:22px;color:red;margin-top:40px;">Invalid Username or Password !!</p>'; //error message
header( "refresh:3; url=home.php"); //redirecting to login page
}








}
?>
