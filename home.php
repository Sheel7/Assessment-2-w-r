<!DOCTYPE html>
<html>

<head>
	<title>User Login Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="login-page">	<!--log in form-->
		<div class="form">
			<form class="login-form" method="post" action="login.php">
				<h3><img src="images/yaali_logo.png" width="50"><br>Group Chat Login</h3>
				<input type="text" id="username" name="username" value="User Name" onBlur="if(this.value == '') this.value = 'User Name'" onFocus="if(this.value == 'User Name') this.value = ''" required>
				<input type="password"  id="Password" name="Password" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required>
				<button name="btnsubmit" id="btnsubmit"/>login</button> <!--Form Submit Button-->
			</form>
			<p>Not a member ? <a href="registerform.php"> Sign Up Now</a><span class="fontawesome-arrow-right"></span></p>
		</div>
	</div>
</body>

</html>


