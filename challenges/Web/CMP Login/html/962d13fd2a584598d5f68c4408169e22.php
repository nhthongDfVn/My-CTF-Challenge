<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Among us</title>
</head>
<body>
	<h1>Among Us</h1>
	<img src="https://steamcdn-a.akamaihd.net/steam/apps/945360/ss_a0f2416e11bf5b47788eaa3617e092b73962b145.1920x1080.jpg?t=1598556351" style="width:900px;height:400px;">
	<h2 style='color:blue'>You are Crewmates</h2>
</body>
</html>
<?php 
	$secret="S0m3_StR_Like_MEME";
	$data="";
    if (!isset($_SESSION['data'])) { 
        $data="";
        $_SESSION['data']=""; 
    }
    else{
    	$data= $_SESSION['data'];
    	#var_dump($data);
    }

    if (isset($_GET['I']) && !empty($_GET['I'])){
    	if ($_GET['I']==="Crewmates"){
	    	if (isset($_GET['user_data']) && !empty($_GET['user_data'])){
		    	if (!preg_match("/user_data/is",$_SERVER['QUERY_STRING'])){
		    		$shavalue=sha1($_GET['user_data']);
		    		$_SESSION['data']=$shavalue.$secret;
		    		if ($shavalue==$data){
		    			echo "<form action='05b1bcb81238d6354ad87025715ed932.php'> <input type='submit' value='Yep, you did it' /></form>";
		    		}
		    		else{
		    			echo "Close";
		    		}
		    	}
		    	else die ("Don't hack");
	    	}
   		}
		else die ("Don't hack");
	}
    
?>


<!-- 
	$secret="<fake fake>";
	session_start();
	$data="";
    if (!isset($_SESSION['data'])) { 
        $data="";
        $_SESSION['data']=""; 
    }
    else{
    	$data= $_SESSION['data'];
    }

    if (isset($_GET['I']) && !empty($_GET['I'])){
    	if ($_GET['I']==="Crewmates"){
	    	if (isset($_GET['user_data']) && !empty($_GET['user_data'])){
		    	if (!preg_match("/user_data/is",$_SERVER['QUERY_STRING'])){
		    		$shavalue=sha1($_GET['user_data']);
		    		$_SESSION['data']=$shavalue.$secret;
		    		if ($shavalue==$data){
		    			header("Location: <next page>");
		    		}
		    		else{
		    			echo "Close";
		    		}
		    	}
		    	else die ("Don't hack");
	    	}
   		 }
    	else {
    		header("Location: <current url>");
    	}
	}
!>
