<html>
<head>
	</head>
	<body>
		<form method="POST" border="1">
			
				<lable>email</lable>
				<input type="email" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"><br>
				<lable>password</lable>
				<input type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br>
				<input type="checkbox" name="cookie" <?php if(isset($_COOKIE["email"])) { echo "checked"; } ?> value="cookie">Remember me!!<br>

				<input type="submit" name="login" value="Login"><br>
		</form>
	</body>
</html>