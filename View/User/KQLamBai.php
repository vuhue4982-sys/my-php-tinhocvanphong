<?php require_once('../../View/User/Layout/header.php'); ?>
<section>
    <div class="row">
        <div class="title left col-12">
            <span><?php echo $dataBaiTap['TenBaiTap'] ?></span>
        </div>
        <div class="content col-12">
            <div class="row">
                <div class="col-6">
                    <b>Môn Học:</b> <?php echo $dataBaiTap['TenMonHoc'] ?> <br>
                    <b>Ngày Upload:</b> <?php echo $dataBaiTap['NgayTao'] ?> <br>
                    <b>Giảng Viên Upload:</b> <?php echo $dataBaiTap['TenGiangVien'] ?> <br>
                    <b>Loại Bài Tập:</b>
                    <?php if($dataBaiTap['LoaiBaiTap'] == 0 ) { echo "Trắc Nghiêm"; } else {echo "Trắc Nghiêm";}?> <br>
                    <b>Số Câu Hỏi:</b> <?php echo $dataBaiTap['SoLuongCauHoi'] ?> <br>
                </div>
                <div class="col-6">
                    <b>Ngày Làm Bài:</b> <?php echo $dataListKQLamBai['NgayLam'] ?> <br>
                    <b>Số Câu Đúng:</b> <?php echo $dataListKQLamBai['SoCauDung'] ?> <br>
                    <b>Số Điểm:</b> <?php echo $dataListKQLamBai['Diem'] ?> <br>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="title col-12">
            <span>Kết Quả Bài Làm</span>
        </div>
        <form>
            <div class="content col-12">
                <?php if($dataListCTBaiLam!=null){ 
              $stt = 1;    
            foreach($dataListCTBaiLam as $value) {
                $id = $value['MaCauHoi'];
                $sql = "SELECT * FROM cauhoi Where MaCauHoi = '$id'";
                $valueCauHoi = $db->getDatas($sql); 
            ?>
                <div class="row cauhoi">
                    <div class="col-12" style="margin-bottom: 5px;">
                        <b style="font-size: 18px;"> <?php echo'Câu Hỏi '.$stt.': '.$valueCauHoi['NoiDungCauHoi']?> </b>
                    </div>
                    <div class="col-3 cauhoitn"
                        <?php if($valueCauHoi['DapAnDung'] ==1 ){echo 'style="background-color: yellow;"';}?>>
                        <input <?php if( $value['CauTraLoi']==1) {echo'checked';} ?> type="radio"
                            id="txtCauTL<?php echo $valueCauHoi['DapAnA']?>" name="txtCauTL<?php echo $stt?>"
                            valueCauHoi="1">
                        <label for="txtCauTL<?php echo $valueCauHoi['DapAnA']?>" <?php echo $valueCauHoi['DapAnDung'] ?>
                            <?php if($value['CauTraLoi'] ==1) {echo'style="font-weight: bold;"';}  ?>><?php echo'A. '.$valueCauHoi['DapAnA']?></label>
                    </div>
                    <div class="col-3 cauhoitn"
                        <?php if($valueCauHoi['DapAnDung'] ==2 ){echo 'style="background-color: yellow;"';}?>>
                        <input <?php if( $value['CauTraLoi']==2) {echo'checked';} ?> type="radio"
                            id="txtCauTL<?php echo $valueCauHoi['DapAnB']?>" name="txtCauTL<?php echo $stt?>"
                            valueCauHoi="2">
                        <label for="txtCauTL<?php echo $valueCauHoi['DapAnB']?>"
                            <?php if($value['CauTraLoi'] ==2) {echo'style="font-weight: bold;"';}  ?>><?php echo'B. '.$valueCauHoi['DapAnB']?></label>
                    </div>
                    <div class="col-3 cauhoitn"
                        <?php if($valueCauHoi['DapAnDung'] ==3 ){echo 'style="background-color: yellow;"';}?>>
                        <input <?php if( $value['CauTraLoi']==3) {echo'checked';} ?> type="radio"
                            id="txtCauTL<?php echo $valueCauHoi['DapAnC']?>" name="txtCauTL<?php echo $stt?>"
                            valueCauHoi="3">
                        <label for="txtCauTL<?php echo $valueCauHoi['DapAnC']?>"
                            <?php if($value['CauTraLoi'] ==3) {echo'style="font-weight: bold;"';}  ?>><?php echo'C. '.$valueCauHoi['DapAnC']?></label>
                    </div>
                    <div class="col-3 cauhoitn"
                        <?php if($valueCauHoi['DapAnDung'] ==4 ){echo 'style="background-color: yellow;"';}?>>
                        <input <?php if( $value['CauTraLoi']==4) {echo'checked';} ?> type="radio"
                            id="txtCauTL<?php echo $valueCauHoi['DapAnD']?>" name="txtCauTL<?php echo $stt?>"
                            valueCauHoi="4">
                        <label for="txtCauTL<?php echo $valueCauHoi['DapAnD']?>"
                            <?php if($value['CauTraLoi'] ==4) {echo'style="font-weight: bold;"';}  ?>><?php echo'D. '.$valueCauHoi['DapAnD']?></label>
                    </div>
                </div>

            </div>
            <?php $stt =$stt +1;    
                
             } }
                else{
                    echo "Hiện tại không có câu hỏi nào";
                }?>
                <div class="row" style="justify-content: center;">
                <a href="index.php?controller=TrangChu" class="backtohome btn-success">Trở về trang chủ</a>
            </div>
    </div>
</section>

<?php require_once('../../View/User/Layout/footer.php'); ?>