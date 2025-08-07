<?php
/*	include "../../Model/DBConfig.php ";*/
	if(isset($_GET['action'])){
		$action =$_GET['action'];
	}
	else{
		$action='';
	}
	switch ($action) {
	case 'add': {
    if(isset($_POST['AddSinhVien'])) {
        // Xử lý upload avatar
        $avata = 'default_avatar.jpg';
        if(isset($_FILES['txtAvata']) && $_FILES['txtAvata']['error'] == 0) {
            $uploadDir = '../../uploads/';
            $avata = basename($_FILES['txtAvata']['name']);
            if(!move_uploaded_file($_FILES['txtAvata']['tmp_name'], $uploadDir . $avata)) {
                echo "Lỗi khi upload file ảnh";
                exit;
            }
        }
        
        // Kiểm tra MSSV đã tồn tại chưa
        $checkSql = "SELECT MSSV FROM sinhvien WHERE MSSV = '".$_POST['txtMSSV']."'";
        if($db->getDatas($checkSql)) {
            echo "Mã sinh viên đã tồn tại";
            exit;
        }
        
        // Sử dụng SQL thông thường thay vì prepared statement
        $sql = "INSERT INTO sinhvien (MSSV, TenSinhVien, SoDienThoai, DiaChi, Email, MatKhau, Avata) 
                VALUES ('".$_POST['txtMSSV']."', 
                        '".$_POST['txtTenSinhVien']."', 
                        '".$_POST['txtSoDienThoai']."', 
                        '".$_POST['txtDiachi']."', 
                        '".$_POST['txtEmail']."', 
                        '".$_POST['txtMatKhau']."', 
                        '$avata')";
        
        if($db->execute($sql)) {
            header('Location: index.php?controller=SinhVien&action=list');
            exit;
        } else {
            echo "Lỗi khi thêm sinh viên: " . $db->getLastError();
        }
    }
    require_once('../../View/Admin/SinhVien/add.php');
    break;
}
		case 'edit': {
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				// Thay đổi cách truy vấn dữ liệu
				$sql = "SELECT * FROM sinhvien WHERE MSSV = '$id'"; // Tạm thời dùng cách này để test
				$dataid = $db->getDatas($sql); // Sửa từ getDatas() thành getData() nếu cần
				
				if(isset($_POST['EditSinhvien'])) {
					// Xử lý upload file avatar
					$avata = $dataid['Avata'];
					if(isset($_FILES['txtAvata']) && $_FILES['txtAvata']['error'] == 0) {
						$uploadDir = '../../uploads/';
						$avata = basename($_FILES['txtAvata']['name']);
						if(move_uploaded_file($_FILES['txtAvata']['tmp_name'], $uploadDir . $avata)) {
							// Upload thành công
						}
					}
					
					// Sửa lại câu lệnh SQL không dùng prepared statement tạm thời
					$sql = "UPDATE sinhvien SET 
							TenSinhVien = '".$_POST['txtTenSinhVien']."', 
							SoDienThoai = '".$_POST['txtSoDienThoai']."', 
							Avata = '$avata', 
							DiaChi = '".$_POST['txtDiachi']."', 
							Email = '".$_POST['txtEmail']."', 
							MatKhau = '".$_POST['txtMatKhau']."' 
							WHERE MSSV = '$id'";
					
					if($db->execute($sql)) {
						header('Location: index.php?controller=SinhVien&action=list');
						exit;
					} else {
						echo "Lỗi khi cập nhật: " . $db->getLastError();
					}
				}
			}
			require_once('../../View/Admin/SinhVien/edit.php');
			break;
		}
		case 'detail':{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$sql = "SELECT * FROM sinhvien WHERE MSSV = '$id'"; // Sửa từ quanly sang sinhvien
				$dataid = $db->getDatas($sql);
			}
			require_once('../../View/Admin/SinhVien/detail.php');
			break;
		}
		case 'list': {
   			 $search = isset($_GET['search']) ? trim($_GET['search']) : '';
			
			// Câu lệnh SQL cơ bản
			$sqlcount = "SELECT count(MSSV) as dem FROM sinhvien";
			$sql = "SELECT * FROM sinhvien";
			
			// Thêm điều kiện tìm kiếm nếu có
			if(!empty($search)) {
				$searchTerm = "%$search%";
				
				// Sửa thành câu lệnh SQL thông thường (không dùng prepared statement)
				$sqlcount .= " WHERE TenSinhVien LIKE '$searchTerm' OR MSSV LIKE '$searchTerm' OR Email LIKE '$searchTerm'";
				$sql .= " WHERE TenSinhVien LIKE '$searchTerm' OR MSSV LIKE '$searchTerm' OR Email LIKE '$searchTerm'";
				
				$countsp = $db->getDatas($sqlcount);
				$number = $countsp['dem'];
			} else {
				$countsp = $db->getDatas($sqlcount);
				$number = $countsp['dem'];
			}
			
			$pages = ceil($number/8);
			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$startpage = ($page - 1) * 8;
			
			$sql .= " LIMIT $startpage, 8";
			
			$data = $db->getAllData($sql);
			
			require_once('../../View/Admin/SinhVien/index.php');
			break;
		}
	}
?> 