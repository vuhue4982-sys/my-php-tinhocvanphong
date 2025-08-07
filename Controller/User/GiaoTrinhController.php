<?php
/*	include "../../Model/DBConfig.php ";*/
	if(isset($_GET['action'])){
		$action =$_GET['action'];
		
	}
	else{
		$action='';
	}
	$show_chatbot = true; // Thêm dòng này
	switch ($action) {
		default:{
			$sqlMonHoc= "SELECT * FROM monhoc WHERE MaMonHoc = 'DHIT_2022_1_2'";
			$dataMonHoc = $db->getDatas($sqlMonHoc);
			$MaMonHoc =$dataMonHoc['MaMonHoc'];
			$sqlBaiHoc = "SELECT * FROM baihoc WHERE MaMonHoc = '$MaMonHoc'" ;
			$dataBaiHoc = $db->getAllData($sqlBaiHoc);
			require_once('../../View/User/GiaoTrinh.php');
			break;
		}

	}
?> 