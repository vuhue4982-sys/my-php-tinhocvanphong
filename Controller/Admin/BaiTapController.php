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
			$sqlBaiHoc = "SELECT * FROM baihoc" ;
			$dataBaiHoc = $db->getAllData($sqlBaiHoc);
			$thanhcong =NULL;
			if(isset($_POST['CreateBaiTap']))
			{	
				$MaBaiHoc =$_POST['txtMaBaiHoc'];
				$MaGiangVien =	$_SESSION['MaGiangVien'];
				$TenBaiTap =$_POST['txtTenBaiTap'];
				$SoLuongCauHoi =$_POST['txtSoLuongCauHoi'];
				$LoaiBaiTap =$_POST['txtLoaiBaiTap'];
				$NgayTao = date("Y-m-d");
				$sql = "INSERT INTO baitap(MaBaiHoc, MaGiangVien, TenBaiTap, SoLuongCauHoi, LoaiBaiTap, NgayTao) VALUES('$MaBaiHoc','$MaGiangVien','$TenBaiTap','$SoLuongCauHoi','$LoaiBaiTap','$NgayTao')";
				if($db->execute($sql)){
					$thanhcong ='true';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					echo "Thêm Mới Thành Công";
					header('location: index.php?controller=BaiTap&action=list');
					break;
				}
			} 
			require_once('../../View/Admin/BaiTap/create.php');
			break;
		}
		case 'edit':{
			if(isset($_GET['id'])){
				$sqlBaiHoc = "SELECT * FROM baihoc" ;
				$dataBaiHoc = $db->getAllData($sqlBaiHoc);
				$id =$_GET['id'];
				$sql = "SELECT * FROM baitap WHERE MaBaiTap= $id";
				$dataid = $db->getDatas($sql);
				if(isset($_POST['EditBaiTap']))
				{
					$MaBaiHoc =$_POST['txtMaBaiHoc'];
					$MaGiangVien =	$_SESSION['MaGiangVien'];
					$TenBaiTap =$_POST['txtTenBaiTap'];
					$LoaiBaiTap =$_POST['txtLoaiBaiTap'];
					$SoLuongCauHoi =$_POST['txtSoLuongCauHoi'];
					$sql = "UPDATE baitap SET MaBaiHoc = '$MaBaiHoc',LoaiBaiTap='$LoaiBaiTap', TenBaiTap = '$TenBaiTap', SoLuongCauHoi='$SoLuongCauHoi' WHERE MaBaiTap =$id";
					if($db->execute($sql)){
						$thanhcong ='EditNhanVien';
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=BaiTap&action=list');
						break;
					}
				} 
			}
			require_once('../../View/Admin/BaiTap/edit.php');
			break;
		}
		case 'detail':{
			if(isset($_GET['id'])){
				$sqlMonHoc = "SELECT * FROM monhoc" ;
				$dataMonHoc = $db->getAllData($sqlMonHoc);
				$thanhcong =NULL;
				$id =$_GET['id'];
				$sql = "SELECT * FROM baitap WHERE MaBaiTap= $id";
				$dataid = $db->getDatas($sql);
			}
			require_once('../../View/Admin/BaiTap/detail.php');
			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "DELETE FROM baitap WHERE  MaBaiTap ='$id'";
				if($db->execute($sql)){
					$thanhcong ='oke';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					header('location: index.php?controller=BaiTap&action=list');
					break;
				}
			}
			break;
		}
		case 'list':{
			$sqlcount = "SELECT count(MaBaiTap) as dem FROM baitap";
			$countsp = $db->getDatas($sqlcount);
			$number = $countsp['dem'];
			$pages = ceil($number/8);
			$page =1;
			if(isset($_GET['page'])){
				$page =$_GET['page'];
			}
			$startpage =($page -1) *8;
			$sql = "SELECT baitap.MaBaiTap, baitap.TenBaiTap, baitap.SoLuongCauHoi, giangvien.TenGiangVien, baitap.NgayTao, baihoc.TenBaiHoc, baitap.LoaiBaiTap
			FROM baitap
			JOIN giangvien ON baitap.MaGiangVien = giangvien.MaGiangVien
			JOIN baihoc ON baitap.MaBaiHoc = baihoc.MaBaiHoc 
			limit $startpage,8";
			$data = $db->getAllData($sql);
			require_once('../../View/Admin/BaiTap/index.php');
			break;
		}
		default:{
			require_once('../../View/Admin/Layout/error404.html');
		}

	}
?> 