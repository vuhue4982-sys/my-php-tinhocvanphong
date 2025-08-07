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
			if(isset($_POST['CreateNhanVien']))
			{	
				$TenQuanLy =$_POST['txtTenNhanVien'];
				$SoDienThoai =$_POST['SoDienThoai'];
				$CCCD =$_POST['CCCD'];
				$DiaChi =$_POST['DiaChi'];
				$Email =$_POST['Email'];
				$MatKhau =$_POST['MatKhau'];
				$NgayTao = date("Y-m-d");
				$sql = "INSERT INTO quanly(TenQuanLy, SoDienThoai, CCCD, DiaChi, Email, MatKhau, NgayTao) VALUES('$TenQuanLy','$SoDienThoai','$CCCD','$DiaChi','$Email','$MatKhau','$NgayTao')";
				if($db->execute($sql)){
					$thanhcong ='CreateNhanVien';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					echo "Thêm Mới Nhân Viên Thành Công";
					header('location: index.php?controller=NhanVien&action=list');
					break;
				}
			} 
			require_once('../../View/Admin/NhanVien/create.php');
			break;
		}
		case 'edit':{
				if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "SELECT * FROM quanly WHERE MaQuanLy = $id ";
				$dataid = $db->getDatas($sql);
				if(isset($_POST['EditNhanVien']))
				{
					$TenQuanLy =$_POST['txtTenNhanVien'];
					$SoDienThoai =$_POST['SoDienThoai'];
					$CCCD =$_POST['CCCD'];
					$DiaChi =$_POST['DiaChi'];
					$Email =$_POST['Email'];
					$MatKhau =$_POST['MatKhau'];
					$sql = "UPDATE quanly SET TenQuanLy = '$TenQuanLy', SoDienThoai='$SoDienThoai', CCCD = '$CCCD', DiaChi='$DiaChi', Email='$Email', MatKhau='$MatKhau' WHERE MaQuanLy =$id";
					if($db->execute($sql)){
						$thanhcong ='EditNhanVien';
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=NhanVien&action=list');
						break;
					}
				} 
			}
			require_once('../../View/Admin/NhanVien/edit.php');
			break;
		}
		case 'detail':{
			if(isset($_GET['id'])){
				$thanhcong =NULL;
				$id =$_GET['id'];
				$sql = "SELECT * FROM quanly WHERE MaQuanLy= $id";
				$dataid = $db->getDatas($sql);
			}
			require_once('../../View/Admin/NhanVien/detail.php');
			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "DELETE FROM quanly WHERE  MaQuanLy ='$id'";
				if($db->execute($sql)){
					$thanhcong ='oke';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					header('location: index.php?controller=NhanVien&action=list');
					break;
				}
			}
			break;
		}
		case 'list':{
			$sqlcount = "SELECT count(MaQuanLy) as dem FROM quanly";
			$countsp = $db->getDatas($sqlcount);
			$number = $countsp['dem'];
			$pages = ceil($number/8);
			$page =1;
			if(isset($_GET['page'])){
				$page =$_GET['page'];
			}
			$startpage =($page -1) *8;
			$sql = "SELECT * FROM quanly limit $startpage,8";
			$data = $db->getAllData($sql);
			require_once('../../View/Admin/NhanVien/index.php');
			break;
		}
		default:{
			require_once('../../View/Admin/Layout/error404.html');
		}

	}
?> 