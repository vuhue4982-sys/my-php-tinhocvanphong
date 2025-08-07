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
			require_once('../../View/User/TrangChu.php');
		}

	}

?> 