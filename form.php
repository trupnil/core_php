<html>
<head>
	</head>
	<body>
		<form method="POST" enctype="multipart/form-data">
			<lable>fname</lable>
				<input type="text" name="fname"><br>
			<lable>lname</lable>
				<input type="text" name="lname"><br>
				<lable>email</lable>
				<input type="email" name="email"><br>
				<lable>password</lable>
				<input type="password" name="password"><br>
				<lable>gender</lable>
				<input type="radio" name="gender" value="male">male
				<input type="radio" name="gender" value="female">female <br>
				<lable>Hobby</lable>
				<input type="checkbox" name="hby[]" value="cricket">cricket
				<input type="checkbox" name="hby[]" value="football">football
				<input type="checkbox" name="hby[]" value="chess">chess<br>
				
				<label>city</label>
				<select name="city">
					<option>--select city--</option>
				<?php 
					while($city = mysqli_fetch_object($ex2))
					{ ?>
				<option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>

				<?php 	}
				  ?>
				
					
				</select> <br>
				<label>chhose image</label>
				<input type="file" name="image"> <br>

				<input type="submit" name="submit" value="registration"><br>
		</form>
	</body>
</html>