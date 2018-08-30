<html>
<head>
	</head>
	<body>
		<?php while($res = mysqli_fetch_object($ex))
		{ ?>
		<form method="POST">

			<lable>fname</lable>
				<input type="text" name="fname" value="<?php echo $res->fname; ?>"><br>
			<lable>lname</lable>
				<input type="text" name="lname" value="<?php echo $res->lname; ?>"><br>
				<lable>email</lable>
				<input type="email" name="email" value="<?php echo $res->email; ?>"><br>
				<lable>password</lable>
				<input type="text" name="password" value="<?php echo $res->password; ?>"><br>
				<lable>gender</lable>
				<input type="radio" name="gender" <?php if($res->gender == 'male'){ echo "checked"; } ?> value="male">male
				<input type="radio" name="gender" <?php if($res->gender == 'female'){ echo "checked"; } ?> value="female">female <br>
				<lable>Hobby </lable>
				<?php $gg = explode(',', $res->hobby);
				//print_r($res->hobby);
				 ?>
				<input type="checkbox" name="hby[]" <?php if(in_array("cricket", $gg)){ echo "checked"; } ?> value="cricket"  >cricket
				<input type="checkbox" name="hby[]" <?php if(in_array("football", $gg)){ echo "checked"; } ?> value="football">football
				<input type="checkbox" name="hby[]" <?php if(in_array("chess", $gg)){ echo "checked"; } ?> value="chess">chess<br>
				
				<label>city</label>
				<select name="city">
				
				<?php 

					while($city = mysqli_fetch_object($ex2))
					{
						 ?>
							<option <?php if($city->city_id == $res->city){ echo  "selected"; } ?> value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>

						}
					 ?>

				

				<?php 	}
				  ?>
				
					
				</select>
				<input type="file" name="image">

				<input type="submit" name="update" value="update"><br>
		</form>

	<?php 	} ?>
		
	</body>
</html>