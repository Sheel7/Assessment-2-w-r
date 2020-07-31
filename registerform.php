<!DOCTYPE html>
<html>

<head>
	<title>User Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="login-page">	<!--Registration form-->
		<div class="form">
			<form class="login-form" method="post" action="register.php">
				<h3><img src="images/yaali_logo.png" width="50"> <br> <center>User Registration</center></h3>

                <input type="text" id="Username" name="Username" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required>
                <input type="password" id="Password" value="Password" name="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required>
                <span class="fontawesome-lock"></span><input type="password" name="Confirm-password" id="Conform-password" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required>
                <button name="btnsubmit" id="btnsubmit"/>Sign Up</button> <!-- Form submit button -->
			</form>
			<p>Already a member ? <a href="home.php"> Log In Now</a><span class="fontawesome-arrow-right"></span></p>
		</div>
	</div>
</body>

</html>


