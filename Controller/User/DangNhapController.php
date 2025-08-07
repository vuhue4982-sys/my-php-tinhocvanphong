<?php
	if(isset($_GET['action'])){
		$action =$_GET['action'];
	}
	else{
		$action='';
	}
	switch ($action) {
		default:{
			
			if(isset($_GET['email']) && isset($_GET['password'])){
				$email =$_GET['email'];
				$password =$_GET['password'];
			}
			else{
				$email='';
				$password='';
			}
			if($email != '' and $password != '')
			{
				
				$sql = "SELECT * FROM sinhvien WHERE Email = '$email' and MatKhau ='$password'";
				$dataid = $db->getDatas($sql);
					if($db->getDatas($sql)){
						$thanhcong ='true';
						$_SESSION['TenSinhVien'] =$dataid['TenSinhVien'];
						$_SESSION['MSSV'] =$dataid['MSSV'];
						$_SESSION['Avatauser'] =$dataid['Avata'];
						$_SESSION['DangNhapUser'] =true;
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=TrangChu');
				}
			}
			require_once('../../View/User/DangNhap.php');
		}
	}
?> 