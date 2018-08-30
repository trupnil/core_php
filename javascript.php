<html>
<head>
	<script src="jquery-3.3.1.min.js"></script>
	
</head>
<body>
	<!-- <form mathod = "get"  onsubmit = "return Validation()"  >
		<lable>fname</lable> <span id="efname"></span>
		<input type="text" id="fname">
		<lable>password</lable>
		<input type="password" id="pwd">
		<lable>comform password</lable>
		<input type="password" id="cpwd"><span id="epwd"></span>
		<input type="submit" name="submit" value=
		"submit" > -->

	</form>
	<form mathod = "get"   >
		<lable>fname</lable> <span id="efname"></span>
		<input type="text" id="fname"> <span id = "check"></span> <br>
		<lable>password</lable>
		<input type="password" id="pwd"><br>
		<lable>comform password</lable>
		<input type="password" id="cpwd"><span id="epwd"></span><br>
		<label>state</label>
		
		<select name ="state" id ="state">
			<option><--select state--></option>
			<?php $sql = "SELECT * FROM `state`";
			$ex = $conn->query($sql);
			while ($res = mysqli_fetch_object($ex)) { ?>
			<option value="<?php echo $res->state_id; ?>" > <?php echo $res->state_name; ?> </option>
			<?php } ?>
		</select> <br>	
		<label>city</label>
		<select name ="city" id="city">
			<option>--select first state--</option>
		</select> <br>
		<input type="button" id="jquery" name="submit" value=
		"submit" >
	</form>


</body>
</html>
<script type="text/javascript">

function Validation()
{
	//alert();
	var fname = document.getElementById('fname').value;
	var pwd = document.getElementById('pwd').value;
	var cpwd = document.getElementById('cpwd').value;
	//alert(fname);
	if(fname == '')
	{
		alert('please fill fname  first');
		var efname = document.getElementById('efname').innerHTML= 'false';
		//var efname.innerHTML('please fill fname');
		return false;
	}
	if(cpwd !== pwd)
	{
		alert('password not matched');
		var efname = document.getElementById('epwd').innerHTML= 'false';
		return false;
	}
}
</script>

<script type="text/javascript">

$(document).ready(function(){

	$('#jquery').click(function(){

			//alert('jquery called');
			fname = $('#fname').val();
			//alert(fname);
			// if(fname == '')
			// {
			// 	alert('enter name');
			// 	return false;
			// }

			$.ajax({

				type:'POST',
				url:'dummy',
				data:{fname:fname},
				success:function(data)
				{
					alert(data);

				}	

			});

		});



});

</script>

<script type="text/javascript">

$(document).ready(function(){

	$('#state').change(function(){
		var state_id = $('#state').val();
            //alert(state_id);
            $.ajax({
            	type:'POST',
            	url:'getcity',
            	data:{state_id:state_id},
            	success:function(data)
            	{
					//alert(data);
					$('#city').html(data);

				}
			});
        });

   });

</script>

<script type="text/javascript">
$(document).ready(function(){


	$('#fname').keyup(function(){
		var fname = $('#fname').val();
        //alert(fname);
        $.ajax({
        	type:'POST',
        	url:"fnamecheck",
        	data:{key:fname},
        	success:function(data){

        		//alert(data);
        		if(data == 'Already Registered')
        		{
        			$('#check').css("color",'red');
        			$('#check').html(data);	
        		}
        		else
        			{
        				$('#check').css("color",'green');
        			    $('#check').html(data);

        			}
        		



        	}


        });

    });


})


</script>