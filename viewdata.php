<html>
<head>
	</head>
	<body>
		<table align="center" border="1">

			<tr>
				<th>image</th>
				<th>id</tH>
				<th>fname</tH>
					<th>lname</tH>
						<th>email</tH>
							<th>password</tH>
								<th>gender</tH>
									<th>hobby</tH>
										<th>city</tH>
											<th>status</tH>
										<tH colspan="2">Action</tH>
			</tR>
			<?php //$sql1 = "SELECT * FROM `core_reg`";
			$sql1 = "SELECT * FROM `core_reg` INNER JOIN `city` ON `core_reg`.`city` = `city`.`city_id`";
			$ex1 = $conn->query($sql1);


				while($res = mysqli_fetch_object($ex1))
				{ ?>
					<tr>
						<td> <img src="<?php echo "upload/".$res->image; ?>" height="100px';" width="100px;"> </td>
				<td> <?php echo $res->id; ?> </td>
				<td> <?php echo $res->fname; ?> </td>
				<td> <?php echo $res->lname; ?> </td>
				<td> <?php echo $res->email; ?> </td>
				<td> <?php echo $res->password; ?> </td>
				<td> <?php echo $res->gender; ?> </td>
				<td> <?php echo $res->hobby; ?> </td>
				<td><?php echo $res->city_name; ?></td>
				<td> <a href="status_check?id=<?php echo $res->id;  ?>&&status=<?php echo $res->status; ?>"> <?php echo $res->status; ?></a></td>
				<td> <a href="delete_data?id=<?php echo $res->id; ?>">Delete</a> </td>
				<td> <a href="edit_data?id=<?php echo $res->id; ?>">Edit</a> </td>
			</tr>

			 <?php 	} ?>

			  
			
		</table>
	</body>
</html>