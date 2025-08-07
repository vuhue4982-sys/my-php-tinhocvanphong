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
				$MaGiangVien =$_POST['txtMaGiangVien'];
				$TenGiangVien =$_POST['txtTenGiangVien'];
				$SoDienThoai =$_POST['txtSDT'];
				$CCCD =$_POST['txtCCCD'];
				$DiaChi =$_POST['txtDiaChi'];
				$Email =$_POST['txtEmail'];
				$MatKhau =$_POST['txtMatKhau'];
				$avata =$_POST['txtAvata'];
				$NgayTao = date("Y-m-d");
				$sql = "INSERT INTO giangvien(MaGiangVien, TenGiangVien,Avata, SoDienThoai, CCCD, DiaChi, Email, MatKhau, NgayTao) VALUES('$MaGiangVien','$TenGiangVien','$avata','$SoDienThoai','$CCCD','$DiaChi','$Email','$MatKhau','$NgayTao')";
				if($db->execute($sql)){
					$thanhcong ='CreateNhanVien';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					echo "Thêm Mới Nhân Viên Thành Công";
					header('location: index.php?controller=GiangVien&action=list');
					break;
				}
			} 
			require_once('../../View/Admin/GiangVien/create.php');
			break;
		}
		case 'edit':{
				if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "SELECT * FROM giangvien WHERE MaGiangVien = '$id' ";
				$dataid = $db->getDatas($sql);
				if(isset($_POST['EditNhanVien']))
				{
					$MaGiangVien =$_POST['txtMaGiangVien'];
					$TenGiangVien =$_POST['txtTenGiangVien'];
					$SoDienThoai =$_POST['txtSDT'];
					$CCCD =$_POST['txtCCCD'];
					$DiaChi =$_POST['txtDiaChi'];
					$Email =$_POST['txtEmail'];
					$MatKhau =$_POST['txtMatKhau'];
					$avata =$_POST['txtAvata'];
					$sql = "UPDATE giangvien SET TenGiangVien = '$TenGiangVien', SoDienThoai='$SoDienThoai',Avata='$avata', CCCD = '$CCCD', DiaChi='$DiaChi', Email='$Email', MatKhau='$MatKhau' WHERE MaGiangVien ='$id'";
					if($db->execute($sql)){
						$thanhcong ='EditNhanVien';
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=GiangVien&action=list');
						break;
					}
				} 
			}
			require_once('../../View/Admin/GiangVien/edit.php');
			break;
		}
		case 'detail':{
			if(isset($_GET['id'])){
				$thanhcong =NULL;
				$id =$_GET['id'];
				$sql = "SELECT * FROM giangvien WHERE MaGiangVien= '$id'";
				$dataid = $db->getDatas($sql);
			}
			require_once('../../View/Admin/GiangVien/detail.php');
			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "DELETE FROM giangvien WHERE  MaGiangVien ='$id'";
				if($db->execute($sql)){
					$thanhcong ='oke';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					header('location: index.php?controller=GiangVien&action=list');
					break;
				}
			}
			break;
		}
		case 'list':{
			$sqlcount = "SELECT count(MaGiangVien) as dem FROM giangvien";
			$countsp = $db->getDatas($sqlcount);
			$number = $countsp['dem'];
			$pages = ceil($number/10);
			$page =1;
			if(isset($_GET['page'])){
				$page =$_GET['page'];
			}
			$startpage =($page -1) *10;
			$sql = "SELECT * FROM giangvien limit $startpage,10";
			$data = $db->getAllData($sql);
			require_once('../../View/Admin/GiangVien/index.php');
			break;
		}
		default:{
			require_once('../../View/Admin/Layout/error404.html');
		}

	}
?> 