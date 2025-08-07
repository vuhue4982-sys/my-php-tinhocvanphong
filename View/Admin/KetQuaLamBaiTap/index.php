<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title">Kết Qủa Làm Bài Tập</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Kết Qủa Làm Bài Tập</a> </li>
            </ul>
<div class="row">
    <div class="table"> 
        <div class="table_header">
            <p>Danh Sách Điểm Làm Bài Tập</p>
            <div>
                <input type="text" placeholder="Search">
            </div>
        </div>
        <?php if($data != null) { ?>
            <div class="table_section">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Ngày Làm Bài</th>
                            <th>Tên Sinh Viên</th>
                            <th>Tên Bài Tập</th>
                            <th>Số Điểm</th>
                            <th>Số Câu Đúng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt =1;
                            foreach($data as $value){
                        ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $value['NgayLam']; ?></td>
                                    <td><?php echo $value['TenSinhVien']; ?></td>
                                    <td><?php echo $value['TenBaiTap']; ?></td>
                                    <td><?php echo $value['Diem']; ?></td>
                                    <td><?php echo $value['SoCauDung']; ?></td>
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
            <a href="index.php?controller=KetQuaLamBaiTap&action=list&page=1"><div><i class='bx bx-chevrons-left'></i></div></a>
             <?php if ($page==1) 
                {
                  echo " <div><i class='bx bx-chevron-left'></i></div>"; 
                }
             else{
                ?>
                    <a href="index.php?controller=KetQuaLamBaiTap&action=list&page=<?php echo $page-1 ?>"><div><i class='bx bx-chevron-left'></i></div></a>
             <?php 
                }
            ?>
          
            <?php  for($i=1;$i<= $pages; $i++)
                { 
                    echo '<a href="index.php?controller=KetQuaLamBaiTap&action=list&page='.$i.'"><div>'.$i.'</div></a>';
                   
                } 
            ?>

             <?php if ($page==$pages) 
                {
                  echo " <div><i class='bx bx-chevron-right'></i></div>"; 
                }
             else{
                ?>
                   <a href="index.php?controller=KetQuaLamBaiTap&action=list&page=<?php echo $page+1 ?>"><div><i class='bx bx-chevron-right'></i></div></a>
             <?php 
                }
            ?>
           
            <a href="index.php?controller=KetQuaLamBaiTap&action=list&page=<?php echo $pages ?>"><div><i class='bx bx-chevrons-right'></i></div></a>
        </div>
        <?php } ?>
    </div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>