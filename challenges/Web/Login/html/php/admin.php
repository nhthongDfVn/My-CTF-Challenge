<?php
session_start();
include_once("db.php");


if ($db->connect_errno){
            die('Could not connect');
        }


@$user= $_POST['username'];
@$pass=$_POST['pass'];
@$sql="select * from user where Username='".$user."' and Password='".$pass."'";
@$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Login V1</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
<!--===============================================================================================-->	
	<link rel='icon' type='image/png' href='images/icons/favicon.ico'/>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/bootstrap/css/bootstrap.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='fonts/font-awesome-4.7.0/css/font-awesome.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/animate/animate.css'>
<!--===============================================================================================-->	
	<link rel='stylesheet' type='text/css' href='vendor/css-hamburgers/hamburgers.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/select2/select2.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='css/util.css'>
	<link rel='stylesheet' type='text/css' href='css/main.css'>
<!--===============================================================================================-->
</head>
<body>
	
	<div class='limiter'>
		<div class='container-login100'>" ;

		<?php
		if (@$result->num_rows > 1||@$result->num_rows==0) {

			echo "<h1>Only admin can see this secret</h1>";
		}
		else{
			echo "<h1>ChristCTF{EzzSQL_bypass!!!Hoa_nhip_giang_sinh}</h1>";
		}
		?>
		
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src='vendor/jquery/jquery-3.2.1.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/bootstrap/js/popper.js'></script>
	<script src='vendor/bootstrap/js/bootstrap.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/select2/select2.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/tilt/tilt.jquery.min.js'></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src='js/main.js'></script>

</body>
</html>";

