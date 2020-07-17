<!DOCTYPE html>
<html lang="vi">
<head>
	<title>The Prophet</title>
	<style>
		.footer {
		   position: fixed;
		   left: 0;
		   bottom: 0;
		   width: 100%;
		   color: blue;
		   text-align: center;
		}	
	</style>
</head>
<body>
	<h1 style="text-align:center;margin-top: 30px; color: red";> Nhà tiên tri vũ trụ Trần Zần </h1>
	<img src="tiger.jpg" style="margin-left:550px; width:200px;height:200px;">
	<h3 style="text-align:center;margin-top: 20px;"> Nhập một từ bất kì bạn nghĩ đến trong đầu, Trần Zần cho bạn một con số may mắn("random number") </h3>

	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" style="text-align:center;margin-top: 20px;"method="post">
	  <input type="text" name="input"><br>
	  <input type="submit" value="Submit">
	</form>
	<div class="footer">
  	<h3>From nhthongdfvn with ❤️</h3>
	</div>
	</body>
</html>


<?php
	if (isset($_POST['input']))
	{
		if (empty($_POST['input'])){
			echo "<h4 style='text-align:center;margin-top: 20px; color: red'> Input không được trống </h4>";
		}
		else{
			$input=$_POST['input'];
			$flag="miniCTF{Tran_Zan_is_the_man_of_year}";
			$count="";
			$i=0; $ok=0;
			if (strlen($input)===strlen($flag)) $ok=1;
			while ($i<strlen($input)&&$i<strlen($flag)){
				if ($input[$i]===$flag[$i]) $count=$count."1"; else $count=$count."0";
				$i++;
			}
			$num=bindec($count);
			if ($ok===1 && $num===68719476735){
				echo "<h3 style='text-align:center;margin-top: 20px; color: red'>Flag nè: miniCTF{Tran_Zan_is_the_man_of_year}  </h3>";
			} 
			else
			{
				echo "<h1 style='text-align:center;margin-top: 20px; color: green'>".$num."</h1>";

				if ($num===0){
					echo "<h3 style='text-align:center;margin-top: 20px; color:Orange'>Tui chiên môn đi coi bói chứ hổng biết bói cho ai </h3>";
				}
				elseif ($num<=1000){
					echo "<h3 style='text-align:center;margin-top: 20px; color:Orange'>Thì tức nhiên là hông biết</h3>";
				}
				elseif ($num<=100000){
					echo "<h3 style='text-align:center;margin-top: 20px; color:Orange'>Tui tự nhiên thấy hiện thượng lạ</h3>";
				}
				elseif ($num<=100000){
					echo "<h3 style='text-align:center;margin-top: 20px; color:Orange'>PaIS{Dont_submit_it_troll_flag}</h3>";
				}
				else{
					echo "<h3 style='text-align:center;margin-top: 20px; color:Orange'>Chưa biết gì hết trơn á</h3>";
				}

			}

		}
	}

?>

