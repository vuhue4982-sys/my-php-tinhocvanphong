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
				$MaMonHoc =$_POST['txtMaMonHoc'];
				$TenMonHoc =$_POST['txtTenMonHoc'];
				$MoTaMonHoc =$_POST['txtMoTaMonHoc'];
				$NgayTao = date("Y-m-d");
				$sql = "INSERT INTO `monhoc`(`MaMonHoc`, `TenMonHoc`, `MoTaMonHoc`, `NgayTao`) VALUES ('$MaMonHoc','$TenMonHoc','$MoTaMonHoc','$NgayTao')";
				if($db->execute($sql)){
					$thanhcong ='CreateNhanVien';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					echo "Thêm Mới Môn Học Thành Công";
					header('location: index.php?controller=MonHoc&action=list');
					break;
				}
			} 
			require_once('../../View/Admin/MonHoc/create.php');
			break;
		}
		case 'edit':{
				if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "SELECT * FROM monhoc WHERE MaMonHoc = '$id' ";
				$dataid = $db->getDatas($sql);
				if(isset($_POST['EditMonHoc']))
				{
					$MaMonHoc =$_POST['txtMaMonHoc'];
					$TenMonHoc =$_POST['txtTenMonHoc'];
					$MoTaMonHoc =$_POST['txtMoTaMonHoc'];
					$sql = "UPDATE monhoc SET MaMonHoc = '$MaMonHoc', TenMonHoc='$TenMonHoc', MoTaMonHoc = '$MoTaMonHoc' WHERE MaMonHoc ='$id'";
					if($db->execute($sql)){
						$thanhcong ='EditNhanVien';
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=MonHoc&action=list');
						break;
					}
				} 
			}
			require_once('../../View/Admin/MonHoc/edit.php');
			break;
		}
		case 'detail':{
			if(isset($_GET['id'])){
				$thanhcong =NULL;
				$id =$_GET['id'];
				$sql = "SELECT * FROM monhoc WHERE MaMonHoc= '$id'";
				$dataid = $db->getDatas($sql);
			}
			require_once('../../View/Admin/MonHoc/detail.php');
			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "DELETE FROM monhoc WHERE MaMonHoc ='$id'";
				if($db->execute($sql)){
					$thanhcong ='oke';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					header('location: index.php?controller=MonHoc&action=list');
					break;
				}
			}
			break;
		}
		case 'list':{
			$sqlcount = "SELECT count(MaMonHoc) as dem FROM monhoc";
			$countsp = $db->getDatas($sqlcount);
			$number = $countsp['dem'];
			$pages = ceil($number/8);
			$page =1;
			if(isset($_GET['page'])){
				$page =$_GET['page'];
			}
			$startpage =($page -1) *8;
			$sql = "SELECT * FROM monhoc limit $startpage,8";
			$data = $db->getAllData($sql);
			require_once('../../View/Admin/MonHoc/index.php');
			break;
		}
		default:{
			require_once('../../View/Admin/Layout/error404.html');
		}

	}
?> 