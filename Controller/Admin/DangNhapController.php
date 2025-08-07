<?php
	if(isset($_GET['action'])){
		$action =$_GET['action'];
	}
	else{
		$action='';
	}
	switch ($action) {
		case 'DangXuat':{
			$_SESSION['TenNhanVien'] =null;
			$_SESSION['MaNhanVien'] =null;
			$_SESSION['DangNhap'] =false;
			require_once('../../View/Admin/DangNhap.php');
			break;
		}
		default:{
			if(isset($_GET['email'])){
				$email =$_GET['email'];
			}
			else{
				$email='';
			}
			if(isset($_GET['password'])){
				$password =$_GET['password'];
			}
			else{
				$password='';
			}
			if($email != '' and $password != '')
			{
				$sql = "SELECT * FROM giangvien WHERE Email = '$email' and MatKhau='$password'";
				$dataid = $db->getDatas($sql);
					if($db->getDatas($sql)){
						$thanhcong ='createchucvu';
						$_SESSION['TenGiangVien'] =$dataid['TenGiangVien'];
						$_SESSION['MaGiangVien'] =$dataid['MaGiangVien'];
						$_SESSION['Avata'] =$dataid['Avata'];
						$_SESSION['DangNhap'] =true;
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=TrangChu');
					}
				
			}
		}
		require_once('../../View/Admin/DangNhap.php');
	}
?> 