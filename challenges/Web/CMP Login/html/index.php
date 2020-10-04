<!DOCTYPE html>
<html>
<head>
	<title>Among us</title>
</head>
<body>
	<h1>Among Us</h1>
	<img src="https://steamcdn-a.akamaihd.net/steam/apps/945360/ss_a0f2416e11bf5b47788eaa3617e092b73962b145.1920x1080.jpg?t=1598556351" style="width:900px;height:400px;">
</body>
</html>
<?php 
	if (!strpos($_SERVER['HTTP_USER_AGENT'],'Impostor')){
		echo "<h2 style='color:red'>There is 1 Impostor among us</h2>";
	}
	else{
		echo "<form action='962d13fd2a584598d5f68c4408169e22.php'> <input type='submit' value='Go go' /></form>";
	}


    
?>