<?php
/*	include "../../Model/DBConfig.php ";*/
	if(isset($_GET['action'])){
		$action =$_GET['action'];
	}
	else{
		$action='';
	}
	switch ($action) {
		case 'list':{
			$sqlcount = "SELECT count(NgayLam) as dem FROM kqlambai";
			$countsp = $db->getDatas($sqlcount);
			$number = $countsp['dem'];
			$pages = ceil($number/8);
			$page =1;
			if(isset($_GET['page'])){
				$page =$_GET['page'];
			}
			$startpage =($page -1) *8;
			$sql = "SELECT kq.NgayLam, kq.SoCauDung, kq.Diem,bt.TenBaiTap ,bt.MaBaiTap,sv.MSSV, sv.TenSinhVien
			FROM kqlambai as kq, sinhvien as sv, baitap as bt 
            WHERE kq.MaBaiTap =bt.MaBaiTap AND kq.MSSV = sv.MSSV
			limit $startpage,8";
			$data = $db->getAllData($sql);
			require_once('../../View/Admin/KetQuaLamBaiTap/index.php');
			break;
		}
		default:{
			require_once('../../View/Admin/Layout/error404.html');
		}
	}
?> 