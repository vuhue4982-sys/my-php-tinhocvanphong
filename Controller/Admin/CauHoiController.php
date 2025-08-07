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
			$sqlBaiTap = "SELECT * FROM baitap" ;
			$dataBaiTap = $db->getAllData($sqlBaiTap);
			$thanhcong =NULL;
			if(isset($_POST['CreateCauHoi']))
			{	
				$MaBaiTap  =$_POST['txtMaBaiTap'];
				$NoiDungCauHoi =$_POST['txtNoiDungCauHoi'];
				$DapAnA =$_POST['txtDapAnA'];
				$DapAnB =$_POST['txtDapAnB'];
				$DapAnC =$_POST['txtDapAnC'];
				$DapAnD =$_POST['txtDapAnD'];
				$DapAnDung =$_POST['txtDapAnDung'];
				$sql = "INSERT INTO cauhoi(MaBaiTap, NoiDungCauHoi, DapAnA, DapAnB, DapAnC, DapAnD, DapAnDung) VALUES('$MaBaiTap','$NoiDungCauHoi','$DapAnA','$DapAnB','$DapAnC','$DapAnD','$DapAnDung')";
				if($db->execute($sql)){
					$thanhcong ='True';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					echo "Thêm Mới Thành Công";
					header('location: index.php?controller=CauHoi&action=list');
					break;
				}
			} 
			require_once('../../View/Admin/CauHoi/create.php');
			break;
		}
		case 'edit':{
				if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sqlBaiTap = "SELECT * FROM baitap" ;
				$dataBaiTap = $db->getAllData($sqlBaiTap);
				$sql = "SELECT * FROM cauhoi WHERE MaCauHoi= $id";
				$dataid = $db->getDatas($sql);
				if(isset($_POST['EditCauHoi']))
				{
					$MaBaiTap  =$_POST['txtMaBaiTap'];
					$NoiDungCauHoi =$_POST['txtNoiDungCauHoi'];
					$DapAnA =$_POST['txtDapAnA'];
					$DapAnB =$_POST['txtDapAnB'];
					$DapAnC =$_POST['txtDapAnC'];
					$DapAnD =$_POST['txtDapAnD'];
					$DapAnDung =$_POST['txtDapAnDung'];
					$sql = "UPDATE cauhoi SET MaBaiTap='$MaBaiTap', NoiDungCauHoi='$NoiDungCauHoi', DapAnA = '$DapAnA', DapAnB='$DapAnB', DapAnC='$DapAnC', DapAnD='$DapAnD', DapAnDung='$DapAnDung' WHERE MaCauHoi  =$id";
					if($db->execute($sql)){
						$thanhcong ='true';
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=CauHoi&action=list');
						break;
					}
				} 
			}
			require_once('../../View/Admin/CauHoi/edit.php');
			break;
		}
		case 'detail':{
			if(isset($_GET['id'])){
				$sqlBaiTap = "SELECT * FROM baitap" ;
				$dataBaiTap = $db->getAllData($sqlBaiTap);
				$thanhcong =NULL;
				$id =$_GET['id'];
				$sql = "SELECT * FROM cauhoi WHERE MaCauHoi= $id";
				$dataid = $db->getDatas($sql);
			}
			require_once('../../View/Admin/CauHoi/detail.php');
			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "DELETE FROM cauhoi WHERE  MaCauHoi ='$id'";
				if($db->execute($sql)){
					$thanhcong ='true';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					header('location: index.php?controller=CauHoi&action=list');
					break;
				}
			}
			break;
		}
		case 'list':{
			$sqlcount = "SELECT count(MaCauHoi) as dem FROM cauhoi";
			$countsp = $db->getDatas($sqlcount);
			$number = $countsp['dem'];
			$pages = ceil($number/8);
			$page =1;
			if(isset($_GET['page'])){
				$page =$_GET['page'];
			}
			$startpage =($page -1) *8;
			$sql = "SELECT cauhoi.MaCauHoi, cauhoi.NoiDungCauHoi, cauhoi.DapAnA, cauhoi.DapAnB, cauhoi.DapAnC, cauhoi.DapAnD, cauhoi.DapAnD,cauhoi.DapAnDung, baitap.TenBaiTap
			FROM cauhoi
			JOIN baitap ON baitap.MaBaiTap = cauhoi.MaBaiTap
			limit $startpage,8";
			$data = $db->getAllData($sql);
			require_once('../../View/Admin/CauHoi/index.php');
			break;
		}
		default:{
			require_once('../../View/Admin/Layout/error404.html');
		}

	}
?> 