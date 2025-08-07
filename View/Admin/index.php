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
	if( isset( $_SESSION['DangNhap'] ) )
	{
		if(	$_SESSION['DangNhap']==false){
			require_once('../../Controller/Admin/DangNhapController.php');
		}
		else{
			switch ($controller) {
				case 'TrangChu':{
					require_once('../../Controller/Admin/TrangChuController.php');
					break;
				}
				case 'BaiHoc':{
					require_once('../../Controller/Admin/BaiHocController.php');
					break;
				}
				case 'BaiTap':{
					require_once('../../Controller/Admin/BaiTapController.php');
					break;
				}
				case 'CauHoi':{
					require_once('../../Controller/Admin/CauHoiController.php');
					break;
				}
				case 'KetQuaLamBaiTap':{
					require_once('../../Controller/Admin/KetQuaLamBaiTapController.php');
					break;
				}
				case 'SinhVien':{
					require_once('../../Controller/Admin/SinhVienController.php');
					break;
				}
				case 'MonHoc':{
					require_once('../../Controller/Admin/MonHocController.php');
					break;
				}
				case 'GiangVien':{
					require_once('../../Controller/Admin/GiangVienController.php');
					break;
				}
				case 'ThuThuat':{
					require_once('../../Controller/Admin/ThuThuatController.php');
					break;
				}
				default:{
					require_once('../../Controller/Admin/DangNhapController.php');
					break;
				}
			}
		}
	}
	else{
		require_once('../../Controller/Admin/DangNhapController.php');
	}
	
?> 