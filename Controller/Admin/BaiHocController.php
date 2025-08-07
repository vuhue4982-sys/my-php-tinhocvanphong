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
			$sqlMonHoc = "SELECT * FROM monhoc" ;
			$dataMonHoc = $db->getAllData($sqlMonHoc);
			$sqlNhanVien = "SELECT * FROM GiangVien" ;
			$dataNhanVien = $db->getAllData($sqlNhanVien);

			$thanhcong =NULL;
			if(isset($_POST['CreateBaiHoc'])) {    
				$MaMonHoc = $_POST['txtMaMonHoc'];
				$MaGiangVien = $_SESSION['MaGiangVien'];
				$TenBaiHoc = $_POST['txtTenBaiHoc'];
				$FileGiaoTrinh = $_POST['txtFileGiaoTrinh'];
				$NoiDung = $_POST['txtNoiDungBaiHoc'];
				$NgayTao = date("Y-m-d");
				
				// Xử lý upload video
				// Xử lý upload video
				$videoPath = '';
				if(isset($_FILES['txtVideo']) && $_FILES['txtVideo']['error'] == UPLOAD_ERR_OK) {
					$target_dir = "../../uploads/videos/";
					
					// Tạo thư mục nếu chưa tồn tại
					if(!is_dir($target_dir)) {
						mkdir($target_dir, 0755, true);
					}
					
					$videoFileName = basename($_FILES["txtVideo"]["name"]);
					$target_file = $target_dir . $videoFileName;
					$videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
					
					// Kiểm tra định dạng file
					$allowedTypes = ['mp4', 'webm', 'ogg'];
					if(in_array($videoFileType, $allowedTypes)) {
						if (move_uploaded_file($_FILES["txtVideo"]["tmp_name"], $target_file)) {
							$videoPath = $videoFileName; // Chỉ lưu tên file
						} else {
							echo "<script>alert('Có lỗi khi upload file video');</script>";
						}
					} else {
						echo "<script>alert('Chỉ chấp nhận file MP4, WEBM hoặc OGG.');</script>";
					}
				}
				
				$sql = "INSERT INTO baihoc(`MaMonHoc`, `MaGiangVien`, `TenBaiHoc`,`FileGiaoTrinh`, `Video`, `NoiDung`, `NgayTao`) 
						VALUES('$MaMonHoc','$MaGiangVien','$TenBaiHoc','$FileGiaoTrinh','$videoPath','$NoiDung','$NgayTao')";
				
				if($db->execute($sql)){
					$thanhcong = 'ThemMoiThanhCong';
				} else {
					$thanhcong = NULL;
				}
				
				if ($thanhcong != NULL){
					header('location: index.php?controller=BaiHoc&action=list');
					break;
				}
			}
			require_once('../../View/Admin/BaiHoc/create.php');
			break;
		}
		case 'edit':{
				if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "SELECT * FROM baihoc WHERE MaBaiHoc = $id ";
				$dataid = $db->getDatas($sql);
				$sqlMonHoc = "SELECT * FROM monhoc" ;
				$dataMonHoc = $db->getAllData($sqlMonHoc);	
			
				if(isset($_POST['EditBaiHoc']))
				{
					$MaMonHoc =$_POST['txtMaMonHoc'];
					$TenBaiHoc =$_POST['txtTenBaiHoc'];
					if($_POST['txtVideo']!=''){
						$Video =$_POST['txtVideo'];
					}
					else{
						$Video =$dataid['Video'];
					}
					$FileGiaoTrinh =$_POST['txtFileGiaoTrinh'];
					$NoiDung =$_POST['txtNoiDungBaiHoc'];
					$sql = "UPDATE baihoc SET MaMonHoc = '$MaMonHoc', TenBaiHoc='$TenBaiHoc', Video = '$Video',FileGiaoTrinh='$FileGiaoTrinh', NoiDung='$NoiDung' WHERE MaBaiHoc =$id";
					if($db->execute($sql)){
						$thanhcong ='EditNhanVien';
					}
					else{
						$thanhcong =NULL;
					}
					if ($thanhcong !=NULL){
						header('location: index.php?controller=BaiHoc&action=list');
						break;
					}
				} 
			}
			require_once('../../View/Admin/BaiHoc/edit.php');
			break;
		}
		case 'detail':{
			if(isset($_GET['id'])){
				$sqlMonHoc = "SELECT * FROM monhoc" ;
				$dataMonHoc = $db->getAllData($sqlMonHoc);	
				$thanhcong =NULL;
				$id =$_GET['id'];
				$sql = "SELECT * FROM baihoc WHERE MaBaiHoc= $id";
				$dataid = $db->getDatas($sql);
			}
			require_once('../../View/Admin/BaiHoc/detail.php');
			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$id =$_GET['id'];
				$sql = "DELETE FROM baihoc WHERE  MaBaiHoc ='$id'";
				if($db->execute($sql)){
					$thanhcong ='oke';
				}
				else{
					$thanhcong =NULL;
				}
				if ($thanhcong !=NULL){
					header('location: index.php?controller=BaiHoc&action=list');
					break;
				}
			}
			break;
		}
		case 'list':{
			$sqlcount = "SELECT count(MaBaiHoc) as dem FROM baihoc";
			$countsp = $db->getDatas($sqlcount);
			$number = $countsp['dem'];
			$pages = ceil($number/8);
			$page =1;
			if(isset($_GET['page'])){
				$page =$_GET['page'];
			}
			$startpage =($page -1) *8;
			$sql = "SELECT baihoc.MaBaiHoc, monhoc.TenMonHoc, baihoc.TenBaiHoc, giangvien.TenGiangVien, baihoc.NgayTao
			FROM baihoc
			JOIN giangvien ON baihoc.MaGiangVien = giangvien.MaGiangVien
			JOIN monhoc ON baihoc.MaMonHoc = monhoc.MaMonHoc";
			$data = $db->getAllData($sql);
			require_once('../../View/Admin/BaiHoc/index.php');
			break;
		}
		default:{
			require_once('../../View/Admin/Layout/error404.html');
		}

	}
?> 