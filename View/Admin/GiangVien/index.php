<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Giảng Viên</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Giảng Viên</a> </li>
            </ul>
<div class="row">
    <div class="table"> 
        <div class="table_header">
            <p>Danh Sách Giảng Viên</p>
            <div>
                <input type="text" placeholder="Search">
                <a href="index.php?controller=GiangVien&action=create"><button class="add_new ">+ Thêm Mới Giảng Viên</button></a>
            </div>
        </div>
        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mã Giảng Viên</th>
                        <th>Tên Giảng Viên</th>
                        <th>Số Điện Thoại</th>
                        <th>CCCD</th>
                        <th>Địa Chỉ</th>
                        <th>Email</th>
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
                                <td><?php echo $value['MaGiangVien']; ?></td>
                                <td><?php echo $value['TenGiangVien']; ?></td>
                                <td><?php echo $value['SoDienThoai']; ?></td>
                                <td><?php echo $value['CCCD']; ?></td>
                                <td><?php echo $value['DiaChi']; ?></td>
                                <td><?php echo $value['Email']; ?></td>
                                <td>
                                    <a href="index.php?controller=GiangVien&action=detail&id=<?php echo $value['MaGiangVien']?>" class="btn_icon btn_detail">
                                        <i class='bx bxs-detail'></i>
                                    </a>
                                    <a href="index.php?controller=GiangVien&action=edit&id=<?php echo $value['MaGiangVien']?>" class="btn_icon btn_edit">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                    <a href="index.php?controller=GiangVien&action=delete&id=<?php echo $value['MaGiangVien']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa giảng viên này chứ?')"  class="btn_icon btn_detele">
                                        <i class='bx bxs-trash-alt' ></i>
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
            <a href="index.php?controller=GiangVien&action=list&page=1"><div><i class='bx bx-chevrons-left'></i></div></a>
             <?php if ($page==1) 
                {
                  echo " <div><i class='bx bx-chevron-left'></i></div>"; 
                }
             else{
                ?>
                    <a href="index.php?controller=GiangVien&action=list&page=<?php echo $page-1 ?>"><div><i class='bx bx-chevron-left'></i></div></a>
             <?php 
                }
            ?>
          
            <?php  for($i=1;$i<= $pages; $i++)
                { 
                    echo '<a href="index.php?controller=GiangVien&action=list&page='.$i.'"><div>'.$i.'</div></a>';
                   
                } 
            ?>

             <?php if ($page==$pages) 
                {
                  echo " <div><i class='bx bx-chevron-right'></i></div>"; 
                }
             else{
                ?>
                   <a href="index.php?controller=GiangVien&action=list&page=<?php echo $page+1 ?>"><div><i class='bx bx-chevron-right'></i></div></a>
             <?php 
                }
            ?>
           
            <a href="index.php?controller=GiangVien&action=list&page=<?php echo $pages ?>"><div><i class='bx bx-chevrons-right'></i></div></a>
        </div>
    </div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>