<?php

ini_set('display_errors',1);
session_start();
include_once("db.php");
if ($db->connect_errno){
            die('Could not connect');
        }

#$user="3' or 1=1#";
#$pass="123";
#@$user= $_POST['username'];
#@$pass=$_POST['pass'];
#$country="Viet Nam";
#echo $_GET['country'];
@$country=$_GET['country'];
if (preg_match ("/drop|delete|update|insert|into|file_get_contents/i", $country)){
	echo "<h1>SQLi detected</h1>"; 
}
else 
{
	$sql="select * from info where Name='".$country."'";
	$result = $db->query($sql);



	echo "
	<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class='no-js lt-ie9 lt-ie8 lt-ie7'> <![endif]-->
	<!--[if IE 7]>         <html class='no-js lt-ie9 lt-ie8'> <![endif]-->
	<!--[if IE 8]>         <html class='no-js lt-ie9'> <![endif]-->
	<!--[if gt IE 8]><!--> <html class='no-js'> <!--<![endif]-->
		<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>ASEAN Community</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta name='description' content='Free HTML5 Template by FREEHTML5.CO' />
		<meta name='keywords' content='free html5, free template, free bootstrap, html5, css3, mobile first, responsive' />
		<meta name='author' content='FREEHTML5.CO' />

	  <!-- 
		//////////////////////////////////////////////////////

		FREE HTML5 TEMPLATE 
		DESIGNED & DEVELOPED by FREEHTML5.CO
			
		Website: 		http://freehtml5.co/
		Email: 			info@freehtml5.co
		Twitter: 		http://twitter.com/fh5co
		Facebook: 		https://www.facebook.com/fh5co

		//////////////////////////////////////////////////////
		 -->

	  	<!-- Facebook and Twitter integration -->
		<meta property='og:title' content=''/>
		<meta property='og:image' content=''/>
		<meta property='og:url' content=''/>
		<meta property='og:site_name' content=''/>
		<meta property='og:description' content=''/>
		<meta name='twitter:title' content='' />
		<meta name='twitter:image' content='' />
		<meta name='twitter:url' content='' />
		<meta name='twitter:card' content='' />

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel='shortcut icon' href='favicon.ico'>
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
		<!-- Animate -->
		<link rel='stylesheet' href='css/animate.css'>
		<!-- Icomoon -->
		<link rel='stylesheet' href='css/icomoon.css'>
		<!-- Bootstrap  -->
		<link rel='stylesheet' href='css/bootstrap.css'>

		<link rel='stylesheet' href='css/style.css'>


		<!-- Modernizr JS -->
		
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src='js/respond.min.js'></script>
		<![endif]-->

		</head>
		<body>


		<!-- END #fh5co-offcanvas -->
		<header id='fh5co-header'>
			
			<div class='container-fluid'>

				<div class='row'>
					
					<ul class='fh5co-social'>
						<li><a href='#'><i class='icon-twitter'></i></a></li>
						<li><a href='#'><i class='icon-facebook'></i></a></li>
						<li><a href='#'><i class='icon-instagram'></i></a></li>
					</ul>
					<div class='col-lg-12 col-md-12 text-center'>
						<h1 id='fh5co-logo'><a href='index.php'>ASEAN Community</a></h1>
						<br><br>
					</div>

				</div>
			
			</div>

			
			<div style='padding-left: 500px;'> "; 
				

	    
	    	while($row = $result->fetch_assoc()) {
				echo "<h1 style=''>".$row["Name"]."</h1> <br>"; 
	        	echo "Head of State: " . $row["HeadOfState"]."<br>Capital: " . $row["Capital"]."<br>Language: " . $row["Language"]."<br>Currency: " . $row["Currency"]."<br>";
	    	}
			echo "<div>


		</header>
		<!-- END #fh5co-header -->
		

		<footer id='fh5co-footer'>
			<p><small>&copy; 2019 PIS Club</small></p>
		</footer>
		
		<!-- jQuery -->
		<script src='js/jquery.min.js'></script>
		<!-- jQuery Easing -->
		<script src='js/jquery.easing.1.3.js'></script>
		<!-- Bootstrap -->
		<script src='js/bootstrap.min.js'></script>
		<!-- Waypoints -->
		<script src='js/jquery.waypoints.min.js'></script>
		<!-- Main JS -->
		<script src='js/main.js'></script>

		</body>
	</html>
	";
	}
?>
