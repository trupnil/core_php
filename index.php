<?php 
//error_reporting(0);
// if($_SERVER['PATH_INFO'] == '/jayesh')
// {
// 	include("second.php");
// }

$conn = new mysqli("localhost","root","","20_april");
// if($conn)
// {
// 	echo "database connected";
// }

switch ($_SERVER['PATH_INFO'])
{

	case'/fnamecheck':
	$fname = $_POST['key'];
	//echo $fname;
		$sql = "SELECT * FROM `demo1`   WHERE `fname` = '$fname' ";

		$ex = $conn->query($sql);
			$ff = mysqli_fetch_object($ex);
			//print_r($ff);
			$count = count($ff);
			//print_r($count);

			if($count == 1)
			{
				echo "Already Registered";
			}
			else
			{
				echo "Available";
			}

				



	break;
	case '/getcity':
	//echo "hi";
	$state_id = $_POST['state_id'];
	//echo $state_id;
	$sql = "SELECT * FROM `city` WHERE `state_id` = '$state_id'";
	$ex = $conn->query($sql);
	while($city = mysqli_fetch_object($ex))
	{ ?>



      <option value="<?php echo $city->city_id; ?>"> <?php echo $city->city_name; ?> </option>

 <?php  	}

	break;





	case '/dummy':
	$fname = $_POST['fname'];
	$sql = "INSERT INTO `demo1` (`fname`) values('$fname')";
	$ex = $conn->query($sql);
	if($ex)
	{
		echo "insert success";
	}
	else
	{
		echo "Error";
	}
	
	break;
	case '/javascript':
	include('javascript.php');
	break;
	case '/jayesh' : 
	include("index.html");
	break;
	case '/form':
	$sql = "SELECT * FROM `city`";
	$ex2 = $conn->query($sql);
	include("form.php");
	if(isset($_POST['submit']))
	{

		$fname = $_POST['fname'];	


		$lname = mysqli_real_escape_string($conn,$_POST['lname']);
		echo $lname; exit();
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$hobby = $_POST['hby'];
		$h1 = implode(',',$hobby);
		$city = $_POST['city'];
			//echo $h1; die();

		$image_name = $_FILES['image']['name'];    
		$image_type = $_FILES['image']['type']; 
		$image_size = $_FILES['image']['size'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$new_path = ('upload/'.$image_name);
		move_uploaded_file($tmp_name, $new_path);

	echo 	$sql = "INSERT INTO `core_reg` (`fname`,`lname`,`email`,`password`,`gender`,`hobby`,`city`,`reg_time`,`image`) VALUES ('$fname','$lname','$email','$password','$gender','$h1','$city',current_time(),'$image_name')";
			die();//echo $sql; 
		$ex = $conn->query($sql);

		if($ex)
		{
			echo "inserted succesfully";
		}
		else
		{
			echo "Error";
		}

	}



	break;
	
	case '/viewdata':

	include("viewdata.php");

	break;
	case '/delete_data':
	if(isset($_GET['id']))
	{
		//echo "hi";
		$id = $_GET['id'];
		$sql = "DELETE FROM `core_reg` WHERE `id` = '$id'";
		$ex = $conn->query($sql);

		header("location:viewdata");
	}
	break;

	case '/login':
	include('login.php');

	if(isset($_REQUEST['login']))
	{
		$email = $_REQUEST['email'];

		$password = $_REQUEST['password'];
		
		if(isset($_REQUEST['cookie']))
	{

	  setcookie("email",$email, time()+3600*24);
      setcookie("password",$password, time()+3600*24);

	}

		$sql = "SELECT * FROM `core_reg` WHERE `email` = '$email' AND `password` = '$password' AND `status` = 'active' ";
		$ex = $conn->query($sql);
		$res = mysqli_fetch_object($ex);



		if(count($res) == 1 )
		{
			echo "oke";
			session_start();
			//$_SESSION['userdata'] = $res[0];
			$_SESSION['id'] = $res->id;
			$_SESSION['fname'] = $res->fname;
			$_SESSION['lname'] = $res->lname;
			$_SESSION['email'] = $res->email;
			$_SESSION['password'] = $res->password;
			$_SESSION['gender'] = $res->gender;
			$_SESSION['hobby'] = $res->hobby;
			$_SESSION['image'] = $res->image;
			header("location:profile");
		}
		else
		{
			echo "not valid";
		}
	}
	break;
	case '/edit_data':
	if(isset($_GET['id']))
	{
		$sql = "SELECT * FROM `city`";
		$ex2 = $conn->query($sql);
		$id = $_GET['id'];
		$sql = "SELECT * FROM `core_reg` INNER JOIN `city` ON `core_reg`.`city` = `city`.`city_id` WHERE `id` = '$id'";
		$ex = $conn->query($sql);

		include("edit.php");
		if(isset($_REQUEST['update']))
		{

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];
			$hobby = $_POST['hby'];
			$h1 = implode(',',$hobby);
			$city = $_POST['city'];

			$image_name = $_FILES['image']['name'];    
			$image_type = $_FILES['image']['type']; 
			$image_size = $_FILES['image']['size'];
			$tmp_name = $_FILES['image']['tmp_name'];
			$new_path = ('upload/'.$image_name);
			move_uploaded_file($tmp_name, $new_path);


			$sql = "UPDATE `core_reg` SET `fname` = '$fname',`lname` = '$lname',`email` = '$email',`password`='$password',`gender`='$gender',`hobby`='$h1',`city`= '$city',`image`= '$image_name' WHERE `id` = '$id';";

			$ex = $conn->query($sql);
			if($ex)
			{
				echo "update sucessfully";
				header("refresh:2;viewdata");
			}
			else
			{
				echo "Error in update";
			}

		}

	}
	
	break;
	case '/profile':
	include('profile.php');
	break;

	case '/logout':
	session_start();
	session_destroy();
	header("location:login");
	break;

	case '/status_check':
	$id = $_GET['id'];
	$status = $_GET['status'];
	//echo $status;
	if($status == 'inactive')
	{
		  $sql = "UPDATE `core_reg` SET `status` = 'active' WHERE `id` = '$id'"; 
		$ex = $conn->query($sql);
		header('Location:viewdata');
	}
	else
	{
		$sql = "UPDATE `core_reg` SET `status` = 'inactive' WHERE `id` = '$id'";
		$ex = $conn->query($sql);
		header('Location:viewdata');

	}

	break;
	

}

?>