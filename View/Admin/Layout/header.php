
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site icon -->
    <link rel="icon" href="../../Content/images/fevicon.png" type="image/png" />
    <!-- Box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Style css-->
    <link rel="stylesheet" href="../../Asset/Css/style.css">
    <!-- Icon Logo Website -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</script>	

</head>
<body >
   <div class="sidebar">
        <div class="brand">
            <a href="index.php?controller=TrangChu" class="logo-box">
                <i class='bx bxl-xing'></i>
                <div class="logo-name">I T</div>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <div class="title">
                    <a href="index.php?controller=TrangChu" class="link">
                        <i class='bx bx-grid-alt' ></i>
                        <span class="name">Trang Chủ</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=TrangChu" class="link submenu-title">Trang Chủ</a>
                </div>
               
            </li>
            <li>
                <div class="title">
                    <a href="index.php?controller=GiangVien&action=list" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Quản Lý Giảng Viên</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=GiangVien&action=list" class="link submenu-title">Quản Lý Giảng Viên</a>
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="index.php?controller=MonHoc&action=list" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Quản Lý Môn Học</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=MonHoc&action=list" class="link submenu-title">Quản Lý Môn Học</a>
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="index.php?controller=BaiHoc&action=list" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Quản Lý Bài Học</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=BaiHoc&action=list" class="link submenu-title">Quản Lý Bài Học</a>
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="index.php?controller=BaiTap&action=list" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Quản Lý Bài Tập</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=BaiTap&action=list" class="link submenu-title">Quản Lý Bài Tập</a>
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="index.php?controller=CauHoi&action=list" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Quản Lý Câu Hỏi</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=CauHoi&action=list" class="link submenu-title">Quản Lý Câu Hỏi</a>
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="index.php?controller=KetQuaLamBaiTap&action=list" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Quản Lý Kết Quả Thi</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=KetQuaLamBaiTap&action=list" class="link submenu-title">Quản Lý Kết Quả Thi</a>
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="index.php?controller=SinhVien&action=list" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Quản Lý Sinh Viên</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="index.php?controller=SinhVien&action=list" class="link submenu-title">Quản Lý Sinh Viên</a>
                </div>
            </li>
         </ul>
    </div>
    <main>
        <nav>
            <div class="nav-left">
                <i class='bx bx-menu toggle-sidebar'></i>
                <form action="#">
                    <div class="form-group">
                        <input type="text" placeholder="Search...." >
                        <i class='bx bx-search icon' ></i>
                    </div>
                </form>
            </div>
            <div class="nav-right">
                <a href="" class="nav-link">
                    <i class='bx bxs-bell icon' ></i>
                    <span class="badge">5</span>
                </a>
                <a href="" class="nav-link">
                    <i class='bx bxs-message-square-dots icon' ></i>
                    <span class="badge">5</span>
                </a>
                <span class="divider"></span>
                <div class="profile">
                    <img src="../../Asset/Image/Avata/<?php echo $_SESSION['Avata'] ?>">
                    <ul class="profile-link">
                        <li><a href=""><i class='bx bxs-user-circle icon'></i>Profile</a></li>
                        <li><a href=""><i class='bx bxs-cog' ></i>Settings</a></li>
                        <li><a href="index.php?action=DangXuat"><i class='bx bxs-log-out-circle' ></i>Đăng Xuất</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <content>
            
            
       
   
