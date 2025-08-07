<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Sinh Viên</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Sinh Viên</a> </li>
            </ul>
<div class="row">
    <div class="table"> 
        <div class="table_header">
            <p>Danh Sách Sinh Viên</p>
            <div class="header_actions">
                <div class="action_group">
                    <a href="index.php?controller=SinhVien&action=add" class="btn btn-success">
                        <i class='bx bx-plus'></i> Thêm mới
                    </a>
                </div>
                <div class="search_group">
                    <form method="GET" action="" class="search_form">
                        <input type="hidden" name="controller" value="SinhVien">
                        <input type="hidden" name="action" value="list">
                        <input type="text" name="search" placeholder="Tìm kiếm..." 
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <button type="submit" class="btn btn-search">
                            <i class='bx bx-search'></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>MSSV</th>
                        <th>Tên Sinh Viên</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Avata</th>
                        <th>Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stt =1;
                        foreach($data as $value){
                    ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $value['MSSV']; ?></td>
                                <td><?php echo $value['TenSinhVien']; ?></td>
                                <td><?php echo $value['DiaChi']; ?></td>
                                <td><?php echo $value['SoDienThoai']; ?></td>
                                <td><?php echo $value['Email']; ?></td>
                                <td><?php echo $value['Avata']; ?></td>
                                <td>
                                    <a href="index.php?controller=SinhVien&action=detail&id=<?php echo $value['MSSV']?>" class="btn_icon btn_detail">
                                        <i class='bx bxs-detail'></i>
                                    </a>
                                </td>
                            </tr>
                    <?php 
                        $stt++;
                        }
                    ?>
                </tbody>
            </table>                        
        </div>
       <div class="pagination">
    <a href="index.php?controller=SinhVien&action=list&page=1<?php echo !empty($search) ? '&search='.urlencode($search) : '' ?>">
        <div><i class='bx bx-chevrons-left'></i></div>
    </a>
    <?php if ($page==1) { ?>
        <div><i class='bx bx-chevron-left'></i></div>
    <?php } else { ?>
        <a href="index.php?controller=SinhVien&action=list&page=<?php echo $page-1 ?><?php echo !empty($search) ? '&search='.urlencode($search) : '' ?>">
            <div><i class='bx bx-chevron-left'></i></div>
        </a>
    <?php } ?>
    
    <?php for($i=1; $i<=$pages; $i++) { ?>
        <a href="index.php?controller=SinhVien&action=list&page=<?php echo $i ?><?php echo !empty($search) ? '&search='.urlencode($search) : '' ?>">
            <div><?php echo $i ?></div>
        </a>
    <?php } ?>
    
    <?php if ($page==$pages) { ?>
        <div><i class='bx bx-chevron-right'></i></div>
    <?php } else { ?>
        <a href="index.php?controller=SinhVien&action=list&page=<?php echo $page+1 ?><?php echo !empty($search) ? '&search='.urlencode($search) : '' ?>">
            <div><i class='bx bx-chevron-right'></i></div>
        </a>
    <?php } ?>
    
    <a href="index.php?controller=SinhVien&action=list&page=<?php echo $pages ?><?php echo !empty($search) ? '&search='.urlencode($search) : '' ?>">
        <div><i class='bx bx-chevrons-right'></i></div>
    </a>
</div>

<?php require_once('../../View/Admin/Layout/footer.php'); ?>