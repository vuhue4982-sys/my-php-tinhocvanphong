<?php require_once('../../View/User/Layout/header.php'); ?>
<section>
    <div class="row">
        <div class="title left col-12">
            <span><?php echo $dataBaiTap['TenBaiTap'] ?></span>
        </div>
        <div class="content col-12">
            <b>Môn Học:</b> <?php echo $dataBaiTap['TenMonHoc'] ?> <br>
            <b>Ngày Upload:</b> <?php echo $dataBaiTap['NgayTao'] ?> <br>
            <b>Giảng Viên Upload:</b> <?php echo $dataBaiTap['TenGiangVien'] ?> <br>
            <b>Loại Bài Tập:</b>
            <?php if($dataBaiTap['LoaiBaiTap'] == 0 ) { echo "Trắc Nghiêm"; } else {echo "Trắc Nghiêm";}?> <br>
            <b>Số Câu Hỏi:</b> <?php echo $dataBaiTap['SoLuongCauHoi'] ?> <br>
        </div>
</section>

<section>
    <div class="row">
        <div class="title col-12">
            <span>Bài Làm</span>
        </div>
        <form>
            <input style="display: none;" type="text" name="controller" value="BaiTap">
            <input style="display: none;" type="text" name="action" value="NopBai">
            <div class="content col-12">
                <?php if($dataCauHoi!=null){ 
              $stt = 1;    
            foreach($dataCauHoi as $value) { 
            ?>
                <input style="display: none;" type="text" name="txtCauHoi<?php echo $stt?>" value="<?php echo $value['MaCauHoi'] ?>">
                <div class="row cauhoi">
                    <div class="col-12" style="margin-bottom: 5px;">
                        <b style="font-size: 18px;"> <?php echo'Câu Hỏi '.$stt.': '.$value['NoiDungCauHoi']?> </b>
                    </div>
                    <div class="col-3 cauhoitn">
                        <input type="radio" id="txtCauTL<?php echo $value['DapAnA']?>"
                            name="txtCauTL<?php echo $stt?>" value="1">
                        <label for="txtCauTL<?php echo $value['DapAnA']?>"><?php echo'A. '.$value['DapAnA']?></label>

                    </div>
                    <div class="col-3 cauhoitn">
                        <input type="radio" id="txtCauTL<?php echo $value['DapAnB']?>"
                            name="txtCauTL<?php echo $stt?>" value="2">
                        <label for="txtCauTL<?php echo $value['DapAnB']?>"><?php echo'B. '.$value['DapAnB']?></label>
                    </div>
                    <div class="col-3 cauhoitn">
                        <input type="radio" id="txtCauTL<?php echo $value['DapAnC']?>"
                            name="txtCauTL<?php echo $stt?>" value="3">
                        <label for="txtCauTL<?php echo $value['DapAnC']?>"><?php echo'C. '.$value['DapAnC']?></label>
                    </div>
                    <div class="col-3 cauhoitn">
                        <input type="radio" id="txtCauTL<?php echo $value['DapAnD']?>"
                            name="txtCauTL<?php echo $stt?>" value="4">
                        <label for="txtCauTL<?php echo $value['DapAnD']?>"><?php echo'D. '.$value['DapAnD']?></label>
                    </div>
                </div>

            </div>
            <?php $stt =$stt +1;    
                
             } }
                else{
                    echo "Hiện tại không có câu hỏi nào";
                }?>
               <input style="display: none;" type="text" name="txtSoCauHoi" value="<?php echo $stt-1 ?>">
               <input style="display: none;" type="text" name="txtMaBaiTap" value="<?php echo $dataBaiTap['MaBaiTap'] ?>">
            <div class="row" style="justify-content: center;">
                <input type="submit" class=" btn-success" value="nộp bài">
            </div>

    </div>
</section>
<section>
    <div class="row">
        <div class="title left col-12">
            <span>Video Hướng Dẫn</span>
        </div>
        <div class="content col-12">

        </div>
</section>

<?php require_once('../../View/User/Layout/footer.php'); ?>