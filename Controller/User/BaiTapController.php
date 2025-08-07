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
		case 'NopBai':{
			$ListBaiTap = array();
			$ListCauHoi = array();
			$ListDapAn = array();
			$SoCauHoi = $_GET['txtSoCauHoi'];
			for ($i=1; $i<=$SoCauHoi;$i++){
				for ($j=1; $j<=2;$j++){
					if ($j==1){
						if( isset($_GET['txtCauHoi'.$i])){
							$ListBaiTap[$i][$j] =  $_GET['txtCauHoi'.$i];
						}
						else{
                            $ListBaiTap[$i][$j] = '';
                        }
						
					}
					else{
						if( isset($_GET['txtCauTL'.$i])){
						$ListBaiTap[$i][$j] = $_GET['txtCauTL'.$i];
						}
						else{
                            $ListBaiTap[$i][$j] = '';
                        }
					}
				}
			}
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$NgayLam = date("Y-m-d H:i:s");
			$MSSV =$_SESSION['MSSV'];
			$SoCauDung =0;
			for($i=0;$i<$SoCauHoi; $i++){
				$MaCauHoi = $ListBaiTap[$i+1][1];
				$sqlCauHoi="SELECT MaCauHoi,DapAnDung FROM cauhoi WHERE MaCauHoi=$MaCauHoi";
				$dataCauHoi = $db->getDatas($sqlCauHoi);
				if($dataCauHoi['DapAnDung'] == $ListBaiTap[$i+1][2]){
					$SoCauDung++;
				}
			}
			$MaBaiTap = $_GET["txtMaBaiTap"];
			$Diem=10/$SoCauHoi*$SoCauDung;
			$sqlKQLamBai="INSERT INTO `kqlambai`(`NgayLam`, `MSSV`, `MaBaiTap`, `SoCauDung`, `Diem`) VALUES ('$NgayLam','$MSSV','$MaBaiTap','$SoCauDung','$Diem')";
			$db->execute($sqlKQLamBai);
			for($i=0;$i<$SoCauHoi; $i++){
				$MaCauHoi = $ListBaiTap[$i+1][1];
				$CauTraLoi = $ListBaiTap[$i+1][2];
				$sqlCTBaiLam = "INSERT INTO `ctbailam`(`NgayLam`, `MaCauHoi`, `CauTraLoi`) VALUES ('$NgayLam','	$MaCauHoi','$CauTraLoi')";
				$db->execute($sqlCTBaiLam);
			}
			
			$sqlListKQLamBai = "SELECT * FROM kqlambai WHERE NgayLam = '$NgayLam'";
			$dataListKQLamBai = $db->getDatas($sqlListKQLamBai);
			$sqlListCTBaiLam = "SELECT * FROM ctbailam Where NgayLam = '$NgayLam'";
			$dataListCTBaiLam = $db->getAllData($sqlListCTBaiLam);
			$sqlBaiTap = "SELECT bt.MaBaiTap as 'MaBaiTap',bt.LoaiBaiTap,bt.NgayTao,bt.SoLuongCauHoi, bt.TenBaiTap ,gv.TenGiangVien, mh.TenMonHoc FROM `baitap` as bt, `giangvien` as gv, `baihoc` as bh, `monhoc` as mh  WHERE bt.MaBaiTap =$MaBaiTap AND bt.MaGiangVien =gv.MaGiangVien
			AND bt.MaBaiHoc =bh.MaBaiHoc and bh.MaMonHoc =mh.MaMonHoc ";
			$dataBaiTap = $db->getDatas($sqlBaiTap);
			


			require_once('../../View/User/KQLamBai.php');
			break;
		}
		case 'detail':{
			$MaBaiTap = $_GET['id'];
			$sqlBaiTap = "SELECT bt.MaBaiTap as 'MaBaiTap',bt.LoaiBaiTap,bt.NgayTao,bt.SoLuongCauHoi, bt.TenBaiTap ,gv.TenGiangVien, mh.TenMonHoc FROM `baitap` as bt, `giangvien` as gv, `baihoc` as bh, `monhoc` as mh  WHERE bt.MaBaiTap =$MaBaiTap AND bt.MaGiangVien =gv.MaGiangVien
			AND bt.MaBaiHoc =bh.MaBaiHoc and bh.MaMonHoc =mh.MaMonHoc ";
			$dataBaiTap = $db->getDatas($sqlBaiTap);
			$SLCauHoi = $dataBaiTap['SoLuongCauHoi'];
			$sqlCauHoi = "SELECT * FROM cauhoi WHERE MaBaiTap = $MaBaiTap ORDER BY RAND() LIMIT $SLCauHoi";
			$dataCauHoi = $db->getAllData($sqlCauHoi);
			require_once('../../View/User/ChiTietBaiTap.php');
			break;
		}
		default:{
			$sqlMonHoc= "SELECT * FROM monhoc WHERE MaMonHoc = 'DHIT_2022_1_2'";
			$dataMonHoc = $db->getDatas($sqlMonHoc);
			$MaMonHoc =$dataMonHoc['MaMonHoc'];
			$sqlBaiHoc = "SELECT * FROM baihoc WHERE MaMonHoc = '$MaMonHoc'" ;
			$dataBaiHoc = $db->getAllData($sqlBaiHoc);
			require_once('../../View/User/BaiTap.php');
			break;
		}

	}
?>