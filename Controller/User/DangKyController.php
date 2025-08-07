<?php
/*	include "../../Model/DBConfig.php ";*/
	if(isset($_GET['action'])){
		$action =$_GET['action'];
	}
	else{
		$action='';
	}
	switch ($action) {
		case 'create':{
			$thanhcong =NULL;
			if(isset($_GET['CreateUser']))
			{	
				$MSSV=$_GET['txtMSSV'];
				$TenSinhVien=$_GET['txtTenSinhVien'];
				$SoDienThoai=$_GET['txtSoDienThoai'];
				$DiaChi =$_GET['txtDiaChi'];
				$Email =$_GET['txtEmail'];
				$MatKhau =	$_GET['txtMatKhau'];
				$Avata ='null';
				$NgayTao = date("Y-m-d");
				$sql = "INSERT INTO `sinhvien`(`MSSV`, `TenSinhVien`, `Avata`, `SoDienThoai`, `DiaChi`, `Email`, `MatKhau`, `NgayTao`) VALUES ('$MSSV','$TenSinhVien','$Avata','$SoDienThoai','$DiaChi','$Email','$MatKhau','$NgayTao')";
				if($db->execute($sql)){
					$thanhcong ='ThemMoiThanhCong';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					echo "Thêm Mới Bài Học Thành Công";
					header('location: index.php?controller=BaiHoc&action=list');
					break;
				}
			} 
		}
		default:{	
			require_once('../../View/User/DangKy.php');
		}
	}
?> 