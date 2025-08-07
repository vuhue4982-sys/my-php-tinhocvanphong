<?php
 	if (session_status () === PHP_SESSION_NONE) session_start ();
	include "../../Model/DBConfig.php";
	$db = new Database;
	$db->connect();

	if(isset($_GET['controller'])){
		$controller =$_GET['controller'];
	}
	else{
		$controller='';
	}
	if($controller=='DangKy'){
		require_once('../../Controller/User/DangKyController.php');
	}
	else if( isset( $_SESSION['DangNhapUser'] ) )
	{
		if(	$_SESSION['DangNhapUser']==false){
			require_once('../../Controller/User/DangNhapController.php');
		}
		else{
			switch ($controller) {
				case 'TrangChu':{
					require_once('../../Controller/User/TrangChuController.php');
					break;
				}
				case 'TongQuan':{
					require_once('../../Controller/User/TongQuanController.php');
					break;
				}
				case 'GiaoTrinh':{
					require_once('../../Controller/User/GiaoTrinhController.php');
					break;
				}
				case 'Video':{
					require_once('../../Controller/User/VideoController.php');
					break;
				}
				case 'BaiTap':{
					require_once('../../Controller/User/BaiTapController.php');
					break;
				}
				// Trong phần switch case
				case 'Chatbot': {
					require_once('../../Controller/User/ChatbotController.php');
					break;
				}
				default:{
					require_once('../../Controller/User/DangNhapController.php');
					break;
				}
			}
		}
	}
	else{
		require_once('../../Controller/User/DangNhapController.php');
	}
	
?> 