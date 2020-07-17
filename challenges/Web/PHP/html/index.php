<?php 
	
	if (!isset($_SESSION['level'])){
		$_SESSION['level'] = 'level1';
		
	}
	if ($_SESSION['level'] == 'level1'){
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$a=@$_POST['a'];
			if ($a==='15'){
				$_SESSION['level'] = 'level2';
			}
			else
			{
				echo '<h1> Ủa gửi 15 cơ mà</h1>';
			}
			
		}
		else if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
			echo "<h1>Gửi a có giá trị 15 lên bằng gói POST xem nào</h1>";
			echo '<h1>Mình không muốn thấy số 15 trên thanh URL đâu, thử POST điiii</h1>';
		}
	}

	if ($_SESSION['level'] == 'level2'){
		if ($_SERVER['HTTP_USER_AGENT']==='PISHCM Browser'){
			$_SESSION['level'] = 'level3';
		}
		else if (!strpos($_SERVER['HTTP_USER_AGENT'],'PISHCM Browser')){
			echo '<h1>Bạn cần sử dụng trình duyệt của clb để vào!! PISHCM Browser</h1>';
		}
	
	}

	if ($_SESSION['level'] == 'level3'){
		if ($_SERVER['HTTP_REFERER'] == '127.0.0.1'){
			$_SESSION['level'] = 'level4';
		}
		else if ($_SERVER['HTTP_REFERER'] != '127.0.0.1'){
			echo '<h1>Chỉ nhận kết nối từ IP nội bộ</h1>';
		}
	
	}

	if ($_SESSION['level'] == 'level4'){
		if (!isset($_COOKIE['admin'])){
			setcookie('admin','false');
		}
		if ($_COOKIE['admin'] == 'true' ){
			echo "Good!!! Flag của bạn:";
			echo "PIS{ThIs_w0rld_iS_yoUrs14145}";
		}
		else if ($_COOKIE['admin'] !== 'false'){
			echo "Bạn không phải là người được chọn!!!";
			echo "miniCTF{fake_flag}";
			
		}
	
	}

?>