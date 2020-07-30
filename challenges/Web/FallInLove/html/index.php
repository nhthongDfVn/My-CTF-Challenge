<!DOCTYPE html>
<html>
<head>
	<title>Fall In Love | PISCTF 2020 </title>
	<style>
		body {
  			background-color: lightblue;
				}	

		h1 {
			 color:red;
			 text-align: center;
			 margin-top: 80px;
		}

		li {
  			float: left;
		}

		li a {
		  display: block; 
		  color: blue;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
			}			

		ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #333;
		}		

		.footer {
		   position: fixed;
		   left: 0;
		   bottom: 0;
		   width: 100%;
		   background-color: lightblue ;
		   color: blue;
		   text-align: center;
		}	
	</style>
</head>
<body>
	<h1>Listen music with me (^-^)</h1>
	<div style="margin-left: 400px; margin-right: 350px">
		<ul>
			<li><a class="active" href="?name=song2.mp3">Đi tìm tình yêu</a></li>
			<li><a href="?name=song1.mp3">Gặp người đúng lúc</a></li>
			<li><a href="?name=song3.mp3">Lên xe đi em ơi</a></li>
			<li><a href="?name=song4.mp3">Anh thanh niên</a></li>
		</ul>
	</div>
</body>
</html>

<?php
	$white_list=array("song1.mp3","song2.mp3","song3.mp3","song4.mp3","../index.php","../fallinlovelov3you/listenme.mp3");
	$flag= "PTITCTF{sorry_but_flag_not_here_now}";

	if (isset($_GET['name'])){
		$name= $_GET['name'];
		$name=str_replace("../", "",$name);
		$body="";

	if (in_array($name,$white_list))
	{
		$link= "./list/".$name;
		$file_path= pathinfo($link);
		if ($file_path['extension']!== "mp3"){
			$f=fopen($link,"r");
			$body= fread($f,filesize($link));
		}
		else{
			echo ' <div style="margin-left: 500px"> 
						<audio controls
        					src="'.$link.'">
            				Your browser does not support the
            				<code>audio</code> element.
    					</audio>
					</div>
    				';

			}
	}
	else {
		$body="File not found. Check again";
	}

	echo "<h3 style='text-align: center'>".$body."</h3>";
	}

?>


	<div class="footer">
  	<h3>From nhthongdfvn with ❤️</h3>
	</div>