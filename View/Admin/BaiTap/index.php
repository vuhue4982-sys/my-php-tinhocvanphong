<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Bài Tập</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Bài Tập</a> </li>
</ul>
<div class="row">
    <div class="table">
        <div class="table_header">
            <p>Danh Sách Bài Tập</p>
            <div>
                <input type="text" placeholder="Search">
                <a href="index.php?controller=BaiTap&action=create"><button class="add_new ">+ Thêm Mới Bài
                        Tập</button></a>
            </div>
        </div>
        <?php if($data != null) { ?>
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tên Bài Tập</th>
                        <th>Số Lượng Câu Hỏi</th>
                        <th>Loại Bài Tập</th>
                        <th>Tên Môn Học</th>
                        <th>Người Tạo</th>
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
                        <td><?php echo $value['TenBaiTap']; ?></td>
                        <td><?php echo $value['SoLuongCauHoi']; ?></td>
                        <td><?php if($value['LoaiBaiTap'] == 1 )
                            echo 'Tự Luận';
                        else{
                            echo 'Trắc Nghiệm';
                        }
                        ?></td>
                        <td><?php echo $value['TenBaiHoc']; ?></td>
                        <td><?php echo $value['TenGiangVien']; ?></td>
                        <td>
                            <a href="index.php?controller=BaiTap&action=detail&id=<?php echo $value['MaBaiTap']?>"
                                class="btn_icon btn_detail">
                                <i class='bx bxs-detail'></i>
                            </a>
                            <a href="index.php?controller=BaiTap&action=edit&id=<?php echo $value['MaBaiTap']?>"
                                class="btn_icon btn_edit">
                                <i class='bx bxs-edit'></i>
                            </a>
                            <a href="index.php?controller=BaiTap&action=delete&id=<?php echo $value['MaBaiTap']?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa Bài Tập này chứ?')"
                                class="btn_icon btn_detele">
                                <i class='bx bxs-trash-alt'></i>
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
        <?php } 
        else echo"<div class='row' style='justify-content: center;background: white;' >Hiện tại chưa có dữ liệu</div>";
        if($number > 8){
        ?>
        <div class="pagination">
            <a href="index.php?controller=BaiTap&action=list&page=1">
                <div><i class='bx bx-chevrons-left'></i></div>
            </a>
            <?php if ($page==1) 
                {
                  echo " <div><i class='bx bx-chevron-left'></i></div>"; 
                }
             else{
                ?>
            <a href="index.php?controller=BaiTap&action=list&page=<?php echo $page-1 ?>">
                <div><i class='bx bx-chevron-left'></i></div>
            </a>
            <?php 
                }
            ?>

            <?php  for($i=1;$i<= $pages; $i++)
                { 
                    echo '<a href="index.php?controller=BaiTap&action=list&page='.$i.'"><div>'.$i.'</div></a>';
                   
                } 
            ?>

            <?php if ($page==$pages) 
                {
                  echo " <div><i class='bx bx-chevron-right'></i></div>"; 
                }
             else{
                ?>
            <a href="index.php?controller=BaiTap&action=list&page=<?php echo $page+1 ?>">
                <div><i class='bx bx-chevron-right'></i></div>
            </a>
            <?php 
                }
            ?>

            <a href="index.php?controller=NhanVien&action=list&page=<?php echo $pages ?>">
                <div><i class='bx bx-chevrons-right'></i></div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>