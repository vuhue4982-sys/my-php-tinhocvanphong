<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../Asset/Css/index.css">
    <!-- <link rel="stylesheet" href="index.css"> -->
</head>
<body>
    <nav>
        <div class="navbar">
            <i class='bx bx-menu' ></i>
            <div class="logo" style="display: flex;">
                <a href="index.php?controller=TrangChu" class="logo-box" style="display: flex;align-items: center;grid-gap: 18px;">
                    <i class='bx bxl-xing'></i>
                    <div class="logo-name">I T</div>
                </a>
            </div>
            <div class="nav-links">
                <div class="sidebar-logo">
                    <span class="logo_name">logo</span>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li>
                        <a href="index.php?controller=TrangChu">Trang chủ</a>
                    </li>
                    <li>
                        <a href="index.php?controller=TongQuan">Tổng Quan</a>
                    </li>
                    <li>
                        <a href="index.php?controller=GiaoTrinh">Giáo trình</a>
                    </li>
                    <li>
                        <a href="index.php?controller=Video">Video</a>
                    </li>
                    <li>
                        <a href="index.php?controller=BaiTap">Bài tập</a>
                    </li>
                    <li>
                       <a href="">Xin Chào: <?php echo $_SESSION['TenSinhVien'] ?></a> 
                        
                    </li>
                    <li>
                        <a href="index.php?controller=DangXuat">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="search-box">
                <i class="bx bx-search"></i>
                <div class="input-box">
                    <input type="text" placeholder="search....">
                </div>
            </div>
        </div>
    </nav>
    <main>
    